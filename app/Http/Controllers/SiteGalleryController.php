<?php

namespace App\Http\Controllers;
use App\Models\GalleryImage;

class SiteGalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::latest()->get();

        return view('site.galleryfour', compact('images'));
    }
}
