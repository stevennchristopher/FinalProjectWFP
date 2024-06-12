<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->string('name');
            $table->string('address');
            $table->string('postcode');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string("country_id");
            $table->double('longitude', 8, 3);
            $table->double('latitude', 8, 3);
            $table->bigInteger('phone');
            $table->bigInteger('fax');
            $table->string('email');
            $table->string('currency');
            $table->string('accommodation_type');
            $table->string('category');
            $table->string('web');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            $table->dropColumn(['name', 'address', 'postcode', 'city', 'state', 'country', 'country_id',
            'longitude', 'latitude', 'phone', 'fax', 'email', 'currency', 'accommodation_type', 'category', 'web']);
        });
    }
};
