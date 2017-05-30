<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $domains = ['http://localhost:8080'];

        if(isset($request->server()['HTTP_ORIGIN'])){
            $origin = $request->server()['HTTP_ORIGIN'];
            if(in_array($origin,$domains)){
                header('Access-Control-Allow-Origin: *');
                header('Access-Control-Allow-Header: Origin, Content-Type: Authorization');
                header('Access-Control-Allow-Header: *');
                header('Access-Control-Allow-Header: Origin, X-Requested-With, Content-Type, Accept');
                header('Access-Control-Allow-Headers: Content-Type, Authorization');
            }
        }
        return $next($request);
        // return $next($request)
        //     ->header('Access-Control-Allow-Origin' , '*')
        //     ->header('Access-Control-Allow-Method', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
        //     ->header('Access-Control-Allow-Headers','Content-Type, Authorization');

  // ALLOW OPTIONS METHOD
//   $headers = [
//          'Access-Control-Allow-Methods'=> 'POST, GET, OPTIONS, PUT, DELETE',
//          'Access-Control-Allow-Headers'=> 'Content-Type, X-Auth-Token, Origin',
//          'allow-origin'=>'*'
//      ];
//   if($request->getMethod() == "OPTIONS") {
//          // The client-side application can set only headers allowed in Access-Control-Allow-Headers
//          return $next($request);
//      }

//      $response = $next($request);
//     //  foreach($headers as $key => $value) 
//     //   $response->header($key, $value);
//   return $response;
  
        // $domains = ['http://localhost:8080'];

        // if(isset($request->server()['HTTP_ORIGIN'])){
        //     $origin = $request->server()['HTTP_ORIGIN'];
        //     if(in_array($origin,$domains)){
        //         header('Access-Control-Allow-Origin: '. $origin);
        //         header('Access-Control-Allow-Header: Origin, Content-Type: Authorization');
        //         header('Access-Control-Allow-Header: *');
        //         header('Access-Control-Allow-Header: Origin, X-Requested-With, Content-Type, Accept');
        //     }
        // }
        // return $next($request);
    }
}
