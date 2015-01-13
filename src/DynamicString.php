<?php

/**
 * DynamicString template render
 *
 * @author Stefano Azzolini <lastguest@gmail.com>
 */

class  DynamicString {

    protected $group_left,
              $group_right,
              $group_rx,
              $replacer;

    /**
     * Create a DynamicString instance for a specified group/separator
     * @param string $group     A String containing an empty group envelope
     * @param string $separator The choice separator
     */
    
    public function  __construct($group='()', $separator='|'){

        // Check if group delimiters are balanced.
        $l = strlen($group);
        if ($l%2) throw new Exception("Group delimiter must be balanced.");

        // Get left-right group delimiter
        list($this->group_left, $this->group_right) = str_split($group, $l>>1);

        // Build group regular expression
        $this->group_rx =
            "(\\".$this->group_left
             ."([^"
               .$this->group_left.$this->group_right
             ."]+)\\".$this->group_right
           .")x";

        $this->replacer = function($m) use ($separator){
            // Get one random choice
            $choice = array_rand($options = explode($separator, $m[1]),1);
            return $options[$choice];
        };
    }

    /**
     * Render a new randomized instance of passed template.
     * @param  string $template The generator template
     * @return string           The random rendered version
     */
    
    public function render($template){

        // While there are groups, resolve them
        while (false !== strpos($template, $this->group_left)) {
            $template = preg_replace_callback($this->group_rx, $this->replacer, $template);
        }

        // Return rendered template
        return $template;
    }

}
