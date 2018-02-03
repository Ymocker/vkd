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

        $agent = substr($request->header('User-Agent'), 0, 254);
        $ref = substr(request()->headers->get('referer'), 0, 60);
        $old_visitor = self::where('ip', ip2long($request->ip()))->first();

        if ($old_visitor == null) {
            $newVis = new self;
            $newVis->ip = ip2long($request->ip());
            $newVis->ipAddr = $request->ip();
            $newVis->ref = $ref;
            $newVis->agent = $agent;
            $newVis->visit_date = time();
            $newVis->save();

            $botpos = stripos($agent, 'bot');
            if ($botpos === FALSE) {
                Page::InkrPage(1); // increment of visitors
                Ref::AddRef($ref);
            }
            Agent::AddAgent($agent);
        } else {
            if (time()-28800 > $old_visitor->visit_date) {
                $botpos = stripos($agent, 'bot');
                if ($botpos === FALSE) {
                    Page::InkrPage(1); // increment of visitors
                    Ref::AddRef($ref);
                }
                Agent::AddAgent($agent);
            }

            $old_visitor->ref = $ref;
            $old_visitor->agent = $agent;
            $old_visitor->visit_date = time();
            $old_visitor->save();
        }
    }
}
