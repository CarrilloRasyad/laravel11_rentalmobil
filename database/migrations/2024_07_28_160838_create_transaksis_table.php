<?php

use App\Models\Mobil;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Mobil::class);
            $table->string('nama')->nullable();
            $table->string('ponsel')->nullable();
            $table->string('alamat')->nullable();
            $table->string('waktu')->nullable();
            $table->date('tgl_pesanan')->nullable();
            $table->integer('total')->nullable();
            $table->enum('status',['WAIT', 'PROSES', 'SELESAI'])->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};