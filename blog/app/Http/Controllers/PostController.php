<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;



use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $allPosts = Post::paginate(3);
        return view('posts.index', [
            'allPosts' => $allPosts
        ]);
    }
    public function create()
    {
        $allUsers=User::all();
        // dd($allUsers);
        return view('posts.create',[
            'allUsers'=>$allUsers
        ]);
    }
    public function store(StorePostRequest $request)
    {
        $data=request()->all();
        //dd($data);

        Post::create([
            'title'=> $data['title'],
            'description'=> $data['description'],
            'user_id'=>$data['post_creator']
        ]);

        return redirect()->route('posts.index');
    }
    public function show($postId)
    {
        $detail=Post::where('id',$postId)->get();
        // dd($detail);
        return view('posts.show',[
            'detail'=>$detail
        ]);
        
    }
    public function edit($postId)
    {
        $detail=Post::where('id',$postId)->get();
        return view('posts.edit',[
            'detail'=>$detail
        ]);
        
    }
    public function update( UpdatePostRequest $req,Post $post)
    {
       
        $data=request()->all();
        $post->update($data);
       
        return redirect()->route('posts.index');
        
    }
    public function destroy(Post $post)
    {
        // $deleted = DB::table('posts')->where('id', '=', $postId)->delete();
        $post->delete();
        return redirect()->route('posts.index')
        ->with('success','Product deleted successfully');;
        
    }
}
