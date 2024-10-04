<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->integer('id')->unique()->autoIncrement();
            $table->unsignedBigInteger('user_created_at')->nullable();
            $table->unsignedBigInteger('user_closed_at')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('requestTitle');
            $table->text('requestDescription');
            $table->enum('status',['bekliyor','reddedildi','tamamlandı','işlem yapılıyor'])->default('bekliyor');
            $table->text('requestReply')->nullable();
            $table->integer('last_activity')->index()->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('upload_path')->nullable();

            $table->foreign('user_created_at')->references('id')->on('users');
            $table->foreign('user_closed_at')->references('id')->on('users');
        });






    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
