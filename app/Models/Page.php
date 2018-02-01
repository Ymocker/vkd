<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable=[
        'name', 'hit'
    ];

    public $timestamps = false;

    public static function InkrPage($page) {
        $hit_page = self::find($page);
        $hit_page->hit++;
        $hit_page->save();
    }
}
