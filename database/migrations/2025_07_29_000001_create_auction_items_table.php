<?php

use App\Models\ItemStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionItemsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('auction_items', function (Blueprint $table) {
            $table->id();

            // Donor Information
            $table->string('donor_name');
            $table->string('individual_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
            $table->string('address_2')->nullable();

            // Item Information
            $table->string('item_name');
            $table->decimal('item_value', 10, 2)->nullable();
            $table->string('item_image_path')->nullable();
            $table->text('description')->nullable();
            $table->text('terms_and_conditions')->nullable();

            // FAAN Volunteer Information
            $table->string('faan_volunteer')->nullable();
            $table->string('volunteer_email')->nullable();
            $table->dateTime('item_received_timestamp')->nullable();

            // Status tracking
            $table->foreignId('status_id')->constrained('item_statuses')->default(1);
            $table->text('admin_notes')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_items');
    }
}
