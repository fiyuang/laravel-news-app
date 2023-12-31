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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->uuid("uuid")->nullable()->index();
            $table->string('title');
            $table->text('description');
            $table->bigInteger("news_id")->nullable()->unsigned()->index();
            $table->bigInteger("created_by")->nullable()->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
