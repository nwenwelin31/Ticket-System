<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
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
            $table->string('title');
            $table->longText('message');
            $table->string('priority');
            $table->longText('file');
            $table->enum('status',[0,1])->default(1)->comment('close is 0 & open is 1');
            $table->foreignId('user_id');
            $table->foreignId('agent_id')->nullable();
            // $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            // $table->foreignId('label_id')->constrained()->cascadeOnDelete();
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
}
