<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;

class Procurement extends Model
{
    use HasFactory;

    protected $fillable = [
        'announcement_date',
        'reference_number',
        'description',
        'deadline',
        'file',
        'published',
        'itb_noa'
    ];

    public function getFileAttribute($value)
    {
        return $value ? asset("storage/$value") : asset('import/assets/post-pic-dummy.png');
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($procurement) {

            if ($procurement->isDirty('file') && !is_null($procurement->getRawOriginal('file'))) {
                Storage::delete($procurement->getRawOriginal('file'));
            }
        });
        static::deleting(function ($procurement) {
            if (!is_null($procurement->getRawOriginal('file'))) {
                Storage::delete($procurement->getRawOriginal('file'));
            }
        });
    }

}
