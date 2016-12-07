<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model {

	protected $fillable = ['nome', 'email', 'telefone', 'nascimento', 'cep', 'rua', 'bairro', 'cidade', 'estado'];

}
