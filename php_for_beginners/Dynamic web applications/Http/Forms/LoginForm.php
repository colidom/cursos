<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function __construct(public array $attributes)
    {
        if (!Validator::email($this->attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address";
        }

        if (!Validator::string($this->attributes['password'])) {
            $this->errors['password'] = "Please provide a valid password";
        }
    }

    /**
     * @throws ValidationException
     */
    public static function validate($attributes): LoginForm
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw(): void
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message): LoginForm
    {
        $this->errors[$field] = $message;
        return $this;
    }
}