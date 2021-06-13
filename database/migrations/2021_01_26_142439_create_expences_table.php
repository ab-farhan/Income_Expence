<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expences', function (Blueprint $table) {
            $table->bigIncrements('expence_id');
            $table->integer('expence_cretegory_id');
            $table->string('expence_details',180)->nullable();
            $table->string('expence_amount')->nullable();
            $table->string('expence_date',50)->nullable();
            $table->string('expence_creator',50)->nullable();
            $table->string('expence_slug',100)->nullable();
            $table->integer('expence_status')->default(1);
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
        Schema::dropIfExists('expences');
    }
}
