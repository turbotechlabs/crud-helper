<?php

namespace TURBOTECH\Helper\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use TURBOTECH\Helper\Controllers\Controller;
use TURBOTECH\Helper\Controllers\Helper as Help;
use TURBOTECH\Helper\Controllers\Response;
use TURBOTECH\Helper\Controllers\File;

class Store extends Controller
{
    /** Request @var Request $request*/ 
    protected $request;

    /** Request @var Request $request*/ 
    protected $routeApis;

    /**
     * Initalize Params
     * */ 
    public function __construct(Request $request, $routeApis) 
    {
        $this->request      = $request;
        $this->routeApis    = $routeApis;
    }
    

    /**
     * checking upload files
     * 
     * @var Request 
     * @return bool
     * */ 
    public function issetFiles() : bool 
    {
        return $this->request->allFiles() ? true : false;
    }


    /**
     * Save data to database 
     * 
     * @return mixed
     * */ 
    public function save($routeApis = null) : object 
    {
        $data       = $this->request->all();
        if ($this->issetFiles()) 
        {
            foreach($this->request->allFiles() as $key => $value) 
            {
                $fileResult = File::uploadFiles($value);
                $data[$key] = $fileResult->result;
            }  
        }
        $api        = $routeApis ?? $this->routeApis ?? $this->request->routeApis;
        $route      = Help::mergeRoute($api);
        $header     = Response::getFullAuthorizationHeader();
        $response   = Http::withHeaders($header)
            ->post($route, $data)
            ->object();

        return Response::result($response);
    }

}
