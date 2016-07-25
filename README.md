# QBOARD

Installation
------------

**1**. Grab with git clone

```
git clone git@github.com:mclkim/qboard.git
```

**2**. run composer install
```
cd qboard
composer install
```

**3**. Grab with git submodule update
```
git submodule update --init --recursive
```
**4**. Edit composer.json && dump-autoload
```
{
  "autoload": {
    "psr-4": {
      "App\\": "app"
    }
  }
}
```
*  composer dump-autoload 
```
composer dump-autoload -o
```

**5**. Edit config.php
config/config.php
```

<?php
return [
    'enableCsrfProtection' => false,
    
    'uploadPath' => "c:\\phpdev\\upload",    

    // db settings
    'db' => [
        'driver' => 'mysql', 
        'host' => 'localhost',
        'port' => 3306,
        'database' => 'database',
        'username' => 'username',
        'password' => 'password',
        'charset' => 'utf8', 
        'collation' => 'utf8_unicode_ci'
    ],

    // plupload
    'plupload' => [
        'chunk_size' => '1mb',
        'max_file_size' => '2gb',
        'max_file_count' => 20,
        'default_expire' => 365,
        'default_size' => 100,
        'storage_path' => 'c:\\file\\qboard-data',
        'storage_url' => 'http://localhost/file'
    ],

    'debug' => false,
    'charset' => 'utf-8'
];
```
