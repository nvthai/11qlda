<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('participations', function (Blueprint $table) {
            $table->string('ClassId', 10);
            $table->string('TeacherId', 10);
            $table->string('PartnerId', 10);
            //$table->date('updated_at', 10);
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
        Schema::drop('participations');
    }
}
