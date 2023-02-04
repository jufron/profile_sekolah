<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
      return view('dashboard.banner.banner', [
        'banner'  => Banner::latest()->get()
      ]);
    }

    public function create()
    {
      return view('dashboard.banner.add');
    }

    public function store(BannerRequest $request)
    {
      $file = $request->file('nama_banner')->store('banners', 'public');
      $request->set($file);
      alert()->success('Berhasil','Berhasil tersimpan');
      return to_route('banner.index');
    }

    public function destroy(Banner $banner)
    {
      Storage::delete("public/{$banner->nama_banner}");
      $banner->delete();
      alert()->success('Berhasil','Berhasil tersimpan');
      return to_route('banner.index');
    }
}
