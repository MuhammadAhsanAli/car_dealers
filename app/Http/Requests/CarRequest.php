<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'make_id' => 'required',
            'model' => 'required',
            'model_number' => 'required',
            'vin' => 'required',
            'year' => 'required|integer',
            'description' => 'required',
            'price' => 'required|numeric',
            'body_id' => 'required',
            'photos' => 'required|array',
            'photos.*.url' => 'required',
            'photos.*.new_name' => 'sometimes',
            'available' => 'required'
        ];
    }
}
