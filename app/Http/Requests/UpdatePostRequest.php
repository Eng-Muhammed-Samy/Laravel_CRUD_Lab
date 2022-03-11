<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required | min:6',
            'description'=>'required',
        ];
    }
    public function messages()
    {
        return[
            'title.required'=>"Please Add Title for the Post",
            'title.min'=>"The length of title should be greater than 6 char",
            'description.required'=> "Add description for the post",
        ];
    }
}
