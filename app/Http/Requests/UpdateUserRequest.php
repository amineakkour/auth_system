<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;
use function PHPUnit\Framework\assertNotTrue;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:5|max:25",
            "email" => ["required", "email", "max:150", Rule::unique('users')->ignore($this->user->id)],
            "username" => "nullable|min:5|max:25",
            "image" => "image|mimes:jpeg,jpg,png,gif|max:10000",
            "birthday" => "nullable|date",
        ];
    }
}
