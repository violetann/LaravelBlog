<?php
namespace App\Http\Controllers;

class PagesController extends Controller {

     public function getIndex(){
         return view('pages/welcome');
     }

     public function getAbout(){
         $first = "Jenny";
         $last = "Black";
         
         $fullname = $first.' '.$last;
         $email = "te4st@test.com";

         $data = [];
         $data['email']=$email;
         $data['fullname']=$fullname;

         return view('pages/about')->withData($data);
     }

     public function getContact(){
         return view('pages/contact');
     }

     public function postContact(){
         
     }


}

?>
