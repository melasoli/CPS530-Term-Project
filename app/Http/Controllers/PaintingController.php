<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Painting;
use App\Http\Resources\PaintingResource;

class PaintingController extends Controller
{
    /**
     * Display all the paintings.
     */
    public function index()
    {
        $paintings = Painting::orderBy('creation')->get();

        return PaintingResource::collection($paintings);
    }
}
