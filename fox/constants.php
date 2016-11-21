<?php
/**
 * Framework constants
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

define('APP_PATH',        getValidPath(__DIR__, '..', 'app'));
define('CONFIG_PATH',     getValidPath(APP_PATH, 'conf'));
define('MODEL_PATH',      getValidPath(APP_PATH, 'model'));
define('VIEW_PATH',       getValidPath(APP_PATH, 'view'));
define('CONTROLLER_PATH', getValidPath(APP_PATH, 'controller'));
define('LOG_PATH',        getValidPath(APP_PATH, 'logs'));
define('STORE_PATH',      getValidPath(APP_PATH, 'store'));
