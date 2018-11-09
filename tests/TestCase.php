<?php

namespace Tests;

use App\User;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Foundation\Testing\Concerns\InteractsWithExceptionHandling;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, InteractsWithExceptionHandling;

    protected function singIn($user = null)
    {
        $user = $user ? : create(User::class);

        $this->actingAs($user);

        return $this;
    }

    public function enableException()
    {
        $this->originalExceptionHandler = new class implements ExceptionHandler {
            public function render($request, Exception $e)
            {
                throw $e;
            }

            public function report(Exception $e)
            {
                // TODO: Implement report() method.
            }

            public function renderForConsole($output, Exception $e)
            {
                // TODO: Implement renderForConsole() method.
            }
        };

        return $this->withExceptionHandling();
    }
}
