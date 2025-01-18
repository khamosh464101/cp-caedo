<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "is_board_member",
        'title',
        'name',
        'position',
        'about',
        'avatar',
        'file',
        'published'
    ];

    public function getAvatarAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public function getFileAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($team) {
            if ($team->isDirty('avatar') && !is_null($team->getRawOriginal('avatar'))) {
                Storage::delete($team->getRawOriginal('avatar'));
            }
            if ($team->isDirty('file') && !is_null($team->getRawOriginal('file'))) {
                Storage::delete($team->getRawOriginal('file'));
            }
        });
        static::deleting(function ($team) {
            if (!is_null($team->getRawOriginal('avatar'))) {
                Storage::delete($team->getRawOriginal('avatar'));
            }
            if (!is_null($team->getRawOriginal('file'))) {
                Storage::delete($team->getRawOriginal('file'));
            }
        });
    }
}
