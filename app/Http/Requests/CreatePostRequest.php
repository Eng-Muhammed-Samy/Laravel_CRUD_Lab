<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title'=>'required | min:6',
            'description'=>'required',
        ];
    }

    function messages()
    {
        return[
            'title.required'=>"No Post Without Title",
            'title.min'=>"The title Should by Greater than 6 char",
            'description.required'=> "No Post Without Description",
        ];
    }
}
