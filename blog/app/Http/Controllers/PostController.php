<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Purifier;
use Image;


class PostController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $categoriesArray = array();

        foreach ($categories as $category){
            $categoriesArray[$category->id]=$category->name;
        }

        $tags = Tag::all();
        $tagsArray = array();

        foreach ($tags as $tag){
            $tagsArray[$tag->id]=$tag->name;
        }


        return view('posts.create')->withCategories($categoriesArray)->withTags($tagsArray);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate data & CRSF Auto - if unvalidated returns to create
        $this->validate($request, array(
            'title'=>'required|max:255',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|numeric',
            'body'=>'required',
            'featured_image'=>'image'
        ));

        //store in database
        $post = new Post;

        $post->title = $request->title;
        $post->body = Purifier::clean($request->body,'youtube');
        $post->slug = $request->slug;
        $post->category_id = $request->category_id;

        // Save Image if user supplied one
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,800)->save($location);

            $post->image=$filename;
        }

        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags,false);
        }


        Session::flash('success','The blog post was successfully saved!');

        //redirect on complete

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $categoriesArray = array();

        foreach ($categories as $category){
            $categoriesArray[$category->id]=$category->name;
        }

        $tags = Tag::all();
        $tagsArray = array();

        foreach ($tags as $tag){
            $tagsArray[$tag->id]=$tag->name;
        }


        return view('posts.edit')->withPost($post)->withCategories($categoriesArray)->withTags($tagsArray);

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
        //validate data & CRSF Auto - if unvalidated returns to create
        $post = Post::find($id);
        
        $this->validate($request, array(
                'title'=>'required|max:255',
                'slug'=>($request->slug != $post->slug) ? 'required|alpha_dash|min:5|max:255|unique:posts,slug' : '',
                'body'=>'required',
                'category_id'=>'required|numeric',
                'featured_image'=>'image'
            ));

            
        //store in database        
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'),'youtube');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');

        // Save Image if user supplied one
        if($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/'.$filename);
            Image::make($image)->resize(800,800)->save($location);
            
            $oldFilename=$post->image;

            $post->image=$filename;
            if(strlen($oldFilename)>0){
                Storage::delete('public/images/'.$oldFilename);
            }
        }     

        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags,true);
        }
        else{
             $post->tags()->sync([],true);
        }

        Session::flash('success','This blog post edit was successfully saved!');

        //redirect on complete

        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete('public/images/'.$post->image);
        $post->delete();

        Session::flash('success','This blog post was successfully deleted');

        return redirect()->route('posts.index');

    }
}
