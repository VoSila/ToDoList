<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRequest extends FormRequest
{
    public const ID = 'id';

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
            self::ID => 'required|integer'
        ];
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->get(self::ID);
    }
}
