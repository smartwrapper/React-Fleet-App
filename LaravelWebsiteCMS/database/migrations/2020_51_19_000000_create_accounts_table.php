<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('account_type')->nullable();
            $table->tinyInteger('status')->default('1')->comment('1 for active & 0 for inactive');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->enum('type',['customer','supplier','tax','shipping','couponcode','discount','sale'])->nullable();
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
        Schema::dropIfExists('accounts');
    }
}
