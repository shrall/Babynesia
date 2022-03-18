<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VisitCounter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VisitCounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('visitcounters')
            ->orderBy('visitcounters_count', 'desc')
            ->whereHas('visitcounters', function (Builder $query) {
                $query->whereMonth('date', date('m'));
            })->take(10)->get();
        return view('admin.visitcounter.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('no_user', $request->user)->first();
        return view('admin.visitcounter.show', compact('user'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisitCounter  $visitCounter
     * @return \Illuminate\Http\Response
     */
    public function show(VisitCounter $visitCounter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisitCounter  $visitCounter
     * @return \Illuminate\Http\Response
     */
    public function edit(VisitCounter $visitCounter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisitCounter  $visitCounter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisitCounter $visitCounter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisitCounter  $visitCounter
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitCounter $visitCounter)
    {
        //
    }
}
