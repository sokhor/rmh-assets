<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMhpmobilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mhpmobiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('asset_code')->unique();
            $table->string('os');
            $table->string('services')->nullable();
            $table->string('campus');
            $table->string('team')->nullable();
            $table->string('floor')->nullable();
            $table->string('location')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('make');
            $table->string('model');
            $table->string('ram')->nullable();
            $table->text('notes')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('printer_mapped')->nullable();
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
        Schema::dropIfExists('mhpmobiles');
    }
}
