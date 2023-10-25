<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'invoice' => 'required|unique:admins,invoice|max:255',
            'name_id' => 'required|exists:applications,id',
            'no_hp' => 'required|max:12',
            'username' => 'nullable|max:35',
            'email' => 'required|max:35',
            'password' => 'required|max:35',
            'pin' => 'nullable|max:6',
        ];
    }
}
