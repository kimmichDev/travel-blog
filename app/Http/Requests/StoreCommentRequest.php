<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Post::find($this->post_id);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "comment" => "required|max:200",
            "post_id" => "required|exists:posts,id"
        ];
    }

    public function messages()
    {
        return [
            "comment.required" => "yay lay kwar"
        ];
    }
}
