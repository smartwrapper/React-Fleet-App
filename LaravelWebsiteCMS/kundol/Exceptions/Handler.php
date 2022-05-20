<?php

namespace App\Exceptions;

use App\Traits\ApiResponser;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    use ApiResponser;
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        $this->renderable(function (Exception $e, $request) {
            // dd(get_class($e));
            // if ($e instanceof MethodNotAllowedHttpException) {
            //     return $this->errorResponse('MethodNotAllowedHttpException: The specified method for the request is invalid', 405);
            // } else if ($e instanceof RouteNotFoundException) {
            //     return $this->errorResponse('RouteNotFoundException: The specified route for the request is invalid', 404);
            // } else if ($e instanceof ModelNotFoundException) {
            //     return $this->errorResponse('ModelNotFoundException: The specified record for the request not found', 404);
            // } else if ($e instanceof AuthenticationException) {
            //     return $this->errorResponse('Authentication token not found!', 403);
            // } else if ($e instanceof HttpException) {
            //     return $this->errorResponse('HttpException: The specified record for the request not found', $e->getStatusCode());
            // } else if ($e instanceof NotFoundHttpException) {
            //     return $this->errorResponse('NotFoundHttpException: The specified URL/Resource cannot be found', 404);
            // }
            // return $this->errorResponse('Internal Server Error', 500);
        });
    }
}
