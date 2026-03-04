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
        Schema::table('settings', function (Blueprint $table) {
            $table->string('site_logo')->nullable()->after('facebook_image');
            $table->string('favicon_image')->nullable()->after('site_logo');
            $table->string('meta_author')->nullable()->after('facebook_detail');
            $table->text('meta_keywords')->nullable()->after('meta_author');
            $table->string('og_url')->nullable()->after('meta_keywords');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'site_logo',
                'favicon_image',
                'meta_author',
                'meta_keywords',
                'og_url',
            ]);
        });
    }
};
