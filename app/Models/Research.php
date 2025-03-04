<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Research extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'subtitle',
        'pdf',
        'published'
    ];

    public function getPdfAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($research) {
            if ($research->isDirty('pdf') && !is_null($research->getRawOriginal('pdf'))) {
                Storage::delete($research->getRawOriginal('pdf'));
            }
        });
        static::deleting(function ($research) {
            if (!is_null($research->getRawOriginal('pdf'))) {
                Storage::delete($research->getRawOriginal('pdf'));
            }

        });
    }
}
