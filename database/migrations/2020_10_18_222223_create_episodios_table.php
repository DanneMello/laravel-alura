<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodios', function (Blueprint $table) {
            $table->bigIncrements('id'); // Id
            $table->integer('numero'); // Número de episódios
            $table->integer('temporada_id'); // Chave estrangeira

            $table->foreign('temporada_id')
                ->references('id')
                ->on('temporadas'); // 'temporada_id' faz referência ao 'id' da tabela 'series'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodios');
    }
}
