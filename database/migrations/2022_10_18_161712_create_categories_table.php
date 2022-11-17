<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->text('image')->default('default.png');
            $table->text('name')->unique();
            $table->integer('serial')->unique();
            $table->text('slug')->unique();
            $table->text('meta_title')->nullable();
            $table->text('meta_details')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('status')->default(Category::ACTIVE_CATEGORY);
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
        Schema::dropIfExists('categories');
    }
}
