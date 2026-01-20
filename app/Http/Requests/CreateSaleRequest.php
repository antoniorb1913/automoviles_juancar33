<?php

namespace App\Http\Requests;

use App\Helpers\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateSaleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'amount' =>  'required',
            'sale_date' =>  'required|date',
            'seller_id' =>  'required|numeric|min:1',
            'client_id' =>  'required|numeric|min:1',
            'car_id' =>  'required|numeric|min:1',
        ];

    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponse::error($validator->errors(), 'Errores validaciones', 422)
        );
    }
}
