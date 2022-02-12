<?php

namespace Modules\Media\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadMediaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'media' => [
                'required',
                'file',
                'mimes:jpg,jpeg,png,mp4,avi,mkv',
                'max:5120'
            ]
        ];
    }

    public function authorize()
    {
        return true;
    }
}
