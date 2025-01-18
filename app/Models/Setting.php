<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'field_name',
        'field_value',
        'category',
        'type',
        'url',
        'description',
    ];

    public static $categories = [
        'Home Slider',
        'Board Chair message',
    ];
    public function getCategory()  
    {  
        return self::$categories;  
    } 

    public function getFieldValueAttribute($value)
    {
        return $this->type == 'image' ? asset("storage/$value") : $value;
    }

    public static function boot()
    {
        parent::boot();
        static::updating(function ($setting) {
            if ($setting->isDirty('field_value') && !is_null($setting->getRawOriginal('field_value')) && $setting->type == 'image') {
                Storage::delete($setting->getRawOriginal('field_value'));
            }
        });
  
    }




}
