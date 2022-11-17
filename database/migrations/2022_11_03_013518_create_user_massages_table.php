<?php

use App\Models\UserMassage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMassagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_massages', function (Blueprint $table) {
            $table->id();
            $table->text('image')->default('default.png');
            $table->longText('massage');
            $table->text('ticket_number')->uniqid();
            $table->longText('reply')->nullable();
            $table->text('subject');
            $table->text('status')->default('Pedding');
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->foreignId('reply_by')->nullable()->constrained('admins')->cascadeOnDelete();
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
        Schema::dropIfExists('user_massages');
    }
}
