<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leads', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('nome', 30);
            $table->string('email');
            $table->integer('telefone');
            $table->date('nascimento');
            $table->string('cep', 8);
            $table->string('rua', 50);
            $table->string('bairro', 20);
            $table->string('cidade', 20);
            $table->string('estado', 2);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leads');
	}

}
