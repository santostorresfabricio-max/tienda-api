<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id' => 'required|exists:clients,id',
            'order_number' => 'required|string|unique:orders,order_number',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'nullable|in:pending,paid,shipped,cancelled',
            'notes' => 'nullable|string',
            'ordered_at' => 'nullable|date',
        ];
    }
}
