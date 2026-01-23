<?php

namespace App\Models\UserProfile;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Profile extends Model
{
    protected $table = 'public.user_profile';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public $incrementing = false;  
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($user_id) {
            if (!$user_id->id) {
                do {
                    $user_id->id = Str::upper(Str::random(16)); // huruf + angka
                } while (self::where('id', $user_id->id)->exists());
            }
        });
    }

    protected $fillable = [
        'id',
        'user_id',
        'user_name',
        'birth_date',
        'birth_place',
        'address',
        'residence', 
        'gender'
    ];
}
