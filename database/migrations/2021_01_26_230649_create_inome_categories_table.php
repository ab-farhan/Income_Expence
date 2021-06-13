<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInomeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inome_categories', function (Blueprint $table) {
            $table->bigIncrements('income_cretegory_id');
            $table->string('income_cretegory_name')->unique();
            $table->string('income_cretegory_remark')->nullable();
            $table->string('income_cretegory_creator')->nullable();
            $table->integer('income_cretegory_status')->default(1);
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
        Schema::dropIfExists('inome_categories');
    }
}
