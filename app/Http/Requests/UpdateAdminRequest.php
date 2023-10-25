<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->id === $this->admin->user_id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'no_hp' => 'nullable|regex:/^[0-9]{1,15}$/',
            'username' => 'nullable|max:35',
            'email' => 'nullable|email|max:35',
            'password' => 'nullable|max:35',
            'pin' => 'nullable|min:4|max:6',
        ];
    }
}
