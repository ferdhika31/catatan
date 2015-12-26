<?php

return array(
    
    'defaultController' => 'Home',
    
    // Just put null value if you has enable .htaccess file
    'indexFile' => INDEX_FILE . '/',
    // 'indexFile' => '',
    
    'module' => array(
        'path' => APP,
        'domainMapping' => array(),
    ),
    
    'vendor' => array(
        'path' => GEAR.'vendors/'
    ),
    
    'alias' => array(
        // 'controller' => array(
        //     'class' => 'Matkul',
        //     'method' => 'detail'
        // ),
        'method' => 'alias'
    ),
);