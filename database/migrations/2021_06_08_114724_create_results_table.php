
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger('day_1_r_1')->default(0);
            $table->tinyInteger('day_1_r_2')->default(0);
            $table->tinyInteger('day_1_r_3')->default(0);
            $table->tinyInteger('day_1_r_4')->default(0);
            $table->tinyInteger('day_2_r_1')->default(0);
            $table->tinyInteger('day_2_r_2')->default(0);
            $table->tinyInteger('day_2_r_3')->default(0);
            $table->tinyInteger('day_2_r_4')->default(0);
            $table->tinyInteger('day_3_r_1')->default(0);
            $table->tinyInteger('day_3_r_2')->default(0);
            $table->tinyInteger('day_3_r_3')->default(0);
            $table->tinyInteger('day_3_r_4')->default(0);
            $table->tinyInteger('day_4_r_1')->default(0);
            $table->tinyInteger('day_4_r_2')->default(0);
            $table->tinyInteger('day_4_r_3')->default(0);
            $table->tinyInteger('day_4_r_4')->default(0);
            $table->tinyInteger('day_5_r_1')->default(0);
            $table->tinyInteger('day_5_r_2')->default(0);
            $table->tinyInteger('day_5_r_3')->default(0);
            $table->tinyInteger('day_5_r_4')->default(0);
            $table->tinyInteger('day_6_r_1')->default(0);
            $table->tinyInteger('day_6_r_2')->default(0);
            $table->tinyInteger('day_6_r_3')->default(0);
            $table->tinyInteger('day_6_r_4')->default(0);
            $table->tinyInteger('day_7_r_1')->default(0);
            $table->tinyInteger('day_7_r_2')->default(0);
            $table->tinyInteger('day_7_r_3')->default(0);
            $table->tinyInteger('day_7_r_4')->default(0);
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
        Schema::dropIfExists('results');
    }
}
