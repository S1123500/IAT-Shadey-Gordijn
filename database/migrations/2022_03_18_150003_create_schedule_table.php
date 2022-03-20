<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string("curtainName");
            $table->string("whichDay");
            $table->time("timeOpen")->nullable();
            $table->time("timeClose")->nullable();
            $table->integer("percentage1"); # 0=0%(open) /// 1=25% /// 2=50% /// 3=75% /// 4=100%(dicht)
            $table->integer("percentage2")->nullable(); # 0=0%(open) /// 1=25% /// 2=50% /// 3=75% /// 4=100%(dicht)
            $table->foreign("curtainName")->references("name")->on("curtain");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('schedule', function (Blueprint $table) {
        //     $table->dropForeign('schedule_curtain name_foreign');
        // });

        Schema::dropIfExists('schedule');
    }
}
