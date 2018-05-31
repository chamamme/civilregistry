<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElectrolDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrol_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_id');
            $table->string('member_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->string('residential_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('nationality');
            $table->string('card_number');
            $table->string('email');
            $table->string('phone');
            #PASS
            $table->string('profession')->nullable();
            $table->string('biodata')->nullable();

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
        Schema::dropIfExists('electrol_details');
    }
}
