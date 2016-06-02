<?php
return [
    'enableCsrfProtection' => true,

    'uploadPath' => "upload_dir",

    // db settings
    'db' => [
        'driver' => 'mysql', // Db driver
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'dbname',
        'username' => 'username',
        'password' => 'password',
        'charset' => 'utf8', // Optional
        'collation' => 'utf8_unicode_ci'
    ],

    // plupload[http://plupload.org/]
    'plupload' => [
        'allow_extensions' => false,
        'cb_check_file' => false,
        'cb_sanitize_file_name' => array(
            'sanitize_file_name',
            __CLASS__,
        ),
        'chunk' => isset ($_REQUEST ['chunk']) ? intval($_REQUEST ['chunk']) : 0,
        'chunk_size' => '1mb',
        'chunks' => isset ($_REQUEST ['chunks']) ? intval($_REQUEST ['chunks']) : 0,
        'cleanup' => true,
        'default_expire' => 365,
        'default_size' => 100,
        'delay' => 0,
        'file_data_name' => 'file_data',
        'file_name' => isset ($_REQUEST ['name']) ? $_REQUEST ['name'] : false,
        'max_file_age' => 5 * 3600,
        'max_file_count' => 20,
        'max_file_size' => '2gb',
        'target_dir' => false,
        'tmp_dir' => ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload",
        'tmp_name' => false,

    ]
];
