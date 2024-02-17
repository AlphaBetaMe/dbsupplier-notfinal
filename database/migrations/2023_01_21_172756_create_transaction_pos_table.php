b <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionPosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_pos', function (Blueprint $table) {
            $table->id();
            $table->string('posOrder_id');
            $table->string('payment');
            $table->string('change');
            $table->string('transaction_date');
            $table->string('transaction_amount');
            $table->string('user_id');
            $table->string('paymentMethod');
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
        Schema::dropIfExists('transaction_pos');
    }
}
