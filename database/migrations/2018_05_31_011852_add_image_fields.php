<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('members', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('licence_details', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('hospital_details', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('ssnit_details', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('police_details', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('passport_details', function($table)
        {
            $table->string('image')->nullable();
        });
        Schema::table('electrol_details', function($table)
        {
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
