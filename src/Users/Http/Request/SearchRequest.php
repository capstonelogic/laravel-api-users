<?php

namespace CapstoneLogic\Users\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'per_page' => 'integer',
            'order_by' => 'string',
            'sort' => 'string',
            'search' => 'string'
        ];
    }
}