<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialMediaLinkRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'social_media_id' => ['required', 'unique:social_media_link'],
          'link'            => ['required', 'url']
        ];
    }

    public function messages()
    {
      return [
        'social_media_id.unique' => 'social media tersebut sudah ada',
      ];
    }
}
