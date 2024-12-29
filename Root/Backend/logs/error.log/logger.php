<?php

/**
 * Log an error message to a file.
 *
 * @param string $message
 * @return void
 */
function logError($message)
{
    $logFile = __DIR__ . '/error.log';
    $timestamp = date('Y-m-d H:i:s');
    $formattedMessage = "[$timestamp] ERROR: $message" . PHP_EOL;

    file_put_contents($logFile, $formattedMessage, FILE_APPEND);
}

/**
 * Set a custom error handler to log PHP errors.
 */
function setCustomErrorHandler()
{
    set_error_handler(function ($severity, $message, $file, $line) {
        $errorMessage = "[$severity] $message in $file on line $line";
        logError($errorMessage);
    });

    set_exception_handler(function ($exception) {
        $errorMessage = "Uncaught Exception: " . $exception->getMessage() . " in " . $exception->getFile() . " on line " . $exception->getLine();
        logError($errorMessage);
    });
}

// Initialize custom error handler
setCustomErrorHandler();
