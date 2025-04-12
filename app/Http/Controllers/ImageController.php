<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;


class ImageController extends Controller
{
    function get(Image $image)
    {
        return Storage::disk('public')->download($image->path);
    }
}
