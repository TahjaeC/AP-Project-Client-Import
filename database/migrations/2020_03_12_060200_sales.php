<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table->bigIncrements('id');
        $table->json('products');
        $table->double('sale');
        $table->int('quantity');
        $table->double('total_sales');
        $table->int('total_quantity');
        $table->string('customer');
        $table->rememberToken();
        $table->timestamps();
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
