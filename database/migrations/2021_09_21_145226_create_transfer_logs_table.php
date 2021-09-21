<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_logs', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger("transfer_id");
            $table->string("description", 255);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("transfer_id")
                ->references("id")
                ->on("transfers")
                ->onUpdate("cascade")
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_logs');
    }
}
