<?php

namespace TURBOTECH\Helper\Controllers;

use TURBOTECH\Helper\Controllers\Controller;
use TURBOTECH\Helper\Controllers\Response;
use GuzzleHttp;

class File extends Controller
{
    /**
     * Upload file to server and store to path database
     *
     * @param array                 $data
     * @param string<api endpoint>  $route
     * @return mixed
     * */
    public static function uploadFiles($data = [], $routeApi = "/api/upload") : object
    {
        $files = [];

        /**
         * Creating Array to params file
         * */
        foreach($data as $file)
        {
            $files[] = [
                'name'      => "file[]",
                'filename'  => $file->getClientOriginalName(),
                'contents'  => fopen($file->getPathname(), 'r'),
            ];
        }


        /**
         * Upload File into server
        */
        $header     = Response::getBearerHeaderAuthorization();
        $client     = new \GuzzleHttp\Client($header);
        $route      = Helper::mergeRoute($routeApi);
        $response   = $client->request( "POST", $route, ['multipart' => $files,]);


        $response   = $response->getBody();
        $result     = json_decode($response, true);

        return $result["status"] == 200
            ? (object)$result
            : (object)[];
    }
}
