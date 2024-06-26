<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateDeveloperRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:40'],
            'firstName' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:255'],
            'job' => ['required', 'string', 'max:40'],
            'tasks' => ['array', 'exists:tasks,id'],
            'projects' => ['array', 'exists:projects,id'],
        ];
    }
}
