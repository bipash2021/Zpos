<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('supplier_id');

            $table->Integer('product_id');
            $table->Integer('category_id');

            $table->string('purchase_no');
            $table->date('date');            
            $table->string('description')->nullable();            
            $table->double('buying_qty');
            $table->double('unit_price');
            $table->double('buying_price');
            $table->string('status')->default('0')->comment('0=pending,1=approved');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('purchases');
    }
};
