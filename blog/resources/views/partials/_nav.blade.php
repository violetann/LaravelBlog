<nav class="navbar navbar-fixed-top navbar-dark bg-inverse navbar-full">

        <a class="navbar-brand" href="/" style="margin-right:100px">
            <img src="{{ asset('img/waterfall.jpg') }}" class="d-inline-block align-top brand-nav-image" alt="">
            The Secret Garden
        </a>

        <button class="navbar-toggler hidden-sm-up " type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
            &#9776;
        </button>

       <div class="collapse navbar-toggleable-xs " id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item {{  Request::is('/')?'active':'' }}"><a class="nav-link" href="/">Home <span class="sr-only">{{  Request::is('/')?'(current)':'' }}</span></a></li>
                <li class="nav-item {{  Request::is('blog')?'active':'' }}"><a class="nav-link" href="/blog">Blog <span class="sr-only">{{  Request::is('blog')?'(current)':'' }}</span></a></li>
                <li class="nav-item {{  Request::is('about')?'active':'' }}"><a class="nav-link" href="/about">About <span class="sr-only">{{  Request::is('about')?'(current)':'' }}</span></a></li>
                <li class="nav-item {{  Request::is('contact')?'active':'' }}"><a class="nav-link" href="/contact">Contact <span class="sr-only">{{  Request::is('contact')?'(current)':'' }}</span></a></li>
            </ul>
        

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav dropdown float-xs-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/register') }}">Register</a></li>
                @else
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="supportedContentDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="supportedContentDropdown">
                        <a class="dropdown-item" href="{{ route('posts.index') }}">Posts</a>
                        <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                        <a class="dropdown-item" href="{{ route('tags.index') }}">Tags</a>

                        <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>

                    </div>
                @endif
            </ul>    
        </div>
<!-- /.container -->
</nav>
