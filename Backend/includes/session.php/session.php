<?php
// Start or resume a session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Set a session variable.
 *
 * @param string $key
 * @param mixed $value
 * @return void
 */
function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

/**
 * Get a session variable.
 *
 * @param string $key
 * @param mixed $default
 * @return mixed
 */
function getSession($key, $default = null)
{
    return isset($_SESSION[$key]) ? $_SESSION[$key] : $default;
}

/**
 * Check if a session variable exists.
 *
 * @param string $key
 * @return bool
 */
function hasSession($key)
{
    return isset($_SESSION[$key]);
}

/**
 * Remove a session variable.
 *
 * @param string $key
 * @return void
 */
function unsetSession($key)
{
    if (isset($_SESSION[$key])) {
        unset($_SESSION[$key]);
    }
}

/**
 * Destroy the current session.
 *
 * @return void
 */
function destroySession()
{
    session_unset();
    session_destroy();
}
