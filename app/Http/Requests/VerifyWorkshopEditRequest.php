<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class VerifyWorkshopEditRequest extends FormRequest
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
            'date' =>  [
                'required',
                'date',
                function ($attribute, $value, $fail){
                    $currDate = Carbon::now('Asia/Jakarta');
                    if($this->isValidScheduledDate($currDate, $value) == false ){
                        $attribute = 'date';
                        $fail($attribute.' is not valid');
                    }
                }
            ],
            'price' => 'required|numeric',
            'duration' => 'required|numeric|min:1|max:8',
            'instructor' => 'required',
            'description' => 'required',
            'workshopImgs.*' => 'image',
    
        ];
    }

    public function messages()
    {
        return [
            'workshopImgs.*.image' => 'Uploaded file must be an image',
        ];
    }

    private function isValidScheduledDate(Carbon $currDate, $inputedDate){
        $inputedDate = Carbon::parse($inputedDate);
        return ($inputedDate->lessThanOrEqualTo($currDate)) ? false : true;
    }
}
