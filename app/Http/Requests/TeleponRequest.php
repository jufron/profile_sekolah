<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeleponRequest extends FormRequest
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
          'nama'  => ['required', 'min:3', 'max:20'],
          'nomor' =>  ['required', 'numeric', 'digits_between:11,12', 'min:11']
        ];
    }

}
