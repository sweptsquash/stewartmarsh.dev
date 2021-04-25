<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'error' => [
                    'message'   => '405 Method Not Allowed',
                    'status'    => Response::HTTP_METHOD_NOT_ALLOWED,
                ],
            ], Response::HTTP_METHOD_NOT_ALLOWED);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'error' => [
                    'message'   => '422 Unprocessable Entity',
                    'status'    => Response::HTTP_UNPROCESSABLE_ENTITY,
                ],
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if ($exception instanceof HttpException) {
            if (! app()->environment('local') && in_array($exception->getStatusCode(), [500, 503, 404, 403])) {
                return Inertia::render('Error', ['status' => $exception->getStatusCode()])
                    ->toResponse($request)
                    ->setStatusCode($exception->getStatusCode());
            } elseif ($exception->getStatusCode() === 419) {
                return back()->with([
                    'message' => 'The page expired, please try again.',
                ]);
            }
        }

        return parent::render($request, $exception);
    }

    protected function context()
    {
        try {
            $context = array_merge(parent::context(), [
                'request_fingerprint' => request()->fingerprint(),
            ]);
        } catch (\RuntimeException $e) {
            $context = parent::context();
        }

        return $context;
    }
}
