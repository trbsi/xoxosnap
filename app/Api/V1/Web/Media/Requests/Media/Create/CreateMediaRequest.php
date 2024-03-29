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
            'video' => 'required|file|mimetypes:video/mp4,video/quicktime',
            'thumbnail' => 'required|string',
            'hashtags' => 'required|string',
            'expiry_type' => sprintf('required|in:%s,%s', Media::EXPIRY_TYPE_CUSTOM, Media::EXPIRY_TYPE_NEVER),
            'expires_in' => sprintf('required_if:expiry_type,%s|nullable|integer|min:1', Media::EXPIRY_TYPE_CUSTOM),
            'expires_in_type' => sprintf('required_if:expiry_type,%s|nullable|in:%s,%s,%s',
                Media::EXPIRY_TYPE_CUSTOM,
                Media::EXPIRY_TIME_MINUTES,
                Media::EXPIRY_TIME_HOURS,
                Media::EXPIRY_TIME_DAYS
            ),
        ];
    }
}
