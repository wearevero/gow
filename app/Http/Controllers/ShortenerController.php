<?php

namespace App\Http\Controllers;

use App\Jobs\RecordVisitor;
use App\Models\Shortener;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ShortenerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:super admin'])->only(['index']);
    }

    public function index()
    {
        return view('shorteners.index', [
            'shorteners' => Shortener::query()->latest()->paginate(10)
        ]);
    }

    public function show(Request $request, Shortener $shortener)
    {
        $agent = new Agent();
        $agent->setUserAgent($request->userAgent());
        dispatch( new RecordVisitor($shortener, $agent) );

        return redirect($shortener->original);
    }

    public function stats(Shortener $shortener)
    {
        return view('shorteners.stats', [
            'shortener' => $shortener,
            'ip_address' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('ip_address')
            ->get(),
            'browser' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('browser')
            ->get(),
            'device' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('device')
            ->get()
            ->filter(fn ($item) => $item->name !== null),
            'device_type' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('device_type')
            ->get(),
            'city' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('city')
            ->get(),
            'country' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('country')
            ->get(),
            'platform' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('platform')
            ->get(),
            'referrer' => Visitor::query()
            ->whereBelongsTo($shortener)
            ->groupByType('referrer')
            ->get()
            ->filter(fn ($item) => $item->name !== null),
        ]);
    }
}
