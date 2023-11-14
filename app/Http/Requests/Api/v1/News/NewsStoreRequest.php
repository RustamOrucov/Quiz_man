<?php

namespace App\Http\Requests\Api\v1\News;

use App\Http\Requests\BaseRequest;

class NewsStoreRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {

        $rule = [
            $this->systemLocale=>['required','array'],
            $this->systemLocale.'.title'=>['required','max:255'],
            $this->systemLocale.'.description'=>['required'],
        ];
        $rule['status']=['nullable','integer','in:0,1'];
        $this->translatableLocales=array_filter($this->translatableLocales,function($item) {
            return $item!==$this->systemLocale;
        });

        foreach ($this->translatableLocales as $key => $value) {
            $rule[$value]=['nullable','array'];
            $rule[$value.'.title']=['nullable','required_with:'.$value,'max:255'];
            $rule[$value.'.description']=['nullable','required_with:'.$value];
        }

        $rules = [
            'az.*'=>['require','array'],
            'az.title '=>['require ','max_225'],
            'az_description'=>['require','max_225'],

            'en.*'=>['null','array'],
            'en.title '=>['null ','max_225'],
            'en_description'=>['null','max_225'],

            'ru.*'=>['null','array'],
            'ru.title '=>['null ','max_225'],
            'ru_description'=>['null','max_225'],
        ];

        // foreach(config('translatable.locales') as $locale)
        // {
        //     $rules[$locale] = ['required', 'array'];
        //     $rules["$locale.title"] = ['required', 'string', 'max:255'];
        //     $rules["$locale.description"] = ['required', 'string'];
        // }

        // return $rules;
        return $rule;
    }
}
