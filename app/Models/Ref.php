<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ref extends Model
{
    protected $table = 'refs';

    protected $fillable=[
        'ref', 'hit'
    ];

    public $timestamps = false;

    public static function AddRef($ref) {
        $hit_ref = self::firstOrCreate(['ref' => $ref]);
        $hit_ref->hit++;
        $hit_ref->save();
    }
}
