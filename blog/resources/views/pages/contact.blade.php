@extends('main')
@section('title','Contact us')
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Contact us</h3>
            <hr>
            <form action="{{  url('contact')  }}" method="POST">
            {{csrf_field()}}
                <div class="form-group">
                    <label name="email">Email:</label>
                    <input id="email" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label name="subject">Subject:</label>
                    <input id="subject" name="subject"  class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label name="message">Message:</label>
                    <textarea id="message" name="message" class="form-control" placeholder="Enter your Message Here...."></textarea>
                </div>
                <input type="submit" value="Send Message" class="btn btn-success">
            </form>
        </div>
    </div>
@endsection
