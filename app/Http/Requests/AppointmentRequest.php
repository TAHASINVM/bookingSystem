<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'name' => 'required|string',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'date' => 'required|date',
            'time_slot' => 'required|in:10:00,10:30,11:00,11:30,12:00,12:30,14:00,14:30,15:00,15:30,16:00,16:30'
        ];
    }
}
