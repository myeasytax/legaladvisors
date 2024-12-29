<?php

class InputValidator
{
    /**
     * Sanitize a string input by removing unwanted characters.
     *
     * @param string $input
     * @return string
     */
    public static function sanitizeString($input)
    {
        return filter_var(trim($input), FILTER_SANITIZE_STRING);
    }

    /**
     * Sanitize an email input.
     *
     * @param string $email
     * @return string|null
     */
    public static function sanitizeEmail($email)
    {
        return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    }

    /**
     * Validate if a string is a valid email.
     *
     * @param string $email
     * @return bool
     */
    public static function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    /**
     * Validate if a string is a valid URL.
     *
     * @param string $url
     * @return bool
     */
    public static function validateURL($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) !== false;
    }

    /**
     * Validate if a string matches a given regular expression.
     *
     * @param string $input
     * @param string $pattern
     * @return bool
     */
    public static function validateRegex($input, $pattern)
    {
        return preg_match($pattern, $input) === 1;
    }

    /**
     * Validate if a number is within a specified range.
     *
     * @param int|float $number
     * @param int|float $min
     * @param int|float $max
     * @return bool
     */
    public static function validateRange($number, $min, $max)
    {
        return $number >= $min && $number <= $max;
    }

    /**
     * Validate if a string has a minimum and/or maximum length.
     *
     * @param string $string
     * @param int|null $min
     * @param int|null $max
     * @return bool
     */
    public static function validateLength($string, $min = null, $max = null)
    {
        $length = strlen($string);
        if ($min !== null && $length < $min) {
            return false;
        }
        if ($max !== null && $length > $max) {
            return false;
        }
        return true;
    }

    /**
     * Validate if a date string matches a specific format.
     *
     * @param string $date
     * @param string $format
     * @return bool
     */
    public static function validateDate($date, $format = 'Y-m-d')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    /**
     * Check if required fields are not empty.
     *
     * @param array $data
     * @param array $requiredFields
     * @return array
     */
    public static function validateRequiredFields($data, $requiredFields)
    {
        $errors = [];
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $errors[$field] = "$field is required.";
            }
        }
        return $errors;
    }
}
?>
