<?php
/**
 * |-------------------------------------------------------------------
 * |주 경로 상수를 설정
 * |-------------------------------------------------------------------
 */
define('ROOT_PATH', dirname(__FILE__));
define('BASE_PATH', dirname(ROOT_PATH));

/**
 * |---------------------------------------------------------------
 * |ini_set('date.timezone', 'Asia/Seoul'); //한국시간(timezone)설정
 * |---------------------------------------------------------------
 */
date_default_timezone_set('Asia/Seoul'); // 한국시간(timezone)설정

/**
 * Step 1: Require the Kaiser Framework using Composer's autoloader
 */
$loader = require_once BASE_PATH . '/vendor/autoload.php';

/**
 * |-------------------------------------------------------------------
 * |ClassLoader implements a PSR-0, PSR-4 and classmap class loader.
 * |-------------------------------------------------------------------
 * |
 */
$loader->addPsr4('App\\', BASE_PATH . '/app');
$loader->addClassMap ( [
    'PluploadHandler' => BASE_PATH . '/vendor/mclkim/kaiser/src/Plupload/PluploadHandler.php'
] );

// DIC configuration
$container = new Kaiser\Container ();

/**
 * |-------------------------------------------------------------------
 * |Set up dependencies
 * |-------------------------------------------------------------------
 */
require_once BASE_PATH . '/app/dependencies.php';

/**
 * Step 2: Instantiate a Kaiser application
 */
$app = new Kaiser\App ($container);

/**
 * Step 3: Setting Kaiser application Controller
 */
$app->setAppDir([
    BASE_PATH . '/app'
]);

/**
 * Step 4: Run the Kaiser application
 */
$app->run();
