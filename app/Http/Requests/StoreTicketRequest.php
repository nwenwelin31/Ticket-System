<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'category_id' => 'required',
            'label_id' => 'required',
            'priority' => 'required|string|max:255',
            'file.*' => 'nullable|file|max:10240', // Assuming maximum file size of 10 MB

        ];
    }
}
