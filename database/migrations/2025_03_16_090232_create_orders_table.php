<?php

use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string('customer_last_name');
            $table->string('customer_first_name');
            $table->string('customer_middle_name')
                ->nullable();

            $table->string('status')
                ->default(\App\Enums\OrderStatus::New->value);

            $table->text('customer_comment')
                ->nullable();

            $table->foreignIdFor(Product::class, 'product_id')
                ->constrained('products');

            $table->integer('quantity');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
