<?php

namespace App\Api\Http\Requests\Books;

use App\Api\Exceptions\ValidateException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateBook
 * @package App\Api\Http\Requests\Books
 */
class UpdateBook extends FormRequest
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
            'book_title' => 'required',
        ];
    }

    /**
     * @param Validator $validator
     * @throws ValidateException
     */
    protected function failedValidation(Validator $validator)
    {
        throw ValidateException::error($validator);
    }
}
