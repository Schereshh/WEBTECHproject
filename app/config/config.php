<?php
    // Database connection credentials
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'gallery');

    // APPROOT - Directory of the application
    define('APPROOT', dirname(dirname(__FILE__)));

    // URLROOT
    define('URLROOT', 'http://localhost/pictureUpload/WEBTECHproject');

    //Sitename
    define('SITENAME', 'Gallery');

    //Max file size
    define('MAX_FILE_SIZE', 4194304);

    //File upload destination
    define('FILE_DESTINATION', APPROOT . '\views\posts\uploads');