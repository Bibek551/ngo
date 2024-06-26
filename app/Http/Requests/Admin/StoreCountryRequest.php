<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCountryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'popular_place' => 'required',
            'short_description' => 'required',
            // 'order' => 'unique:countries,order',
            'status' => 'required',
            'image' => 'required|image',
            'banner_image' => 'image',
        ];
    }
}