<?php

use App\Models\ChildCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('child_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->restrictOnDelete();
            $table->foreignId('sub_category_id')->constrained('sub_categories')->restrictOnDelete();
            $table->text('image')->default('default.png');
            $table->text('name')->unique();
            $table->integer('serial')->unique();
            $table->text('slug')->unique();
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('status')->default(ChildCategory::ACTIVE_CHILD_CATEGORY);
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
        Schema::dropIfExists('child_categories');
    }
}
