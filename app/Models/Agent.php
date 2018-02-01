<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $table = 'agents';

    protected $fillable=[
        'agent', 'hit'
    ];

    public $timestamps = false;

    public static function AddAgent($agent) {

        //$browser = ParseUserAgent($agent);

        $hit_agent = self::firstOrCreate(['agent' => $agent]);
        $hit_agent->hit++;
        $hit_agent->save();
    }

    private function ParceUserAgent($agent) {
        //
    }
}
