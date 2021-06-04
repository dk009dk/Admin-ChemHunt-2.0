<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('day_1_q_1')->nullable();
            $table->text('day_1_q_2')->nullable();
            $table->text('day_1_q_3')->nullable();
            $table->text('day_1_q_4')->nullable();
            $table->dateTime('day_1_time')->nullable();
            $table->text('day_2_q_1')->nullable();
            $table->text('day_2_q_2')->nullable();
            $table->text('day_2_q_3')->nullable();
            $table->text('day_2_q_4')->nullable();
            $table->dateTime('day_2_time')->nullable();
            $table->text('day_3_q_1')->nullable();
            $table->text('day_3_q_2')->nullable();
            $table->text('day_3_q_3')->nullable();
            $table->text('day_3_q_4')->nullable();
            $table->dateTime('day_3_time')->nullable();
            $table->text('day_4_q_1')->nullable();
            $table->text('day_4_q_2')->nullable();
            $table->text('day_4_q_3')->nullable();
            $table->text('day_4_q_4')->nullable();
            $table->dateTime('day_4_time')->nullable();
            $table->text('day_5_q_1')->nullable();
            $table->text('day_5_q_2')->nullable();
            $table->text('day_5_q_3')->nullable();
            $table->text('day_5_q_4')->nullable();
            $table->dateTime('day_5_time')->nullable();
            $table->text('day_6_q_1')->nullable();
            $table->text('day_6_q_2')->nullable();
            $table->text('day_6_q_3')->nullable();
            $table->text('day_6_q_4')->nullable();
            $table->dateTime('day_6_time')->nullable();
            $table->text('day_7_q_1')->nullable();
            $table->text('day_7_q_2')->nullable();
            $table->text('day_7_q_3')->nullable();
            $table->text('day_7_q_4')->nullable();
            $table->dateTime('day_7_time')->nullable();
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
        Schema::dropIfExists('answers');
    }
}
