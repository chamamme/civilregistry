<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passport_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_id');
            $table->string('member_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('place_of_birth');
            $table->string('height');
            $table->date('dob');
            $table->enum('gender',['male','female']);
            $table->string('residential_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('nationality');
            $table->enum('id_type',['national_id','voters','dvla']);
            $table->string('id_number');
            $table->string('email');
            $table->string('phone');
            $table->string('garantee_name1')->nullable();
            $table->string('garantee_contact1')->nullable();
            $table->string('garantee_name2')->nullable();
            $table->string('garantee_contact2')->nullable();
            #PASS
            $table->enum('marital_status',['single','married','divorced']);
            $table->string('profession')->nullable();
            $table->string('snit_no')->nullable();
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
        Schema::dropIfExists('passport_details');
    }
}
