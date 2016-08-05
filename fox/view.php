<?php
/**
 * View manager
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

class View
{
    /**
     * Call view file to display on browser
     *
     * @param string $view
     * @param array $args
     * @return void
     */
    public static function call($view, Array $args = [])
    {
        if ($args) {
            extract($args);
        }
        $view = str_replace('\\', '/', $view);
        require(VIEW_PATH.DIRECTORY_SEPARATOR.$view.'.php');
    }
}
