<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('article_id');
            $table->unsignedInteger('uid')->comment('登录用户id');
            $table->unsignedTinyInteger('is_delete')->default(0)->comment('是否删除 1未删除 2已删除');
            $table->unsignedTinyInteger('is_hot')->default(0)->comment('是否热门 1非热门 2热门');
            $table->unsignedTinyInteger('is_recommended')->default(0)->comment('是否推荐 1非推荐 2推荐');
            $table->string('article_title', 50)->collation('utf8mb4_unicode_ci')->comment('文章标题');
            $table->string('article_describe', 50)->collation('utf8mb4_unicode_ci')->nullable()->comment('文章描述');
            $table->binary('article_images')->nullable()->comment('文章预览图');
            $table->longText('article_content')->collation('utf8mb4_unicode_ci')->nullable()->comment('文章内容');
            $table->unsignedInteger('reading_nums')->comment('阅读量');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
