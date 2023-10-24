<?php

namespace TURBOTECH\Helper\Controllers;

class Helper 
{
    
    /**
     * Get check session.
     * */
    public static function checkSession() 
    {
        return session_status() == PHP_SESSION_NONE;
    }


    /**
     * Get APP_URL from env.
     * 
     * @return string
     * */
    public static function getAppURL() : string
    {
        return env('APP_URL', 'localhost');
    }


    /**
     * Get APP_NAME from env.
     * 
     * @return string
     * */
    public static function getAppName() : string
    {
        return env('APP_NAME', 'TURBOTECH');
    }

    
    /**
     * Get APP_ENV from env.
     * 
     * @return string
     * */
    public static function getAppENV() : string
    {
        return env('APP_ENV', 'local');
    }

        
    /**
     * Get APP_ENV from env.
     * 
     * @return bool
     * */
    public static function getAppDEBUG() : bool
    {
        return env('APP_DEBUG', true);
    }

        
    /**
     * Get APP_UPLOAD from env.
     * 
     * @return string
     * */
    public static function getAppUploadApi() : string
    {
        return env('APP_UPLOAD', 'api/upload');
    }
    
    
    /**
     * Get APP_UPLOAD from env.
     * 
     * @return string
     * */
    public static function mergeRoute($routing) : string
    {
        return substr($routing, 0, 1) == "/"
            ? static::getAppURL().$routing
            : static::getAppURL().'/'.$routing;
    }
}
