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
        Schema::create('backup_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // e.g., 'global'
            $table->string('disk')->default('s3'); // s3, sftp, webdav, local
            $table->json('disk_settings')->nullable(); // credentials, bucket, path, etc.
            $table->string('encryption_key')->nullable(); // AES-256 key
            $table->string('encryption_type')->default('aes-256-cbc');
            $table->integer('retention_days')->default(7); // How many days to keep backups
            $table->integer('retention_count')->default(10); // How many backups to keep
            $table->boolean('delete_local_after_upload')->default(true);
            $table->string('schedule')->nullable(); // e.g., 'daily', 'hourly', '0 3 * * *' (cron)
            $table->boolean('enabled')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('backup_settings');
    }
};

