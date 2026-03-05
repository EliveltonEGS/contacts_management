<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactFormRequest extends FormRequest
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
        $id = $this->route('contact');

        return [
            'name' => ['required', 'min:6', 'max:80'],

            'contact' => [
                'required',
                'digits:9',
                Rule::unique('contacts', 'contact')->ignore($id),
            ],

            'email' => [
                'required',
                'email',
                'max:80',
                Rule::unique('contacts', 'email')->ignore($id),
            ],
        ];
        $id = $this->route('id');
    }
}
