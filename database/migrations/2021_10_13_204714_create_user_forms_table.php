<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_forms', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('mother_tongue')->nullable();
            $table->string('country')->nullable();
            $table->string('merital_status')->nullable();
            $table->string('blood')->nullable();
            $table->string('annual_income')->nullable();
            $table->longText('your_about')->nullable();
            $table->string('education')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('skin_tune')->nullable();
            $table->string('eay_color')->nullable();
            $table->string('hear_color')->nullable();
            $table->string('body_type')->nullable();
            $table->string('family_type')->nullable();
            $table->string('family_status')->nullable();
            $table->string('occupation')->nullable();
            $table->string('disability')->nullable();
            $table->string('hobby')->nullable();
            $table->string('habits')->nullable();
            $table->string('per_country')->nullable();
            $table->string('per_state')->nullable();
            $table->string('per_city')->nullable();
            $table->string('per_road')->nullable();
            $table->string('per_house')->nullable();
            $table->string('present_country')->nullable();
            $table->string('peresent_state')->nullable();
            $table->string('present_city')->nullable();
            $table->string('present_road')->nullable();
            $table->string('present_house')->nullable();
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
        Schema::dropIfExists('user_forms');
    }
}
