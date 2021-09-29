<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string("slug")->nullable();
            $table->string("title");
            $table->text("body")->nullable();
            $table->string("thumbnail")->nullable();
            $table->unsignedBigInteger("visits")->default(0);

            $table->foreignId("category_id")
                ->constrained()
                ->onDelete("cascade");

            $table->foreignId("user_id")
                ->constrained()
                ->onDelete("cascade");

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
        Schema::dropIfExists('posts');
    }
}
