<?php

namespace App\Http\Controllers\Admin\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Collection;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\Validator;

class CollectionController extends Controller
{
    public function index() {
        $collections = Collection::all();
        return view('admin.collection.index', compact('collections'));
    }

    public function create() {
        return view('admin.collection.create');
    }

    public function createNew(Request $request) {

        Validator::make($request->all(), [
            'name' => ['required', 'unique:collections', 'max:255'],
        ])->validate();

        $newCollection = new Collection;

        if($request->image!=''){
            $image = $request->image;
    
            $randomname = Str::random(30);
            $extension  = $image->getClientOriginalExtension();
    
            $imagename = $randomname.'.'.$extension;

            $request->image->move(public_path('/images/collection'), $imagename);
    
            // if(!Storage::disk('public')->exists('collection'))
            // {
            //     Storage::disk('public')->makeDirectory('collection');
            // }
            // $collectionImage = Image::make($image)->resize(806,440)->save('foo');
            // Storage::disk('public')->put('collection/'.$imagename, $collectionImage);
    
            $newCollection->image = $imagename;
          }

        $newCollection->user_id = $request->user_id;
        $newCollection->name = $request->name;
        $newCollection->handle = Str::slug($request->name);
        $newCollection->url = 'collection/'.Str::slug($request->name);
        $newCollection->description = $request->name;
        $newCollection->save();
        
        return redirect()->route('admin.collection.index');
    }

    public function delete(Request $request){
        Collection::where(['id'=>$request->id])->delete();
        return redirect()->route('admin.collection.index');
    }
}
