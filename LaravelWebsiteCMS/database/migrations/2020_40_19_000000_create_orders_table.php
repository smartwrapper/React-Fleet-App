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
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('delivery_boy_id')->nullable();

            
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_company')->nullable();
            $table->string('billing_street_aadress')->nullable();
            $table->string('billing_suburb')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_postcode')->nullable();
            $table->unsignedBigInteger('billing_country')->nullable();
            $table->unsignedBigInteger('billing_state')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('delivery_first_name')->nullable();
            $table->string('delivery_last_name')->nullable();
            $table->string('delivery_company')->nullable();
            $table->string('delivery_street_aadress')->nullable();
            $table->string('delivery_suburb')->nullable();
            $table->string('delivery_city')->nullable();
            $table->string('delivery_postcode')->nullable();
            $table->unsignedBigInteger('delivery_country')->nullable();
            $table->unsignedBigInteger('delivery_state')->nullable();
            $table->string('delivery_phone')->nullable();
            $table->string('payment_status')->default('Pending');
            $table->string('latlong')->nullable();
            $table->string('cc_type')->nullable();
            $table->string('cc_owner')->nullable();
            $table->string('cc_number')->nullable();
            $table->string('cc_expiry')->nullable();
            $table->unsignedBigInteger('currency_id')->nullable();
            $table->float('currency_value')->nullable();
            $table->float('order_price')->nullable();
            $table->float('shipping_cost')->nullable();
            $table->enum('shipping_method', ['shippingByWeight', 'localPickup', 'freeShipping', 'flateRate'])->nullable();
            $table->string('shipping_duration')->nullable();
            $table->string('order_notes')->nullable();
            $table->boolean('is_seen')->default('0')->comment('1 for seen & 0 for unseen');
            $table->string('coupon_code')->nullable();
            $table->float('coupon_amount')->nullable();
            $table->enum('payment_method', ['cod', 'paypal','authorize_net','stripe','banktransfer','mollie','instamojo','braintree','hyperpay','razorpay','paytm','paystack','midtrans'
            ])->default('cod');
            $table->string('transaction_id')->nullable();
            $table->enum('order_status', ['Pending','Inprocess','Dispatched','Complete', 'Return', 'Cancel', 'Shipped'])->default('Pending');
            $table->float('total_tax')->nullable();
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('currency_id')->references('id')->on('currency');
            $table->foreign('billing_country')->references('id')->on('countries');
            $table->foreign('billing_state')->references('id')->on('states');
            $table->foreign('delivery_country')->references('id')->on('countries');
            $table->foreign('delivery_state')->references('id')->on('states');

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
