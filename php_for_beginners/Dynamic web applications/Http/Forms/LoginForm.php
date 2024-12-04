<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected array $errors = [];

    public function validate($email, $password)
    {

        if (!Validator::email($email)) {
            $this->errors['email'] = "Please provide a valid email address";
        }

        if (!Validator::email($password)) {
            $this->errors['password'] = "Please provide a valid password";
        }

       return empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }
}