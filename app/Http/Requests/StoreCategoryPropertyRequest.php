<?php

namespace App\Http\Requests;

use App\Models\CategoryProperty;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCategoryPropertyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_property_create');
    }

    public function rules()
    {
        return [
            'sub_category_id' => [
                'integer',
                'exists:sub_categories,id',
                'nullable',
            ],
            'name' => [
                'string',
                'min:3',
                'max:250',
                'required',
            ],
        ];
    }
}
