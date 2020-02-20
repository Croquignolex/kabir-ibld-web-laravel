<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'alpha_2' => $this->required_string_2_2,
            'alpha_3' => $this->required_string_3_3,
            'en_name' => $this->required_string_2_255,
            'fr_name' => $this->required_string_2_255,
        ];
    }
}
