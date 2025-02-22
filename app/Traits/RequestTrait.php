<?php

namespace App\Traits;

trait RequestTrait
{
    private $string_510 = 'max:510';
    private $string_255 = 'max:255';
    private $required_numeric = 'required|numeric|min:0';
    private $required_string_2_2 = 'required|string|min:2|max:2';
    private $required_string_3_3 = 'required|string|min:3|max:3';
    private $required_string_2_30 = 'required|string|min:2|max:30';
    private $required_string_1_10 = 'required|string|min:1|max:10';
    private $required_email = 'required|string|min:2|max:255|email';
    private $required_string_2_255 = 'required|string|min:2|max:255';
    private $required_string_2_510 = 'required|string|min:2|max:510';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
