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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('event_id')->nullable();
            $table->string('fname');
            $table->string('sname')->nullable();
            $table->string('phone')->nullable();
            $table->string('evt_id');
            $table->string('ticket_code');
            $table->string('email')->nullable();
            $table->string('qty');
            $table->string('reference')->nullable();
            $table->string('status')->default('yes');
            $table->string('ticket')->default('yes');
            $table->string('admitted')->nullable();
            $table->string('del')->default('no');
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
        Schema::dropIfExists('tickets');
    }
};
