<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->json('translations')->nullable()->after('content');
            $table->string('status', 20)->default('published')->after('is_published');
            $table->foreignId('author_id')->nullable()->after('author_title');
        });

        // Migrate existing legacy articles to structured translations (en)
        $posts = DB::table('blog_posts')->get();
        foreach ($posts as $post) {
            $translations = [
                'en' => [
                    'locale' => 'en',
                    'title' => $post->title,
                    'excerpt' => $post->excerpt ?? '',
                    'content' => $post->content ?? '',
                    'audio_url' => null,
                    'meta_title' => $post->meta_title ?? '',
                    'meta_description' => $post->meta_description ?? '',
                ],
            ];

            DB::table('blog_posts')->where('id', $post->id)->update([
                'translations' => json_encode($translations),
                'status' => $post->is_published ? 'published' : 'draft',
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn(['translations', 'status', 'author_id']);
        });
    }
};
