<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('store_name')->nullable();
            $table->string('store_address')->nullable();
            $table->string('activity_type')->nullable();
            $table->string('gender')->nullable();
            $table->string('age')->nullable();
            $table->string('nationality')->nullable();
            $table->string('education')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('social_status')->nullable();
            $table->string('children')->nullable();
            $table->string('tribe')->nullable();
            $table->string('occupation')->nullable();
            $table->string('workplace')->nullable();
            $table->string('salary')->nullable();
            $table->string('living_place')->nullable();
            $table->string('attributes_trait')->nullable();
            $table->string('profile_photo')->default('default.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role')->comment('1=admin, 2=merchant, 3=user');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
