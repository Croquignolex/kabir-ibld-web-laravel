<?php

namespace App\Http\Requests;

use App\Traits\RequestTrait;
use Illuminate\Foundation\Http\FormRequest;

class ContributorRequest extends FormRequest
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
            'file' => 'max:10000',
            'email' => $this->required_email,
            'name' => $this->required_string_2_255,
            'domain_id' => $this->required_numeric,
            'phone' => $this->required_string_2_255,
            'address' => $this->required_string_2_255,
            'description' => $this->required_string_2_510,
        ];
    }
}
