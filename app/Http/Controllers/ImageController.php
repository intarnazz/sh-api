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
        return response()->file(Storage::disk('public')->path($image->path));

    }

    public function add(Request $request)
    {
        $path = $request->file('photo')->store('images', 'public');
        $image = Image::create([
            'path' => $path
        ]);
        return new SuccessResponse($image);
    }

    public function delete(Image $image)
    {
        $image->delete();
        return new SuccessResponse([]);
    }
}
