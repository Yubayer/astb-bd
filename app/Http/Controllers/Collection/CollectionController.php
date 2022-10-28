<?php

namespace App\Http\Controllers\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Collection;

class CollectionController extends Controller
{
    public function index($handle) {
        $collection = Collection::with('products')->where(['handle' => $handle])->first();
        return view('collection', compact('collection'));
    }
}
