<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'Name_Section_En' => ['required'],
            'Name_Section_Ar' => ['required'],
            'grade_id' => ['required'],
            'class_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            'Name_Section_Ar.required' => trans('Sections_trans.required_ar'),
            'Name_Section_En.required' => trans('Sections_trans.required_en'),
            'grade_id.required' => trans('Sections_trans.Grade_id_required'),
            'class_id.required' => trans('Sections_trans.Class_id_required'),
        ];
    }
}