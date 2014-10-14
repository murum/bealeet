<?php namespace Bealeet\Forms;

use Laracasts\Validation\FormValidator;

class ReviewForm extends FormValidator {

    /**
     * Validation rules for registering
     *
     * @var array
     */
    protected $rules = [
        'review' => 'required|min:10|max:255',
    ];

}