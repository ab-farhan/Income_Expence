<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpenceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expence_categories', function (Blueprint $table) {
            $table->bigIncrements('expence_cretegory_id');
            $table->string('expence_cretegory_name')->nullable();
            $table->string('expence_cretegory_remark')->nullable();
            $table->string('expence_cretegory_creator')->nullable();
            $table->integer('expence_cretegory_status')->default(1);
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
        Schema::dropIfExists('expence_categories');
    }
}
