<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use App\Models\VoucherType;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('admin.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = VoucherType::all();
        return view('admin.voucher.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher = Voucher::create([
            'name' => $request->name,
            'code' => $request->code,
            'amount' => $request->amount,
            'limit' => $request->limit,
            'isLimited' => $request->limit ? 1 : 0,
            'deadline' => $request->deadline,
            'vouchertype_id' => $request->type
        ]);

        return redirect()->route('adminpage.voucher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        $types = VoucherType::all();
        return view('admin.voucher.edit', compact('types', 'voucher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        $voucher->update([
            'name' => $request->name,
            'code' => $request->code,
            'amount' => $request->amount,
            'limit' => $request->limit,
            'isLimited' => $request->limit ? 1 : 0,
            'deadline' => $request->deadline,
            'vouchertype_id' => $request->type
        ]);

        return redirect()->route('adminpage.voucher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();
        return redirect()->route('adminpage.voucher.index');
    }
}
