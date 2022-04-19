<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
                'file',
                'mimetypes:image/png,image/jpg,image/jpeg',
            ],
            'name' => ['sometimes', 'required', 'min:3'],
        ];
    }
}
