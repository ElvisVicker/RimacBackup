<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:255',
            'price' => 'required|numeric|min:1|max:9999999999',

            'qty' => 'required|Integer|min:1|max:9999999999',
            'model' => 'required',
            'color' => 'required',
            'fueltype' => 'required',
            'year' => 'required',
            'sittingfor' => 'required',
            'transmission_type' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'wheelbase' => 'required',
            'combined' => 'required',
            'motorway' => 'required',
            'urban' => 'required',
            'emission_co2' => 'required',
            'engine_size' => 'required',
            'maxKw' => 'required',
            'maxHp' => 'required',
            'acceleration' => 'required',
            'extra_equipment' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
            'car_category_id' => 'required'
        ];
    }
}
