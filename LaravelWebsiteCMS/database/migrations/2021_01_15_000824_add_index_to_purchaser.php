<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexToPurchaser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchaser', function (Blueprint $table) {
            $table->index('first_name');
            $table->index('last_name');
            $table->index('address');
            $table->index('phone');
            $table->index('mobile');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchaser', function (Blueprint $table) {
            $table->dropIndex('purchaser_first_name_index');
            $table->dropIndex('purchaser_last_name_index');
            $table->dropIndex('purchaser_address_index');
            $table->dropIndex('purchaser_phone_index');
            $table->dropIndex('purchaser_mobile_index');
        });
    }
}
