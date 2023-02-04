<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\SocialMediaLink;
use App\Http\Controllers\Controller;
use App\Http\Requests\SocialMediaLinkRequest;

class SocialMediaLinkController extends Controller
{
  public function index()
  {
    return view('dashboard.social_media_link.social_media_link', [
      'social_media_link' => SocialMediaLink::latest()->get()
    ]);
  }

  private function socialNeduaNotExcist ()
  {
    $social_media_link = SocialMediaLink::pluck('social_media_id');
    $social_media = SocialMedia::whereNotIn('id', $social_media_link)->get();
    return $social_media;
  }

  public function create()
  {
    return view('dashboard.social_media_link.add', [
      'social_media'  => $this->socialNeduaNotExcist()
    ]);
  }

  public function store(SocialMediaLinkRequest $request)
  {
    SocialMediaLink::create($request->all());
    alert()->success('Berhasil','Berhasil tersimpan');
    return to_route('social_media.index');
  }

  public function edit(SocialMediaLink $socialMediaLink)
  {
    return view('dashboard.social_media_link.update', [
      'socialMediaLink' => $socialMediaLink,
      'social_media'      => SocialMedia::latest()->get()
    ]);
  }

  public function update(SocialMediaLinkRequest $request, SocialMediaLink $socialMediaLink)
  {
    $socialMediaLink->update($request->all());
    alert()->success('Berhasil','Berhasil diperbaharui');
    return to_route('social_media.index');
  }

  public function destroy(SocialMediaLink $socialMediaLink)
  {
    $socialMediaLink->delete();
    alert()->success('Berhasil','Berhasil terhapus');
    return to_route('social_media.index');
  }
}
