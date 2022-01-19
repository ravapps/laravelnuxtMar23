<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned();

            $table->string('degree_name');
            $table->string('degree_univ');
            $table->string('year_passed');
            $table->string('score_grade');

            //$table->timestamps();
            $table->date('created_at');->default(DB::raw('NOW()'));
            $table->date('updated_at');->default(DB::raw('NOW()'));
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->primary('id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_education');
    }
}
