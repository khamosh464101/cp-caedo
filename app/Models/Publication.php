<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'year',
        'file',
        'custom1',
        'image',
        'published'
        
    ];
    const categories = [
        "newsletter", 'annual report', 'commissioned research',
    ];

    public function getImageAttribute($value)
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
        static::updating(function ($publication) {
            if ($publication->isDirty('image') && !is_null($publication->getRawOriginal('image'))) {
                Storage::delete($publication->getRawOriginal('image'));
            }
            if ($publication->isDirty('file') && !is_null($publication->getRawOriginal('file'))) {
                Storage::delete($publication->getRawOriginal('file'));
            }
        });
        static::deleting(function ($publication) {
            if (!is_null($publication->getRawOriginal('image'))) {
                Storage::delete($publication->getRawOriginal('image'));
            }
            if (!is_null($publication->getRawOriginal('file'))) {
                Storage::delete($publication->getRawOriginal('file'));
            }
        });
    }
}
