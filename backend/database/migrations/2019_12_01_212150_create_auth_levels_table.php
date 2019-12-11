<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('level');
        });

        // Add rows for auth items
        DB::table('auth_levels')->insert([
            ['level' => 'master'],
            ['level' => 'admin'],
            ['level' => 'member']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_levels');
    }
}
