<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],

        'email' => [
            'required',
            'email',
            Rule::unique(User::class)->ignore($this->user()->id),
        ],

        'address' => ['nullable', 'string', 'max:255'],
        'city' => ['nullable', 'string', 'max:255'],
        'postal_code' => ['nullable', 'string', 'max:20'],

        'profile_photo' => ['nullable', 'image', 'max:2048'],
    ];
}
}