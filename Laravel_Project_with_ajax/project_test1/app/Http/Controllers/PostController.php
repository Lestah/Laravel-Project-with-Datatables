<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        //return view('posts.index', compact('$posts'));
        return view('posts.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));

        $post = new Post; 

        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        //return view('posts.show')->with('post', $post);
        return view('posts.home')->withPost($post);
    }

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
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        $post->delete();

        return redirect('posts');
    }

    public function datatable_test()
    {
        $coms = DB::SELECT('SELECT id, title, status, updated_at FROM companies');

        return view('datatable')->with(compact('coms'));

    }

    public function allPosts()
    {   
        $draw = (isset($_REQUEST['draw'])) ? $_REQUEST['draw'] : 1;
        $length = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : 10;
        $offset = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : 0;
        $search = (isset($_REQUEST['search']['value'])) ? $_REQUEST['search']['value'] : '';
        $sort = (isset($_REQUEST['order']['0']['dir'])) ? $_REQUEST['order']['0']['dir'] : 'desc';
        
        $query = DB::SELECT('SELECT api_offers.id, api_offers.program_name, api_offers_creatives.creatives_url, api_offers_creatives.offer_id from api_offers left join api_offers_creatives on api_offers.id = api_offers_creatives.id GROUP By api_offers_creatives.offer_id');
        
        //$recordsTotal = 
        $recordsTotal = count($query);
        $recordsFiltered = $recordsTotal;
        
        $program_name_search_limit = DB::SELECT('SELECT api_offers.id, api_offers.program_name, api_offers_creatives.creatives_url, api_offers_creatives.offer_id from api_offers left join api_offers_creatives on api_offers.id = api_offers_creatives.id LIMIT '.$length.'');
        
        $program_name_search = DB::SELECT('SELECT api_offers.id, api_offers.program_name, api_offers_creatives.creatives_url, api_offers_creatives.offer_id from api_offers left join api_offers_creatives on api_offers.id = api_offers_creatives.id WHERE api_offers.program_name LIKE "%'.$search.'%"');
        
        if($search == '' ){
            $result = $program_name_search_limit;
        
        } else {
            $result = $program_name_search;
        }
        
        $result = json_decode(json_encode($result, true));
        
        $json_result = array(
            'draw' => $draw,
            'recordsTotal' => count($recordsTotal),
            'recordsFiltered' => count($recordsFiltered),
            'data' => $result
        );
        
        echo json_encode($json_result);
    }

    public function json_data_to_pass()
    {
        $draw = (isset($_REQUEST['draw'])) ? $_REQUEST['draw'] : 1;
        $length = (isset($_REQUEST['length'])) ? $_REQUEST['length'] : 10;
        $offset = (isset($_REQUEST['start'])) ? $_REQUEST['start'] : 0;
        $search = (isset($_REQUEST['search']['value'])) ? $_REQUEST['search']['value'] : '';
        $sort = (isset($_REQUEST['order']['0']['dir'])) ? $_REQUEST['order']['0']['dir'] : 'desc';

        $query = DB::SELECT('SELECT id, title, status, updated_at FROM companies');

        $recordsTotal = count($query);
        $recordsFiltered = $recordsTotal;

        $program_name_search_limit = DB::SELECT('SELECT id, title, status, updated_at from companies LIMIT '.$length.'');

        $program_name_search = DB::SELECT('SELECT id, title, status, updated_at from companies WHERE title LIKE "%'.$search.'%"');

         if($search == '' ){
            $result = $program_name_search_limit;
        
        } else {
            $result = $program_name_search;
        }
        
        $result = json_decode(json_encode($result, true));
        
        $json_result = array(
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $result
        );

        /*echo '<pre>';
        print_r($json_result);
        exit;*/

        echo json_encode($json_result);

    }

    public function datatable_server_side_view()
    {

        /*$data = array();
        
        for($i = 0; $i < count($query); $i++){
            $data[] = (array)$query[$i];
            }*/

        //to conver the inside to array as well    
        return view('datatable_server_side');
    }
}
