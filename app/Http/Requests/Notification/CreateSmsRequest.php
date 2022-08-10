<?php

namespace App\Http\Requests\Notification;

use Illuminate\Foundation\Http\FormRequest;

class CreateSmsRequest extends FormRequest
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
            'client_id' => 'required|exists:clients,id',
            'phone'     => 'required|max:15',
            'message'   => 'required|max:100',
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'client_id.required'  => 'Id is required',
            'phone.required'      => 'Phone s required',
            'message.required'    => 'Message is required',
            'message.max'         => 'Message cannot be 100 characters',
        ];
    }
}
