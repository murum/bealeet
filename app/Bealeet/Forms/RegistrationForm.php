<?php namespace Bealeet\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'email'    => 'required|confirmed|unique:users',
        'password' => 'required|confirmed'
    ];

}