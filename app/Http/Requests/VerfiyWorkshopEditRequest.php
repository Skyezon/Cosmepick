<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerfiyWorkshopEditRequest extends FormRequest
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
            'name' => 'required|min:6',
            'category' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'price' => 'required|numeric',
            'duration' => 'required|numeric|min:1|max:8',
            'instructor' => 'required',
            'description' => 'required',

            'workshopImgs' => 'required',
            'workshopImgs.*' => 'image',
        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
