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
        Schema::create('order_summaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_country_id');
            $table->string('customer_city_name');
            $table->text('customer_address');
            $table->string('customer_number');
            $table->longText('customer_order_notes');
            $table->string('payment_method');
            $table->float('sub_total');
            $table->float('shipping_charge');
            $table->float('grand_total');
            $table->string('payment_status')->default('unpaid');
            $table->string('order_status')->default('processing');
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
        Schema::dropIfExists('order_summaries');
    }
};
