<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $withoutDuplicates = true;

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var  array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {});
    }

    /**
     * Get the default context variables for logging.
     *
     * @return  array<string, mixed>
     */
    // protected function context(): array
    // {
    //     // return array_merge(parent::context(), [
    //     //     'foo' => 'bar',
    //     // ]);
    // }
}
