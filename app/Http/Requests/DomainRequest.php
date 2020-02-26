<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
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
            'icon' => $this->required_string_2_255,
            'name' => $this->required_string_2_255,
            'country_id' => $this->required_numeric,
            'description' => $this->required_string_2_510
        ];
    }
}
