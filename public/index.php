<?php
/**
 * Frontend do app
 *
 * @author Joubert <eu@redrat.com.br>
 */

define('APP_PUBLIC_PATH', __DIR__);
define('FOX_PATH', implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'fox']));

require(FOX_PATH.DIRECTORY_SEPARATOR.'bootstrap.php');

\Fox\Lets::go();
