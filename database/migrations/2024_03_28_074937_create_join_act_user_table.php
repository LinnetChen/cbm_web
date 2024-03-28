<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinActUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_act_user', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('ip');
            $table->string('cbo_reward_server')->nullable();;
            $table->string('cbo_reward_get')->default('n');
            $table->string('cbm_serial_number')->nullable();
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
        Schema::dropIfExists('join_act_user');
    }
}
