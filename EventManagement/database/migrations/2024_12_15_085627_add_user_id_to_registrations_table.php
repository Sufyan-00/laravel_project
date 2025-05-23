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
    Schema::table('registrations', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable(); // Add user_id column
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Define foreign key relationship
    });
}

public function down()
{
    Schema::table('registrations', function (Blueprint $table) {
        $table->dropColumn('user_id');
    });
}
};
