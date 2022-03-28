<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurtainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curtain', function (Blueprint $table) {
            $table->string("name")->unique();
            $table->string("location");
            $table->integer("percentage")->default(0); # 0=0%(open) /// 1=25% /// 2=50% /// 3=75% /// 4=100%(dicht)
            $table->foreign("location")->references("name")->on("location");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('curtain', function (Blueprint $table) {
        //     $table->dropForeign('curtain_location_foreign');
        // });

        Schema::dropIfExists('curtain');
    }
}
