<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('alt_email')->nullable();
            $table->string('address');
            $table->string('pincode');
            $table->string('photo_path');
            $table->string('resume_path');
            $table->string('phone');
            $table->string('father');
            $table->string('mother')->nullable();
            $table->string('passport')->nullable();
            $table->date('dob');
            $table->string('objective')->nullable();
            $table->string('income_tax_payee')->nullable();
            $table->string('about')->nullable();
            $table->string('communication_preffered');
            $table->string('hobbies')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          //  $table->primary('id');
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
        Schema::dropIfExists('user_details');
    }
}
