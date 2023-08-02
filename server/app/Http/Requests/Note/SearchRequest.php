<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public const SEARCH = 'search';

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
            self::SEARCH => 'required|string'
        ];
    }

    /**
     * Get search
     *
     * @return string
     */
    public function getSearch(): string
    {
        return $this->get(self::SEARCH);
    }
}
