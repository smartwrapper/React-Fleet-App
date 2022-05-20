<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->text('value');
            $table->enum('type', ['client_secret', 'business_general', 'pos', 'email_smtp', 'email_template', 'sms', 'invoice', 'barcode', 'website_general', 'seo', 'app_login_signup', 'website_login_signup', 'app_general', 'gallary_setting', 'store_setting', 'business_notification_setting', 'app_display_in_setting', 'app_notification_setting', 'web_theme_setting', 'point_setting', 'membership_setting', 'email_notify_setting','login_credential','is_purchased_setting','kundol_web_setting','business_firebase_setting','business_google_setting']);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
