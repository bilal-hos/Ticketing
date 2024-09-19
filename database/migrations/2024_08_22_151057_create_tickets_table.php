<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->enum('status', ['pending', 'OnGoing', 'finished']);
            $table->date('dead_line');
             // Adding foreign key columns before setting up constraints
             $table->unsignedBigInteger('creator_id'); // User who created the ticket
             $table->unsignedBigInteger('assigned_user_id'); // User to whom the ticket is assigned

             // Set up foreign key constraints
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('assigned_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
