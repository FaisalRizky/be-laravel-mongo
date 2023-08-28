<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Carbon\Carbon;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Throwable $exception
     * @return JsonResponse|\Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Throwable $exception)
    {
        $isFramworkException = $exception instanceof AuthenticationException;
        
         /**
         * DISPLAY ERROR
         */
        if(!$isFramworkException){
            $service = property_exists($exception, 'serviceName') ?  $exception->serviceName : null;
            return response()->json([
                'service' => $service ? $service : 'Not set',
                'status' => false,
                'message' => $exception->getMessage(),
                'data' => $exception->getContents(),
                'created_at' => Carbon::now()->timezone('Asia/Jakarta')->format('YmdHis')
            ], $exception->getCode());
        }
        return parent::render($request, $exception);
       
    }
}
