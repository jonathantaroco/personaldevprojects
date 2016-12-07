<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class LeadRequest extends Request {

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
			'nome' => 'required|min:5',
            'email' => 'required|email',
            'telefone' => 'required|numeric',
            'nascimento' => 'required',
            'cep' => 'required|numeric',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'estado' => 'required|min:2|max:2'
		];
	}

}
