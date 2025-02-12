<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class AdminMediasController extends Controller
{
    public function index(){

        $photos=Photo::all();
        return view('admin/media/index', compact('photos'));

    }


    public function create(){

        return view('admin/media/create');

    }


    public function store(Request $request){
        $file = $request->file('name');
        $name= time() . $file -> getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['name'=>$name]);
    }

    public function destroy($id){
        $photo=Photo::findOrFail($id);
        unlink(public_path().$photo->name);
        $photo->delete();
        return redirect('admin/media');
    }

    public function deleteMedia(Request $request){
        return "yey";
    }
}
