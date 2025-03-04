<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exatra extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'icon',
        'category'
    ];

    const categories = [
        "Policies & Governance", 'Key Areas of Focus', 'Programs & Projects',
    ];

    public function getIconAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }


    public static function boot()
    {
        parent::boot();
        static::updating(function ($exatra) {
            if ($exatra->isDirty('icon') && !is_null($exatra->getRawOriginal('icon'))) {
                Storage::delete($exatra->getRawOriginal('icon'));
            }
        });
        static::deleting(function ($exatra) {
            if (!is_null($exatra->getRawOriginal('icon'))) {
                Storage::delete($exatra->getRawOriginal('icon'));
            }
        });
    }


}
