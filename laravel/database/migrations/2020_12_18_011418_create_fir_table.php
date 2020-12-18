<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fir', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cname', 300);
            $table->string('mno');
            $table->longText('address');
            $table->string('caname', 300);
            $table->string('cano');
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
        Schema::dropIfExists('fir');
    }
}
