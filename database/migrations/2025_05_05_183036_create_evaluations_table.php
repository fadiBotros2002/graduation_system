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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->bigIncrements('evaluation_id');
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('project_id')->on('projects')->onDelete('cascade');

            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id')->references('user_id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('head_id')->nullable();
            $table->foreign('head_id')->references('user_id')->on('users')->onDelete('set null');

            $table->integer('progress_score')->nullable();
            $table->text('progress_comment')->nullable();

            $table->integer('final_score')->nullable();
            $table->text('final_comment')->nullable();

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
