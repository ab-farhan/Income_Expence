<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('income_id');
            $table->string('income_details',200)->nullable();
            $table->integer('income_amount')->nullable();
            $table->integer('income_cate_id');
            $table->string('income_date')->nullable();
            $table->string('income_slug',100)->nullable();
            $table->integer('income_status')->default(1); 
            $table->string('income_creator',50)->nullable(); 
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
        Schema::dropIfExists('incomes');
    }
}
