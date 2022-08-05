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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->text('setting_type')->string()->index();
            $table->boolean('is_system')->default(0);
            $table->string('key')->unique();
            $table->text('value')->nullable();
            $table->integer('sort_order')->index();
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
        Schema::dropIfExists('app_settings');
    }
};
