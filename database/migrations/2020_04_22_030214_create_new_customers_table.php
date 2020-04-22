<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('channel_id')->unsigned();
            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('restrict');
            $table->string('full_name');
            $table->string('mobile')->unique();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique()->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('password');
            $table->integer('customer_group_id')->unsigned()->nullable();
            $table->foreign('customer_group_id')->references('id')->on('customer_groups')->onDelete('set null');
            $table->boolean('subscribed_to_news_letter')->default(0);
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
        Schema::dropIfExists('new_customers');
    }
}
