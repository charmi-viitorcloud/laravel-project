<?php

namespace App\Http\Requests;

use App\Constant\Constant;
use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Constant::STATUS_TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:' . Company::class],
            'logo' => ['required'],
            'website' => ['required'],
        ];
    }
}
