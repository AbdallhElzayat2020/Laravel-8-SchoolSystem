<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClassRequest extends FormRequest
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
            'List_Classes.*.Name_ar' => 'required|unique:classrooms,Class_Name->ar,' . $this->id,
            'List_Classes.*.Name_en' => 'required|unique:classrooms,Class_Name->en,' . $this->id,
            'List_Classes.*.grade_id' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'List_Classes.*.Name_ar.required' => trans('validation.required'),
            'List_Classes.*.Name_en.required' => trans('validation.required'),
            'List_Classes.*.grade_id.required' => __("validation.required"),
            'List_Classes.*.Name_ar.unique' => __("validation.unique", ['attribute' => trans('lang.Name_ar')]),
            'List_Classes.*.Name_en.unique' => __("validation.unique", ['attribute' => trans('lang.Name_en')]),
        ];
    }
}
