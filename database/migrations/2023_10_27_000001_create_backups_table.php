<?php

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
        Schema::create('backups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('backup_setting_id')->nullable()->constrained('backup_settings')->onDelete('set null');
            $table->string('name'); // e.g., coolify-2023-10-27_10-00-00.tar.gz
            $table->string('type'); // coolify_instance, all_databases, all_volumes, resource_database, resource_volume
            $table->string('path'); // Path on remote storage
            $table->string('disk'); // s3, sftp, webdav, local
            $table->unsignedBigInteger('size')->nullable(); // in bytes
            $table->boolean('is_encrypted')->default(false);
            $table->boolean('is_locked')->default(false); // Prevents automatic deletion
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backups');
    }
};

