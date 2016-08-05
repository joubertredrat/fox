<?php
/**
 * Frontend do app
 *
 * @author Joubert <eu@redrat.com.br>
 */

define('APP_PUBLIC_PATH', __DIR__);
define('FOX_PATH', __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'fox');

require(FOX_PATH.DIRECTORY_SEPARATOR.'bootstrap.php');

\Fox\Lets::go();
