<?php

namespace App\Http\Controllers;

use App\Models\{
  ContentSection, Sponsor, Update, TeamProfile, TechnicalSpec, MediaItem
};

class PublicController extends Controller
{
  public function home()
  {
    $intro = ContentSection::where('section_key','homepage_intro')->first();
    return view('public.home', compact('intro'));
  }

  public function recruitment()
  {
    $content = ContentSection::where('section_key','recruitment')->first();
    return view('public.recruitment', compact('content'));
  }

  public function faq()
  {
    $faq = ContentSection::where('section_key','faq')->first();
    return view('public.faq', compact('faq'));
  }

  public function sponsors()
  {
    $sponsors = Sponsor::all();
    return view('public.sponsors', compact('sponsors'));
  }

  public function updates()
  {
    $updates = Update::latest()->get();
    return view('public.updates', compact('updates'));
  }

  public function team()
  {
    $team = TeamProfile::all();
    return view('public.team', compact('team'));
  }

  public function specs()
  {
    $specs = TechnicalSpec::all();
    return view('public.specs', compact('specs'));
  }

  public function media()
  {
    $media = MediaItem::latest()->get();
    return view('public.media', compact('media'));
  }
}