<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        $table->string('time')->nullable();  // For event time
        $table->string('venue')->nullable(); // For event venue
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        $table->dropColumn(['time', 'venue']);
    });
}

};
