<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Webconfig;
use Illuminate\Http\Request;

class WebconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $webconfigs = Webconfig::all();
        if ($request->type == 'configuration') {
            $webconfigs[5]->update([
                'content' => $request->client_name
            ]);
            $webconfigs[6]->update([
                'content' => $request->client_email
            ]);
            $webconfigs[7]->update([
                'content' => $request->client_address
            ]);
            $webconfigs[8]->update([
                'content' => $request->client_hp
            ]);
            $webconfigs[9]->update([
                'content' => $request->client_phone
            ]);
            $webconfigs[10]->update([
                'content' => $request->company_name
            ]);
            $webconfigs[11]->update([
                'content' => $request->tagline
            ]);
            $webconfigs[12]->update([
                'content' => $request->main_email
            ]);
            $webconfigs[13]->update([
                'content' => $request->sender_email
            ]);
            $webconfigs[28]->update([
                'content' => $request->facebook
            ]);
            $webconfigs[29]->update([
                'content' => $request->twitter
            ]);
            $webconfigs[30]->update([
                'content' => $request->wait_time
            ]);
            $webconfigs[41]->update([
                'content' => $request->kota_pengirim
            ]);
            // $webconfigs[16]->update([
            //     'content' => $request->ongkir_note
            // ]);
            // $webconfigs[24]->update([
            //     'content' => $request->auto_email
            // ]);
            // $webconfigs[25]->update([
            //     'content' => $request->starting_code
            // ]);
            $webconfigs[27]->update([
                'content' => $request->hide_code
            ]);
            $webconfigs[32]->update([
                'content' => $request->hide_soldout
            ]);
            $webconfigs[33]->update([
                'content' => $request->allow_minus
            ]);
            $webconfigs[35]->update([
                'content' => $request->hide_noimage
            ]);
            $webconfigs[36]->update([
                'content' => $request->use_store_price
            ]);
            return redirect()->route('adminpage.configuration');
        } else if ($request->type == 'design') {
            if ($request->image) {
                $image = 'header-' . time() . '-' . $request['image']->getClientOriginalName();
                $request->image->move(public_path('uploads/'), $image);
            } else {
                $image = $webconfigs[22]->content;
            }
            $webconfigs[22]->update([
                'content' => $image
            ]);
            $webconfigs[37]->update([
                'content' => $request->bg_color
            ]);
            $webconfigs[38]->update([
                'content' => $request->text_color
            ]);
            $webconfigs[39]->update([
                'content' => $request->button_color
            ]);
            $webconfigs[40]->update([
                'content' => $request->web_layout
            ]);
            return redirect()->route('adminpage.layoutdesign');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webconfig  $webconfig
     * @return \Illuminate\Http\Response
     */
    public function show(Webconfig $webconfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webconfig  $webconfig
     * @return \Illuminate\Http\Response
     */
    public function edit(Webconfig $webconfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webconfig  $webconfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webconfig $webconfig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webconfig  $webconfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webconfig $webconfig)
    {
        //
    }
}
