<?php

namespace App\Http\Requests\Panel\User;

use Couchbase\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'profile' => ['nullable', 'image', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'password'=>['nullable','min:8']
        ];
    }
}
