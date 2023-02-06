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
        Schema::create('label_ticket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('label_id')->constrained('labels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('ticket_id')->constrained('tickets')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('label_ticket');
    }
};
