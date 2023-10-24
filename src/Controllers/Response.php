<?php

namespace TURBOTECH\Helper\Controllers;

use TURBOTECH\Helper\Controllers\Helper;

class Response
{    
    /**
     * Get HTTP Header Authorization Bearer token
     * */ 
    public static function getBearerHeaderAuthorization() : array
    {
        if (Helper::checkSession()) session_start();

        $token      = $_SESSION['token'];
        $headers    = [
            'headers' => [
                'Authorization' => 'Bearer '.$token,
            ],
        ];
        return $headers;
    }
    
    
    /**
     * Get Full Header Requiredment
     * */ 
    public static function getFullAuthorizationHeader() : array
    {
        if (Helper::checkSession()) session_start();

        $token  = $_SESSION['token'];
        return $token 
            ? [
                'Authorization' => "Bearer $token",
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ]
            : [
                'Authorization' => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyNSIsImp0aSI6ImI5ZjYxZjczZWU4OWVjY2RjZDBiZThjZDY0N2FiMzY4YzRhZjc4MmM1MWM0NDU1NDA1OWIwY2RkYTY0ZDVhOTMzNDAyMzZiMmExMTJmMjJkIiwiaWF0IjoxNjg4MzUzMDEyLjQ4NjU2OSwibmJmIjoxNjg4MzUzMDEyLjQ4NjU3OCwiZXhwIjoxNzE5OTc1NDEyLjQ1NjM2MSwic3ViIjoiMSIsInNjb3BlcyI6W119.Os5Mz2pmvLIu1_J8-w9-N7UejL7SUsKoQxWcmzJi7T3ZsqxZ6uHLlOFqAExDsLG2n5rP_1hIX4y6HpFzYifX4ysXk8TuC38Dd6gcGQG8zbFMdFXPkXd-MUuSp2MXix03torOcDMsrSPeV7otSAGcZLY_AyjbTZM5bHfkrXxaYjb65hIvJODD_0_RiwHWJHHNp9p1bR-zbhn-j9DsQCQSNgf_pcoAAMU9f3FoiOxXPSjGOxSOP5nIYWg2LOPXvbcB0TA4U74XuCtKCoi55HOUrpFA6USjrc5eYRxn6616d66yO6-dDuyH-TPx52gWhIpQlaCjp3S2XC2b9Z3XdBNvnBfuPpPfuoePNgQdI49-I6DsK8POb2PskcvSroWk0tAOy9EeUVWFKn716izoz7cDgB5m6ITnzpUquWTrxOu7xxFSOCfV2oXNkZI1i7wlcaMJ63MycNCvT8YmK8hTP2AvKbWjGen_JrxyNHuDAigDY7EQzzswzjEQkUr-Mz9aP4Bgrjq2VGjiqbGKGvbpsoHq2ZeGN2SIX2H3Z0UHhc4iZGa9aNhzA1vzzxT7dBBCiYkRaG1up5p7rdAy2GzddYmoiwsdUx8V3JghpO7WgdKRk2p1L8K2WWM0tiDILHtagFojTxx2BMI_pc369rwp_miAkqZyBSGpgp3Dpft70x_oHJw",
                'Content-Type'  => 'application/json',
                'Accept'        => 'application/json'
            ];
    }


    /** 
     * Response returning result
     * 
     * @param object $response
     * @return object
     * */ 
    public static function result(object $response) : object 
    {
        return isset($response->result)
            ? (object)$response
            : (object)$response;
    }
}
