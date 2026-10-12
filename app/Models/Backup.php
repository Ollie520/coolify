<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Backup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'backup_setting_id',
        'name',
        'type',
        'path',
        'disk',
        'size',
        'is_encrypted',
        'is_locked',
        'completed_at',
    ];

    protected $casts = [
        'is_encrypted' => 'boolean',
        'is_locked' => 'boolean',
        'completed_at' => 'datetime',
    ];

    public function backupSetting()
    {
        return $this->belongsTo(BackupSetting::class);
    }
}

