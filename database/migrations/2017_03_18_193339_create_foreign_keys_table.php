<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('upvotes', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('reaction_id')
                ->references('id')
                ->on('reactions')
                ->onDelete('cascade');
        });

        Schema::table('adjustment_reaction', function (Blueprint $table) {
            $table->foreign('adjustment_id')
                ->references('id')
                ->on('adjustments')
                ->onDelete('cascade');

            $table->foreign('reaction_id')
                ->references('id')
                ->on('reactions')
                ->onDelete('cascade');
        });

        Schema::table('reactions', function (Blueprint $table) {

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::table('adjustments', function (Blueprint $table) {
            $table->foreign('neighbourhood_id')
                ->references('id')
                ->on('neighbourhoods')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('upvotes', function (Blueprint $table) {

            $table->dropForeign('user_id');

            $table->dropForeign('reaction_id');
        });

        Schema::table('adjustment_reaction', function (Blueprint $table) {
            $table->dropForeign('adjustment_id');

            $table->dropForeign('reaction_id');
        });

        Schema::table('reactions', function (Blueprint $table) {

            $table->dropForeign('user_id');
        });

        Schema::table('adjustments', function (Blueprint $table) {
            $table->dropForeign('neighbourhood_id');
        });
    }
}
