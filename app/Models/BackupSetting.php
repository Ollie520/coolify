<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackupSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'disk',
        'disk_settings',
        'encryption_key',
        'encryption_type',
        'retention_days',
        'retention_count',
        'delete_local_after_upload',
        'schedule',
        'enabled',
    ];

    protected $casts = [
        'disk_settings' => 'array',
        'delete_local_after_upload' => 'boolean',
        'enabled' => 'boolean',
    ];

    public function backups()
    {
        return $this->hasMany(Backup::class);
    }
}

