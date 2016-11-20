<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Post;
use App\Category;

use Session;
use Mail;

class PagesController extends Controller {

     public function getIndex(){
         $posts = Post::orderBy('created_at','desc')->limit(5)->get();
         $categories = Category::all();
         $categoryposts=array();

         foreach($categories as $category){
             $postscat = Post::where('category_id', $category->id)->orderBy('created_at','desc')->limit(5)->get();
             $categoryposts[$category->id]=$postscat;
        }
         


         return view('pages/welcome')->withPosts($posts)->withCategories($categories)->withCategoryposts($categoryposts);
     }

     public function getAbout(){
         return view('pages/about');
     }

     public function getContact(){
         return view('pages/contact');
     }

     public function postContact(Request $request)
     {
       $this->validate($request,[
           'email'=>'required|email',
           'message'=>'required|min:10|max:255',
           'subject'=>'required|min:3|max:255']);

       $data = array(
           'email'=>$request->email,
           'subject'=>$request->subject,
           'bodyMessage'=>$request->message
       );

       Mail::send('emails.contact',$data,function($message) use ($data){
            $message->from($data['email']);
            $message->to('test@test.com');
            $message->subject($data['subject']);
       });

        Session::flash('success','Your email has been sent. Thank you for contacting us!');
        return redirect('/');
     }


}

?>
