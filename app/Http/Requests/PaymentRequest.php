<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'student_id' => 'required|integer',
            'course_id' => 'required|integer',
            'payment_method' => 'required|string|max:50',
            'status' => 'nullable|string|max:50',
            'payment_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ];
    }
}
