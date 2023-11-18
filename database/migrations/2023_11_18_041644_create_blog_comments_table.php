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
        Schema::create('blog_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('blog_id');
            $table->unsignedBigInteger('user_id');
            $table->string('user_role'); // role Admin, Customer, ...
            $table->text('content');
            $table->string('status'); // trang thái được public hoặc hàng chờ xét duyệt
            $table->string('is_submit');  // user public comment
            $table->string('is_deleted'); // user đã xóa
            $table->string('ip_address');
            $table->string('ip_spam');
            $table->string('report_count'); // sl tick report
            $table->timestamps();
        
            $table->foreign('blog_id')->references('id')->on('blogs');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_role')->references('role_as')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_comments');
    }
};
