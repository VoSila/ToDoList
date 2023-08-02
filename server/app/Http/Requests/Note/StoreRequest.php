<?php

namespace App\Http\Requests\Note;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public const NAME = 'name';
    public const MESSAGE = 'message';

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
            self::NAME => 'required',
            self::MESSAGE => 'required|min:15|max:500',
        ];
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->get(self::MESSAGE);
    }
}
