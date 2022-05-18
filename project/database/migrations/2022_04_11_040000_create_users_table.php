<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->fullText();
            $table->string('nickname')->fullText();
            $table->string('icon');
            $table->string('email')->unique()->fullText();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('company')->fullText();
            $table->string('department')->fullText();
            $table->string('length_of_service')->fullText();
            $table->integer('satisfaction')->default(0);
            $table->integer('match_count')->default(0);
            $table->boolean('is_search_target');
            $table->foreignId('account_status_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('role_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('password');
            $table->string('peer_id')->unique();
            $table->string('reason')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
