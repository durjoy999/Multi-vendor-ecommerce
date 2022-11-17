<?php

use App\Models\Coupon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('coupon_code')->unique();
            $table->integer('number_of_times')->default(0);
            $table->integer('number_of_times_remaining')->default(0);
            $table->string('discount_type')->default(Coupon::FLAT_COUPON);
            $table->double('discount_amount')->default(0);
            $table->dateTime('expiration_date');
            $table->string('status')->default(Coupon::ACTIVE_COUPON);
            $table->foreignId('created_by')->constrained('admins')->cascadeOnDelete();
            $table->foreignId('edited_by')->nullable()->constrained('admins')->cascadeOnDelete();
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
        Schema::dropIfExists('coupons');
    }
}
