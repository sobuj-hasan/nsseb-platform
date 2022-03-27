<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('billing_id');
            $table->integer('discount')->nulllable();
            $table->integer('subtotal');
            $table->integer('shipping');
            $table->integer('vat');
            $table->integer('total');
            $table->integer('payment_status');  // 1 for unpaid 2 for paid
            $table->integer('status'); // 1 for pending 2 for processing 3 for onthe way 4 for delivery 5 fore can cel
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
        Schema::dropIfExists('orders');
    }
}
