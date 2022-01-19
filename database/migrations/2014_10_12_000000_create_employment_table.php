<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_employment', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->unsigned();

            $table->string('desig_company');
            $table->string('from_date');
            $table->string('to_date');
            $table->string('responsibility_detail');
            $table->string('any_references')->nullable();

            $table->date('created_at');->default(DB::raw('NOW()'));
            $table->date('updated_at');->default(DB::raw('NOW()'));

            //$table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('user_employment');
    }
}
