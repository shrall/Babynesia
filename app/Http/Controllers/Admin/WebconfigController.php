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
        if ($request->type == 'configuration') {
            $webconfig = Webconfig::where('name', 'customer_name')->first();
            $webconfig->update([
                'content' => $request->client_name
            ]);
            $webconfig = Webconfig::where('name', 'customer_email')->first();
            $webconfig->update([
                'content' => $request->client_email
            ]);
            $webconfig = Webconfig::where('name', 'customer_address')->first();
            $webconfig->update([
                'content' => $request->client_address
            ]);
            $webconfig = Webconfig::where('name', 'customer_mobile')->first();
            $webconfig->update([
                'content' => $request->client_hp
            ]);
            $webconfig = Webconfig::where('name', 'customer_phone')->first();
            $webconfig->update([
                'content' => $request->client_phone
            ]);
            $webconfig = Webconfig::where('name', 'company_name')->first();
            $webconfig->update([
                'content' => $request->company_name
            ]);
            $webconfig = Webconfig::where('name', 'tagline')->first();
            $webconfig->update([
                'content' => $request->tagline
            ]);
            $webconfig = Webconfig::where('name', 'email')->first();
            $webconfig->update([
                'content' => $request->main_email
            ]);
            $webconfig = Webconfig::where('name', 'email_from')->first();
            $webconfig->update([
                'content' => $request->sender_email
            ]);
            $webconfig = Webconfig::where('name', 'fb')->first();
            $webconfig->update([
                'content' => $request->facebook
            ]);
            $webconfig = Webconfig::where('name', 'twitter')->first();
            $webconfig->update([
                'content' => $request->twitter
            ]);
            $webconfig = Webconfig::where('name', 'waittime')->first();
            $webconfig->update([
                'content' => $request->wait_time
            ]);
            if (env('APP_TYPE') == 1) {
                $webconfig = Webconfig::where('name', 'kota_pengirim')->first();
            } elseif (env('APP_TYPE') == 2) {
                $webconfig = Webconfig::where('name', 'kota_pengirim_fav')->first();
            }
            $webconfig->update([
                'content' => $request->kota_pengirim
            ]);
            $webconfig = Webconfig::where('name', 'hide_product_code')->first();
            $webconfig->update([
                'isHidden' => $request->hide_code == 'on' ? 1 : 0
            ]);
            $webconfig = Webconfig::where('name', 'hide_sold_product')->first();
            $webconfig->update([
                'isHidden' => $request->hide_soldout == 'on' ? 1 : 0
            ]);
            $webconfig = Webconfig::where('name', 'hide_product_non_img')->first();
            $webconfig->update([
                'isHidden' => $request->hide_noimage == 'on' ? 1 : 0
            ]);
            return redirect()->route('adminpage.configuration');
        } else if ($request->type == 'design') {
            if (env('APP_TYPE') == 1) {
                if ($request->header) {
                    $imageh = 'header-' . time() . '-' . $request['header']->getClientOriginalName();
                    $request->header->move(public_path('uploads/'), $imageh);
                } else {
                    $webconfig = Webconfig::where('name', 'header_image')->first();
                    $imageh = $webconfig["content"];
                }
                if ($request->bg) {
                    $imagebg = 'bg-' . time() . '-' . $request['bg']->getClientOriginalName();
                    $request->bg->move(public_path('uploads/'), $imagebg);
                } else {
                    $webconfig = Webconfig::where('name', 'bg_img')->first();
                    $imagebg = $webconfig["content"];
                }
                $webconfig = Webconfig::where('name', 'header_image')->first();
                $webconfig->update([
                    'content' => $imageh
                ]);
                $webconfig = Webconfig::where('name', 'bg_img')->first();
                $webconfig->update([
                    'content' => $imagebg
                ]);
                $webconfig = Webconfig::where('name', 'bg_color')->first();
                $webconfig->update([
                    'content' => $request->bg_color
                ]);
                $webconfig = Webconfig::where('name', 'text_color')->first();
                $webconfig->update([
                    'content' => $request->text_color
                ]);
                $webconfig = Webconfig::where('name', 'button_color')->first();
                $webconfig->update([
                    'content' => $request->button_color
                ]);
                $webconfig = Webconfig::where('name', 'web_layout')->first();
                $webconfig->update([
                    'content' => $request->web_layout
                ]);
            } elseif (env('APP_TYPE') == 2) {
                if ($request->header) {
                    $imageh = 'header-' . time() . '-' . $request['header']->getClientOriginalName();
                    $request->header->move(public_path('uploads/'), $imageh);
                } else {
                    $webconfig = Webconfig::where('name', 'header_image_fav')->first();
                    $imageh = $webconfig["content"];
                }
                if ($request->bg) {
                    $imagebg = 'bg-' . time() . '-' . $request['bg']->getClientOriginalName();
                    $request->bg->move(public_path('uploads/'), $imagebg);
                } else {
                    $webconfig = Webconfig::where('name', 'bg_img_fav')->first();
                    $imagebg = $webconfig["content"];
                }
                $webconfig = Webconfig::where('name', 'header_image_fav')->first();
                $webconfig->update([
                    'content' => $imageh
                ]);
                $webconfig = Webconfig::where('name', 'bg_img_fav')->first();
                $webconfig->update([
                    'content' => $imagebg
                ]);
                $webconfig = Webconfig::where('name', 'bg_color_fav')->first();
                $webconfig->update([
                    'content' => $request->bg_color
                ]);
                $webconfig = Webconfig::where('name', 'text_color_fav')->first();
                $webconfig->update([
                    'content' => $request->text_color
                ]);
                $webconfig = Webconfig::where('name', 'button_color_fav')->first();
                $webconfig->update([
                    'content' => $request->button_color
                ]);
                $webconfig = Webconfig::where('name', 'web_layout_fav')->first();
                $webconfig->update([
                    'content' => $request->web_layout
                ]);
            }
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
