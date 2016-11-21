<?php
/**
 * Autolader engine
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

$composer_autoload = getValidPath(FOX_PATH, '..', 'vendor', 'autoload.php');
if (file_exists($composer_autoload)) {
    require($composer_autoload);
}

spl_autoload_register(function ($class) {
    if (strpos($class, __NAMESPACE__.'\\Model\\') === 0) {
        $name = substr($class, strlen(__NAMESPACE__.'\\Model\\'));
        require(getValidPath(MODEL_PATH, $name.'.php'));
    }
});
