<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TeamStoreRequest extends FormRequest
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
            'name' => 'unique:teams,name|required|string|max:100',
            'year' => 'required|integer|max:2019|min:1800',
            'initials' => 'required|string|max:4',
            'photo' => 'required|image',
            'country_id' => 'required|integer|exists:countries,id',
            'division_id' => 'required|integer|exists:divisions,id'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Insira um nome!',
            'name.unique' => 'Esse clube já existe!',
            'name.max' => 'Nome demasiado longo!',
            'name.string' => 'Formato de nome inválido!',
            'year.required' => 'Insira um ano de fundação!',
            'year.integer' => 'Formato inválido, insira um número!',
            'year.max' => 'Insira um ano válido!',
            'year.min' => 'Insira um ano válido!',
            'photo.required' => 'Insira uma fotografia',
            'photo.image' => 'Formato de imagem inválido!',
            'division_id.integer' => 'Formato inválido, insira um número!',
            'division_id.exists' => 'Essa divisão não existe!',
            'division_id.required' => 'Insira uma divisão!',
            'country_id.required' => 'Insira um país!',
            'country_id.integer' => 'Formato inválido, insira um número!',
            'country_id.exists' => 'Esse país não existe!',
            'initials.required' => 'Insira uma sigla!',
            'initials.string' => 'Formato inválido, insira texto!',
            'initials.max' => 'Insira no máximo 4 caracteres!',
        ];
    }
    protected  function failedValidation(Validator $validator) {
        //
        //
        throw new HttpResponseException(
            response()->json(
                [
                    'data' => $validator->errors(),
                    'msg' => 'Erro de validação'
                ], 422
            )
        );
    }
}
