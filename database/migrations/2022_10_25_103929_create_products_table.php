<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('thumbnail_image')->nullable();
            $table->foreignId('brand_id')->constrained('brands')->restrictOnDelete();
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->restrictOnDelete();
            $table->foreignId('child_category_id')->constrained('child_categories')->restrictOnDelete();
            $table->longText('title');
            $table->string('sku')->unique();
            $table->longText('slug')->unique();
            $table->double('previous_price')->nullable();
            $table->double('current_price');
            $table->text('short_details')->nullable();
            $table->longText('long_details')->nullable();
            $table->integer('stock')->default(0);
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('offer_product')->default(Product::OFFER_PRODUCT_NO);
            $table->string('status')->default(Product::ACTIVE_PRODUCT);
            $table->foreignId('tax_id')->nullable()->constrained('taxes')->restrictOnDelete();
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
        Schema::dropIfExists('products');
    }
}
