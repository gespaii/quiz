<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_teachers', function (Blueprint $table) {
            $table->id('id_teachers');
            $table->string('name_teachers');
            $table->string('city');
            $table->string('pob');
            $table->date('dob');
            $table->timestamps();
            
        });

        DB::table('tb_teachers')->insert([
            'name_teachers' => 'Teachers',
            'city' => 'Jakarta',
            'pob' => 'Place Of Birth',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_teachers');
    }
}