<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
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
            'name' => ['required'],
            'slug' => ['required', 'regex:/^[a-z0-9\-]+$/', Rule::unique('tasks')->ignore($this->route()->parameter('task'))],
            'description' => ['required'],
            'project_id' => ['required', 'exists:projects,id'],
            'task_tag_id' => ['required', 'exists:task_tags,id'],
            'status_tag_id' => ['required', 'exists:status_tags,id'],
            'projectManagers' => ['required', 'array', 'exists:users,id'],
            'developers' => ['required', 'array', 'exists:users,id']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => $this->input('slug') ?: Str::slug($this->input('name'))
        ]);
    }
}
