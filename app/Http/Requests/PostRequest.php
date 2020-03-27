<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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

            'title'  => [
                'required ',
                ' min:3 ' , 
                Rule::unique('posts')->ignore($this->post),
                    ],

            'description' => 'required | min:10',
            'post_image'     =>  'required|image|mimes:png,jpg,jpeg',
            "user_id"     => 'exists:users,id'
        ];
    }

    public function messages()
    {
        return [
            "title.required"       => "title is required",
            "title.min"            => "title must be at least 3 characters",
            "title.unique"         => "title is used before .. please provide another title",
            "description.required" => "description is required",
            "description.required" => "description must be at least 10 characters",
            "user_id.exists"              => "sorry .. user doesn't exist"
        ];
    }
}
