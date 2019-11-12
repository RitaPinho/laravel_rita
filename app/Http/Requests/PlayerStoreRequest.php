<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PlayerStoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'birth_date' => 'required|date',
            'photo' => 'required|image',
            'team_id' => 'integer|exists:teams,id',
            'country_id' => 'required|integer|exists:countries,id',
            'position_id' => 'required|integer|exists:positions,id'
        ];
    }
    public function messages() {
        return [
            'name.required' => 'Insira um nome!',
            'name.max' => 'Nome demasiado longo!',
            'name.string' => 'Formato de nome inválido!',
            'birth_date.required' => 'Insira uma data de nascimento!',
            'birth_date.date' => 'Formato de data inválido! Exemplo: 1998-12-13',
            'photo.required' => 'Insira uma fotografia',
            'photo.image' => 'Formato de imagem inválido!',
            'team_id.integer' => 'Formato inválido, insira um número!',
            'team_id.exists' => 'Essa equipa não existe!',
            'country_id.required' => 'Insira um país!',
            'country_id.integer' => 'Formato inválido, insira um número!',
            'country_id.exists' => 'Esse país não existe!',
            'position_id.required' => 'Insira uma posição!',
            'position_id.integer' => 'Formato inválido, insira um número!',
            'position_id.exists' => 'Esse posição não existe!',
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
