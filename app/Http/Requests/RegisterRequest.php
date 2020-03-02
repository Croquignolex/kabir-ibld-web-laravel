<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use RequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => $this->required_string_2_255,
            'last_name' => $this->required_string_2_255,
            'email' => $this->required_email . '|unique:users',
            'password' => $this->required_string_2_255 . '|confirmed',
        ];
    }
}
