<?php


    /*
        This is the example of main config file. You can use it to create your own local config file
        by simply renaming it to mainConfig.php. 
        
        `Warning!`

        This app will not be able to run without correctly
        defined PATHS and settings in mainConfig.php!

        For those who work with git: mainConfig.php is in .gitignore by default, but it's 
        better to check it before pushing your commit into public repos!
    */
    
    /*
        Full app path starting from / dir of the server and ending with a [trailing slash] <-important!
        Example: /home/user/public_html/
    */
    define("APP_PATH", '/home/user/public_html/');


    /*
        -----------------------------------------------------------------------------------------------
        Modify paths below this line only if you did change folder names of these resources 

        Please remember about trailing slashes!!!

    /*
        A path of app's modules
    */
    define("MODULES_PATH", APP_PATH.'modules/');
    
    /*
        A path of so-called "easy to edit" content -> txt files and additional editable content of modules
    */
    define("CONTENT_PATH", APP_PATH.'content/');

    /*
        A path of classes
    */
    define("CLASSES_PATH", APP_PATH.'classes/');


    /*
        -----------------------------------------------------------------------------------------------
        No configurable options below this line!
    */
    
    /*
        Including required classes
    */
    require_once(CLASSES_PATH.'modulesClass.php');
    require_once(CLASSES_PATH.'pagesClass.php');

    


?>