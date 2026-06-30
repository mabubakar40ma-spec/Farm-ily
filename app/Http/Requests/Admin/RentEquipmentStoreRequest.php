<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RentEquipmentStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['required', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255', 'unique:rent_equipment,title'],
            'location' => ['required', 'integer'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'max:255'],
            'description' => ['required'],
            'feature' => ['required', 'string'],
            'price_per_day' => ['required', 'numeric'],
            'price_per_week' => ['required', 'numeric'],
            'status' => ['required', 'boolean'],
            'is_featured' => ['required', 'boolean'],
            'is_available' => ['required', 'boolean'],
        ];
    }
}