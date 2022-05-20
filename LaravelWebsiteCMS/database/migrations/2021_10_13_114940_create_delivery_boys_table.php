<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryBoysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_boys', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone_number')->unique();
            $table->string('avatar')->nullable();
            $table->string('dob')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('commission')->nullable();
            $table->string('email_address')->nullable();
            $table->string('pin_code');
            $table->boolean('status');
            $table->boolean('availability_status');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->foreignId('country')->constrained('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->string('in_active')->nullable();
            $table->string('zip_code')->nullable();
            $table->foreignId('state')->constrained('states')->onUpdate('cascade')->onDelete('cascade');
            $table->string('vehicle_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->string('vehicle_registration_no')->nullable();
            $table->string('vehicle_details')->nullable();
            $table->string('driving_license_no')->nullable();
            $table->string('vehicle_rc_book_no')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('gpay_number')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('branch_name')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('delivery_boys');
    }
}
