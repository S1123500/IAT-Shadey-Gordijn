<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLightsensorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lightsensor', function (Blueprint $table) {
            $table->string("location"); #voor het gemak heeft elke location maximaal 1 lichtsensor
            $table->integer("value");
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
        // Schema::table('lightsensor', function (Blueprint $table) {
        //     $table->dropForeign('lightsensor_location_foreign');
        // });

        Schema::dropIfExists('lightsensor');
    }
}
