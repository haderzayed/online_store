<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $id=$this->route('category');
        return [
             'name'=>[
                'required',
                'string','min:3','max:255',
                 "unique:categories,name, $id",
                //  function($attribute,$value,$fails){
                //       if(strtolower($value)=='laravel'){
                //          $fails('This name is forbidden');
                //       };

                //  }
                // new Filter(),
                // new Filter(['php','laravel','html']),
                // 'Filter:php,laravel,html',
            ],
             'parent_id'=>['nullable','int','exists:categories,id'],
             'image'=>['image','max:1048576'],
             'status'=>['required','in:active,archived']
        ];
    }
}
