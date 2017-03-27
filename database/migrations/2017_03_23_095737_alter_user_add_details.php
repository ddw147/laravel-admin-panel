<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {
            $table->string('mobile');
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_locked')->default(false);
            $table->string('fcm_token')->nullable();
            $table->string('api_token', 60)->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function($table) {
            $table->dropColumn('mobile');
            $table->dropColumn('is_verified');
            $table->dropColumn('fcm_token');
            $table->dropColumn('api_token');
        });
    }
}
