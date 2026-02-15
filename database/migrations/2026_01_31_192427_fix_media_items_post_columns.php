<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('media_items', function (Blueprint $table) {
            if (!Schema::hasColumn('media_items', 'media_post_id')) {
            // Links each media item to a media post, if deleted, the item is kept with FK set to null    
            $table->foreignId('media_post_id')
                    ->nullable()
                    ->constrained('media_posts')
                    ->nullOnDelete();
            }

            // Media ordering preservation
            if (!Schema::hasColumn('media_items', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('media_items', function (Blueprint $table) {
            if (Schema::hasColumn('media_items', 'media_post_id')) {
                $table->dropConstrainedForeignId('media_post_id');
            }

            if (Schema::hasColumn('media_items', 'sort_order')) {
                $table->dropColumn('sort_order');
            }
        });
    }
};

