<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailSaleChild extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_sale_child', function (Blueprint $table) {
          $table->increments('retail_sale_child_id');
          $table->string('date');
          $table->string('customer_name');
          $table->string('invoice_id');
          $table->string('grand_total');
          $table->string('payment');
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
        Schema::dropIfExists('retail_sale_child');
    }
}
