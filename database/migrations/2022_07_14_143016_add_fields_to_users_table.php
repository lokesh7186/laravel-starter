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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->string('username', 20)->unique()->after('id');
            $table->boolean('is_admin')->after('username')->default(0);
            $table->string('firstname', 50)->after('is_admin');
            $table->string('lastname', 50)->after('firstname')->nullable();
            $table->boolean('active')->after('remember_token')->default(1); // @Lokesh : All users are active unless marked by admin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->unique()->after('id');
            $table->dropColumn('username');
            $table->dropColumn('active');
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('is_admin');
        });
    }
};
