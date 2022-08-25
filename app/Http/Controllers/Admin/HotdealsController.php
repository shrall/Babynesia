<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotdeals;
use App\Models\HotdealsArea;
use App\Models\HotdealsVisibleStatus;
use Illuminate\Http\Request;

class HotdealsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotdeals = Hotdeals::all();
        return view('admin.hotdeals.index', compact('hotdeals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotdeals_area = HotdealsArea::all();
        $hotdeals_status = HotdealsVisibleStatus::all();
        return view('admin.hotdeals.create', compact('hotdeals_area', 'hotdeals_status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->image) {
            $image = 'hotdeals-' . time() . '-' . $request['image']->getClientOriginalName();
            $request->image->move(public_path('uploads/'), $image);
        } else {
            $image = 'video';
        }
        $hd = Hotdeals::create([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $image,
            'position_nr' => $request->position_nr ?? 1,
            'link' => $request->link,
            'status' => $request->status,
            'from_date' => $request->from_date,
            'until_date' => $request->until_date
        ]);
        return redirect()->route('adminpage.hotdeals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotdeals  $hotdeals
     * @return \Illuminate\Http\Response
     */
    public function show(Hotdeals $hotdeals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotdeals  $hotdeals
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotdeals $hotdeals)
    {
        $hotdeals_area = HotdealsArea::all();
        $hotdeals_status = HotdealsVisibleStatus::all();
        return view('admin.hotdeals.edit', compact('hotdeals_area', 'hotdeals_status', 'hotdeals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hotdeals  $hotdeals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotdeals $hotdeals)
    {
        if ($request->type == 'Gambar') {
            if ($request->image) {
                $image = 'hotdeals-' . time() . '-' . $request['image']->getClientOriginalName();
                $request->image->move(public_path('uploads/'), $image);
            } else {
                $image = $hotdeals->image;
            }
        } else {
            $image = 'Video';
        }
        $hotdeals->update([
            'name' => $request->name,
            'type' => $request->type,
            'image' => $image,
            'position_nr' => $request->position_nr ?? 1,
            'link' => $request->link,
            'status' => $request->status,
            'from_date' => $request->status != 2 ? null : $request->from_date,
            'until_date' => $request->status != 2 ? null : $request->until_date
        ]);
        return redirect()->route('adminpage.hotdeals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotdeals  $hotdeals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotdeals $hotdeals)
    {
        $hotdeals->delete();
        return redirect()->route('adminpage.hotdeals.index');
    }
}
