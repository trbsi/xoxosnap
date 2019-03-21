<?php

namespace App\Api\V1\Web\Stories\Requests\Story\Create;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Story;

class CreateStoryRequest extends FormRequest
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
            'stories' => 'required|array',
            'stories.*' => 'mimes:jpeg,png,jpg,mp4',
            'expiry_type' => sprintf('required|in:%s,%s', Story::EXPIRY_TYPE_NEVER, Story::EXPIRY_TYPE_CUSTOM),
            'expires_in_type' => sprintf('required_if:expiry_type,%s|in:%s,%s',
                Story::EXPIRY_TYPE_CUSTOM,
                Story::EXPIRY_TIME_MINUTES,
                Story::EXPIRY_TIME_HOURS
            ),
            'expires_in' => sprintf('required_if:expiry_type,%s|nullable|integer|min:1', Story::EXPIRY_TYPE_CUSTOM),
        ];
    }
}
