<?php
/**
 * Start framework core
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

error_reporting(E_ALL);
ini_set('display_errors', true);

if (!function_exists('getValidPath')) {

    /**
     * Returns a valid path to file or directory
     *
     * @author Gabriel Prates <me@gabsprates.com>
     * @param string $steps the steps to the path
     * @return string
     */
    function getValidPath(...$steps): string
    {
      $path = implode(DIRECTORY_SEPARATOR, $steps);
      $path = realpath($path)? realpath($path) : $path;

      return $path;
    }

}

array_map(
    function ($file) {
        require($file);
    },
    preg_grep(
        '/'.basename(__FILE__).'$/',
        glob(getValidPath(FOX_PATH, '*.php')),
        PREG_GREP_INVERT
    )
);
