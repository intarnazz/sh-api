<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\MaterialRequest;
use App\Models\Client;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\SuccessResponse;


class MaterialController extends Controller
{
    function get(Material $material)
    {
        return new SuccessResponse($material->full());
    }

    function all()
    {
        $materials = Material::with('image')->get();
        return new SuccessResponse($materials);
    }

    public function add(MaterialRequest $request)
    {
        $material = Material::create($request->validated());
        return new SuccessResponse($material);
    }

    public function patch(MaterialRequest $request, Material $material)
    {
        $material->update($request->validated());
        $material->save();
        return new SuccessResponse($material);
    }

    public function delete(Material $material)
    {
        $material->delete();
        return new SuccessResponse([]);
    }
}
