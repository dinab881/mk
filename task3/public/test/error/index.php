<?php
define('DEBUG', 1);

class NotFoundException extends Exception
{
    public function __construct($message = '', $code = 404)
    {
        parent::__construct($message, $code);
    }
}

class ErrorHandler
{
    public function __construct()
    {
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0);
        }
        set_error_handler([$this, 'errorHandler']);
        ob_start();
        register_shutdown_function([$this, 'fatalErrorHandler']);
        set_exception_handler([$this, 'exceptionHandler']);
    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$errstr} | File: {$errfile} | Stroke: {$errline}\n =============\n", 3, __DIR__ . '/errors.log');
        $this->displayError($errno, $errstr, $errfile, $errline);
        return true;
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last();
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$error['message']} | File: {$error['file']} | Stroke: {$error['line']}\n =============\n", 3, __DIR__ . '/errors.log');

            ob_end_clean();
            $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
        } else {
            ob_end_flush();
        }
    }

    public function exceptionHandler(Exception $e)
    {
        error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$e->getMessage()} | File: {$e->getFile()} | Stroke: {$e->getLine()}\n =============\n", 3, __DIR__ . '/errors.log');

        $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 500)
    {
        http_response_code($response);

        if (DEBUG) {
            require 'views/dev.php';
        } else {
            require 'views/prod.php';
        }
        die();
    }
}

//new ErrorHandler();
//test();

//throw new NotFoundException('Page not found');