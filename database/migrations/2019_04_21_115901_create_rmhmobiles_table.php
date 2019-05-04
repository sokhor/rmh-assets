<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRmhmobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rmhmobiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_code')->unique();
            $table->string('os');
            $table->string('building');
            $table->string('campus');
            $table->string('department');
            $table->string('floor');
            $table->string('location')->nullable();
            $table->string('serial_number');
            $table->string('make');
            $table->string('model');
            $table->string('ram')->nullable();
            $table->text('notes')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('replaced')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rmhmobiles');
    }
}
