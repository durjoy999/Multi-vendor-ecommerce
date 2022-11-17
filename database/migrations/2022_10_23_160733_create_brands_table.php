<?php

use App\Models\Brand;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->text('image')->default('default.png');
            $table->text('name')->unique();
            $table->integer('serial')->unique();
            $table->text('slug')->unique();
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('status')->default(Brand::ACTIVE_BRAND);
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
        Schema::dropIfExists('brands');
    }
}
