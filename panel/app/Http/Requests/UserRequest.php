<?php

namespace App\Http\Requests;

use App\Rules\PersianPhoneRule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'=>['required','string','max:255'],
            'family'=>'required|string|max:255',
            'mobile'=>[new PersianPhoneRule()],
            'email'=>'required|unique:users,email|email',
            'password'=>'required|min:6',
            'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
