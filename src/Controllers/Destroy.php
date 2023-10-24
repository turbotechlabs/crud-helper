<?php

namespace TURBOTECH\Helper\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use TURBOTECH\Helper\Controllers\Controller;
use TURBOTECH\Helper\Controllers\Helper as Help;
use TURBOTECH\Helper\Controllers\Response;

class Destroy extends Controller
{

    /** Request @var Request $request*/ 
    protected $request;

    /** Request @var Request $request*/ 
    protected $routeApis;

    /**
     * Initalize Params
     * */ 
    public function __construct(Request $request, $routeApis = null) 
    {
        $this->request      = $request;
        $this->routeApis    = $routeApis;
    }


    /**
     * Destroy data to database 
     * 
     * @return mixed
     * */ 
    public function destroy($routeApis = null) : object 
    {
        $data       = $this->request->all();
        $api        = $routeApis ?? $this->routeApis ?? $this->request->routeApis;
        $route      = Help::mergeRoute($api);
        $header     = Response::getFullAuthorizationHeader();
        $response   = Http::withHeaders($header)
            ->delete($route, $data)
            ->object();

        return Response::result($response);
    }

}
