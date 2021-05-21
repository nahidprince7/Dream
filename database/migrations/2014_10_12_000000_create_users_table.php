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

            $table->string('name');
            $table->string('email')->unique();
            $table->string('picture')->nullable()->default(null);
            $table->string('number')->nullable()->default(null);
            $table->tinyInteger('gender')->nullable()->default('1')->comment('1=male, 2=female');
            $table->string('password');
            $table->nullableTimestamps();
            $table->softDeletes();
            $table->bigInteger('created_by')->default(0)->comment('0=automatically');
            $table->bigInteger('updated_by')->default(0)->comment('0=automatically');
            $table->bigInteger('deleted_by')->nullable();
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
