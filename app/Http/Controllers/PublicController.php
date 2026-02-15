<?php

namespace App\Http\Controllers;

use App\Models\{
  ContentSection, Sponsor, Update, TeamProfile, CarBuild, MediaPost
};

// Public facing pages
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

  public function sponsors()
  {
    $sponsors = Sponsor::all();
    return view('public.sponsors', compact('sponsors'));
  }

  public function updates()
  {
    $updates = Update::orderByDesc('updated_at')->get();
    return view('public.updates', compact('updates'));
  }

  public function team()
  {
    $team = TeamProfile::all();
    return view('public.team', compact('team'));
  }

  public function specs()
  {
    $builds = CarBuild::orderByDesc('year')->orderByDesc('id')->get();
    return view('public.specs', compact('builds'));
  }

  public function media()
  {
    $posts = MediaPost::with('items')->latest()->get();
    return view('public.media', compact('posts'));
  }
}