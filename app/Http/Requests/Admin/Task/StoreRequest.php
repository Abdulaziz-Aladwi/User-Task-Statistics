<?php

namespace App\Http\Requests\Admin\Task;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', Rule::unique('tasks', 'title'), 'string', 'min:10', 'max:100'],
            'description' => ['required', 'string', 'min:10', 'max:500'],
            'assigned_by_id' => ['required'],
            'assigned_to_id'=> ['required'],
        ];
    }
}
