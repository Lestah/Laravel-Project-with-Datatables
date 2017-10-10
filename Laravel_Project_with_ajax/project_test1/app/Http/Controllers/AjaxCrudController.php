<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class AjaxCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$items = Post::latest()->paginate(5);
        //return response()->json($items);
        $posts = Post::all();
        //return view('posts.index', compact('$posts'));
        return view('ajax-crud-2')->with(compact('posts'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function create()
    {
        //

    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $create = Post::create($request->all());
        return response()->json($create);
        //return view('ajax-crud-2')->json('$create');

        //return view()->json('$create');
        return redirect('ajax/crud/2')->json($create);
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
        
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        //return view('posts.edit')->withPost(compact($post));
        return view('ajax-crud')->withPost($post);
    }

    public function editItem(Request $req)
    {
        $post = Post::find($req->id);
        $post->title = $req->title;
        $post->body = $req->body;
        $post->save();
        return response()->json($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        //
        $edit = Post::find($id)->update($request->all());
        return response()->json($edit);
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
        Post::find($id)->delete();
        return response()->json(['done']);
    }*/

    public function manage_item_ajax()
    {
        return view('ajax-crud');
    }

    public function getAjaxCrud2(){
     $data = Post::all();
     return view('ajax-crud-2',compact('data'));
    }



}
