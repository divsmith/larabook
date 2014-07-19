<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;

class RegistrationForm extends FormValidator {

    /**
     * Validation rules for the registration form.
     * @var array
     */
    protected $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed'
    ];
} 