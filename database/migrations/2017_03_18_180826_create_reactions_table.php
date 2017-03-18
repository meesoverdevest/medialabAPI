<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->longText('description');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });

        Schema::create('adjustment_reaction', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('adjustment_id');
            $table->unsignedInteger('reaction_id');

            $table->primary(['adjustment_id', 'reaction_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reactions');
        Schema::dropIfExists('adjustment_reaction');
    }
}
