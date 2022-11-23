<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function display($image_name, Request $request){
        $photo=storage_path('app/hotels/'.$image_name);
        return response()->file($photo);
    }
}
