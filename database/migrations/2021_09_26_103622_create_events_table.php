<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string("slug")->nullable();
            $table->string("title");
            $table->text("body")->nullable();
            $table->string("thumbnail")->nullable();

            $table->timestamp("start_date");
            $table->timestamp("end_date");

            $table->foreignId("user_id")
                ->references('id')->on('users')
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
        Schema::dropIfExists('events');
    }
}
