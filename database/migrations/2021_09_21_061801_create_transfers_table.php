<?php

use App\Enums\TransferStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger("payer_id");
            $table->unsignedBigInteger("payee_id");
            $table->decimal("amount", 15, 2);
            $table->enum("status", TransferStatus::asArray())->default(TransferStatus::Pending);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign("payer_id")
                ->references("id")
                ->on("customers")
                ->onUpdate("cascade")
                ->onDelete("cascade");

            $table->foreign("payee_id")
                ->references("id")
                ->on("customers")
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
        Schema::dropIfExists('transfers');
    }
}
