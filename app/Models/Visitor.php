<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Page;
use App\Models\Agent;
use App\Models\Ref;

class Visitor extends Model
{
    protected $table = 'visitors';

    protected $fillable=[
        'ip', 'ipAddr', 'visit_date', 'ref', 'agent'
    ];

    public static function Check($request) {

        $agent = $request->header('User-Agent');
        $ref = request()->headers->get('referer');
        $old_visitor = self::where('ip', ip2long($request->ip()))->first();

        if ($old_visitor == null) {
            $newVis = new self;
            $newVis->ip = ip2long($request->ip());
            $newVis->ipAddr = $request->ip();
            $newVis->ref = request()->headers->get('referer');
            $newVis->agent = $request->header('User-Agent');
            $newVis->visit_date = time();
            $newVis->save();

            Page::InkrPage(1);
            Ref::AddRef($ref);
            Agent::AddAgent($agent);
        } else {
            if (time()-2 > $old_visitor->visit_date) {
                Page::InkrPage(1);
                Ref::AddRef($ref);
                Agent::AddAgent($agent);
            }

            $old_visitor->ref = request()->headers->get('referer');
            $old_visitor->agent = $request->header('User-Agent');
            $old_visitor->visit_date = time();
            $old_visitor->save();
        }
    }
}
