<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-05-23
 * Time: 오후 2:56
 */
// https://github.com/hassankhan/config
$container ['config'] = function ($c) {
    return new \Noodlehaus\Config (BASE_PATH . '/config/config.php');
};

//https://github.com/usmanhalalit/pixie
$container ['QB'] = function ($c) {
//    $config = array(
//        'driver' => 'mysql', // Db driver
//        'host' => 'localhost',
//        'database' => 'book_ex',
//        'username' => 'zerock',
//        'password' => 'zerock',
//        'charset' => 'utf8', // Optional
//        'collation' => 'utf8_unicode_ci', // Optional
//        'prefix' => '', // Table prefix, optional
//        'options' => array( // PDO constructor options, optional
//            PDO::ATTR_TIMEOUT => 5,
//            PDO::ATTR_EMULATE_PREPARES => false,
//        ),
//    );
    return new \Pixie\Connection('mysql', $c['config']['db'], 'QB');
};
