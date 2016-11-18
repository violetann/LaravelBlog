@extends('main')
@section('title','Contact us')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3>Contact Me</h3>
            <hr>
            <form action="{{  url('contact')  }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject"  class="form-control">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control">Enter your Message Here....</textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
