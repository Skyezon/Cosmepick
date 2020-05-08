<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class VerifyWorkshopRequest extends FormRequest
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
            'workshopName' => 'required|min:6',
            'workshopCategory' => 'required',
            'workshopLocation' => 'required',
            // 'scheduledDate' => 'required|date',
            function ($attribute, $value, $fail){
                $currDate = Carbon::now();
            },
            'workshopPrice' => 'required|numeric',
            'workshopDuration' => 'required|numeric|min:1|max:8',
            'workshopInstructor' => 'required',
            'workshopDescription' => 'required',

            'workshopImgs' => 'required',
            'workshopImgs.*' => 'image',
            'idOnlyImg' => 'required|image',
            'idWithUserImg' => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'workshopImgs.required' => 'Workshop images need minimal 1 image',
            'workshopImgs.*.image' => 'Uploaded file must be an image',
            'idOnlyImg.required' => 'Id card photo is required',
            'idWithUserImg.required' => 'Id card with user photo is required',
            'idOnlyImg.image' => 'Id card must be an image',
            'idWithUserImg.image' => 'Id card with user must be an image'
        ];
    }
}
