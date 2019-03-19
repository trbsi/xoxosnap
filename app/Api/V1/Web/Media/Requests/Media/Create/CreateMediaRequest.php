<?php

namespace App\Api\V1\Web\Media\Requests\Media\Create;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Media;

class CreateMediaRequest extends FormRequest
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
            'cost' => 'required|integer|min:0',
            'description' => 'max:10000',
            'video' => 'required|file|mimes:mp4',
            'thumbnail' => 'required|string',
            'expiry_type' => sprintf('required|in:%s,%s', Media::EXPIRY_TYPE_CUSTOM, Media::EXPIRY_TYPE_NEVER),
            'expires_in' => sprintf('required_if:expiry_type,%s|nullable|integer|min:1', Media::EXPIRY_TYPE_CUSTOM),
            'expires_in_type' => sprintf('required_if:expiry_type,%s|nullable|in:days,hours,minutes', Media::EXPIRY_TYPE_CUSTOM),
        ];
    }
}
