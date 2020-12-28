<?php namespace App\Http\Middleware;

use App\Components\Cors\CorsParams;

class CorsMiddleware {
	/**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
  	public function handle($request, \Closure $next) {
    	$response = $next($request);
    	$response->header('Access-Control-Allow-Methods', 'HEAD, GET, POST, PUT, PATCH, DELETE');
    	$response->header('Access-Control-Allow-Headers',/* 'Origin, Content-Type, Accept, Access-Control-Allow-Headers, X-Requested-With');*/$request->header('Access-Control-Request-Headers'));
     	$response->header('Access-Control-Allow-Credentials', 'true');
    	$response->header('Access-Control-Allow-Origin', 'http://localhost:xxxx');
		return $response;
		// dd("options", $request->getMethod());
		// if (! $this->isAllowed($request)) {
        //     return response('Forbidden (cors).', 403) ;
        // }

        // if ($this->isPreflightRequest($request)) {
		// 	dd('options', $request->getMethod());
        //     return $this->handlePreflightRequest($request);
        // }

        // $response = $next($request);

        // return $this->addCorsHeaders($response, $request);

	}
	private function allowCredentials() {
        return CorsParams::allow_credentials;
    }
	  
	private function toString(array $array) {
        return implode(', ', $array);
	}
	
	private function isAllowed($request){
        if (! in_array($request->method(), CorsParams::allow_methods)) {
            return false;
        }

        if (in_array('*', CorsParams::allowOrigins)) {
            return true;
		}

		$matches = collect(CorsParams::allowOrigins)->filter(function ($allowedOrigin) {
            return fnmatch($allowedOrigin, $request->header('Origin'));
        });

        return $matches->count() > 0;
	}

	private function isPreflightRequest($request) {
        return $request->getMethod() === 'OPTIONS';
	}
	
	private function handlePreflightRequest($request)
    {
        return $this->addPreflightHeaders($request, response(null, 204));
	}
	
	private function addPreflightHeaders($request, $response) {
        if ($this->allowCredentials()) {
            $response->header('Access-Control-Allow-Credentials', 'true');
        }

        $response->header('Access-Control-Allow-Methods', $this->toString(CorsParams::allow_methods));
        $response->header('Access-Control-Allow-Headers', $this->toString(CorsParams::allow_headers));
        $response->header('Access-Control-Allow-Origin', $this->allowedOriginsToString($request));
        $response->header('Access-Control-Max-Age', 60 * 60 * 24);

        return $response;
	}
	
	private function allowedOriginsToString($request) {
        if (! $this->isAllowed($request)) {
            return '';
        }

        if (in_array('*', CorsParams::allowOrigins) && ! $this->allowCredentials()) {
            return '*';
        }

        return $request->header('Origin');
    }

	private function addCorsHeaders($response, $request)
    {
        if ($this->allowCredentials()) {
            $response->header('Access-Control-Allow-Credentials', 'true');
        }

        $response->header('Access-Control-Allow-Origin', $this->allowedOriginsToString($request));
        $response->header('Access-Control-Expose-Headers', $this->toString(CorsParams::expose_headers));

        return $response;
    }
}
