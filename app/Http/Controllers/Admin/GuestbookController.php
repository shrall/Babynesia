<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guestbook;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestbooks = Guestbook::all();
        return view('admin.guestbook.index', compact('guestbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.guestbook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guestbook = Guestbook::create([
            'datum' => $request->date,
            'name' => $request->name,
            'location' => $request->city,
            'email' => $request->email,
            'message' => $request->content,
            'accepted' => $request->status
        ]);
        return redirect()->route('adminpage.guestbook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function show(Guestbook $guestbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Guestbook $guestbook)
    {
        return view('admin.guestbook.edit', compact('guestbook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guestbook $guestbook)
    {
        $guestbook->update([
            'datum' => $request->date,
            'name' => $request->name,
            'location' => $request->city,
            'email' => $request->email,
            'message' => $request->content,
            'accepted' => $request->status
        ]);
        return redirect()->route('adminpage.guestbook.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guestbook $guestbook)
    {
        $guestbook->delete();
        return redirect()->route('adminpage.guestbook.index');
    }
}
