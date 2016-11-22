<?php
namespace App\Http\Controllers;
use App\Traits\ActivationTrait;
use App\Activation;
use Session;
class ActivateController extends Controller
{
    use ActivationTrait;
    public function activate($token)
    {
        if (auth()->user()->activated) {
            return redirect()->route('index')
                ->with('status', 'success')
                ->with('message', 'Your email is already activated.');
        }
        $activation = Activation::where('token', $token)
            ->where('user_id', auth()->user()->id)
            ->first();
        if (empty($activation)) {
            Session::flash('errors','No such token in the database. Please try Requesting a new reset.');
            return redirect()->route('index');
        }
        auth()->user()->activated = true;
        auth()->user()->save();
        $activation->delete();
        session()->forget('above-navbar-message');
        
        return redirect()->route('index');
    }
    public function resend()
    {
        if (auth()->user()->activated == false) {
            $this->initiateEmailActivation(auth()->user());
            Session::flash('success','Activation email sent.');
            return redirect()->route('index');
        }
        Session::flash('success','Already activated.');
        return redirect()->route('index');
    }
}