<?php

namespace App\Http\Controllers;
use App\Models\post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public  function create() {
        return view('create');
    }

    public function ourStore( Request $request){
       $validated= $request->validate([
            'name'=>'required',
            'description'=>'required',
           'image' => 'nullable|mimes: jpg,jpeg,png|max:2048',
           

        ]);
        $Post =new post;
        $Post->name=$request->name;
        $Post->description=$request->description;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName); // save to /public/images
            $Post->image = $imageName;
        }
        else {
            $Post->image = 'default.jpg'; // <- add a default image
        }
        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
       $Post->save();
       return redirect()->route('home')->with('success','Post Created Successfully');
    }

 
   public function editMethod($id){

        $post =post::findOrFail($id);
       return view('editPage',['ourPost'=>$post]);
   }


   public function updateMethod($id, Request $request){

   

    $validated= $request->validate([
        'name'=>'required',
        'description'=>'required',
       'image' => 'nullable|mimes: jpg,jpeg,png|max:2048',
       

    ]);
    //  $Post =new post;
    $Post =post::findOrFail($id);
    $Post->name=$request->name;
    $Post->description=$request->description;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName); // save to /public/images
        $Post->image = $imageName;
    }
    else {
        $Post->image = 'default.jpg'; // <- add a default image
    }
    // $imageName = time() . '.' . $request->image->extension();
    // $request->image->move(public_path('images'), $imageName);
   $Post->save();
   return redirect()->route('home')->with('success','Post has been updated');

   }

   public function deleteMethod($id){
    $post =post::findOrFail($id);
    $post->delete();
    return redirect()->route('home')->with('success','Post has been deleted');
   }




}
