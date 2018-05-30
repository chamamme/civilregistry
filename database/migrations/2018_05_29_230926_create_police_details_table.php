<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoliceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('police_details', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_id');
            $table->string('member_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender',['male','female']);
            $table->string('residential_address')->nullable();
            $table->string('postal_address')->nullable();
            $table->string('phone');
            $table->string('case_number');
            $table->string('case_type');
            $table->string('case_report');
            $table->string('officer_in_charge');
            #PASS
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
        Schema::dropIfExists('police_details');
    }
}
