<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('ref_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('phone');
            $table->string('email')->nullable()->unique();
            $table->string('place_of_birth');
            #Parent
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_nationality')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_nationality')->nullable();
            $table->string('proc_center')->nullable();
//            $table->string('sig')->nullable();

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
        Schema::dropIfExists('members');
    }
}
