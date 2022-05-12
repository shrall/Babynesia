<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hitcounter;
use App\Models\Hotdeals;
use App\Models\HotdealsArea;
use App\Models\HotdealsVisibleStatus;
use App\Models\Produk;
use App\Models\User;
use App\Models\Webconfig;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function dashboard()
    {
        return view('admin.index');
    }
    public function configuration()
    {
        $webconfigs = Webconfig::all();
        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];
        return view('admin.settings.configuration', compact('webconfigs', 'cities'));
    }
    public function layoutdesign()
    {
        $webconfigs = Webconfig::all();
        return view('admin.settings.layoutdesign', compact('webconfigs'));
    }
    public function administrator()
    {
        $admins = User::where('user_status_id', '>=', '3')->get();
        return view('admin.settings.administrator', compact('admins'));
    }
    public function administratorcreate()
    {
        return view('admin.settings.administrator_create');
    }
    public function hitcounter()
    {
        $hitcounters = Hitcounter::all();
        return view('admin.settings.hitcounter', compact('hitcounters'));
    }
    //@marshall ini nanti ada parameternya Model $model trus di compact ke view
    public function topvisitor_detail()
    {
        return view('admin.settings.topvisitor_detail');
    }
    public function sendmail()
    {
        $users = User::where('user_status_id', '<=', 2)->get();
        return view('admin.settings.sendmail', compact('users'));
    }
    public function sendmail_post(Request $request)
    {
        if ($request->type == 'except') {
            $emails = User::select('email')->whereNotIn('email', $request->user)->get();
        }else{
            $emails = User::select('email')->get();
        }
        $webconfig = Webconfig::where('name', 'email_from')->first();
        $emails = User::where('email', 'user@tbf.com')->get();
        $job = (new \App\Jobs\SendBulkMail($request->title, $emails, $request->content, $webconfig["content"]->content))
            ->delay(
                now()
                    ->addSeconds(2)
            );
        dispatch($job);
        return redirect()->route('adminpage.sendmail');
    }
    public function tutorial()
    {
        return view('admin.settings.tutorial');
    }
    public function webpage()
    {
        return view('admin.content.webpage');
    }
    public function webpage_create()
    {
        return view('admin.content.webpage_create');
    }
    public function sidearea()
    {
        return view('admin.content.sidearea');
    }
    public function sidearea_create()
    {
        return view('admin.content.sidearea_create');
    }
    public function article()
    {
        return view('admin.content.article');
    }
    public function article_create()
    {
        return view('admin.content.article_create');
    }
    public function guestbook()
    {
        return view('admin.content.guestbook');
    }
    public function guestbook_create()
    {
        return view('admin.content.guestbook_create');
    }
    public function gallery()
    {
        return view('admin.content.gallery');
    }
    public function gallery_create()
    {
        return view('admin.content.gallery_create');
    }
    public function product()
    {
        $products = Produk::paginate(15);
        return view('admin.shop.product', compact('products'));
    }
    public function product_create()
    {
        return view('admin.shop.product_create');
    }
    public function product_detail()
    {
        return view('admin.shop.product_detail');
    }
    public function sales()
    {
        return view('admin.shop.sales');
    }
    public function profit()
    {
        return view('admin.shop.profit');
    }
}
