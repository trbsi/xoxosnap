<?php

namespace App\Web\Media\Requests\Media\Update;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class UpdateMediaRequest extends FormRequest
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
            'title' => 'required|max:100',
            'description' => 'max:10000',
            'hashtags' => 'required|string',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            Session::flash('error', __('general/site.something_went_wrong_check_inputs'));
        }
    }
}
