<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href={{asset('css/app.css')}}>
</head>

<body>

    <header>
        <div class="navbar-container p-2">
            <div class="navbar-left-container">
                <div class="navbar-logo">
                    <a href="">
                        <img class="logo-img" src={{asset('assets/cosmepick_logo_crop.jpg')}} alt="logo">
                    </a>
                </div>
                <div class="navbar-text">
                    <a href={{route('ViewHome')}}>Home</a>
                </div>
                <div class="navbar-text">
                    <a href={{route('ViewJoin')}}>Join</a>
                </div>
                <div class="navbar-text">
                    <a href={{route('ViewOrganize')}}>Organize</a>
                </div>
                <div class="navbar-text">
                    <a href={{route('ViewProfile')}}>Profile</a>
                </div>
            </div>

            <div class="navbar-right-container">
                <div class="navbar-text">
                    @guest
                        <a href={{route('login')}}>Login</a>
                    @endguest
                    @auth
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" style="border: none; background-color: inherit">Logout</button>
                        </form>
                    @endauth
                    
                    
                </div>
                <div class="search">
                    <label for="">
                        <img class="search-img" src={{asset('assets/search.png')}} alt="">
                    </label>
                    <input size="4" type="text" name="search" id="" placeholder="Search class name">
                </div>
            </div>
        </div>
    </header>

    @section('content')
    @show

    <div class="footer-container">

        <div class="left-footer-container">
            <div class="footer-logo">
                <a href="">
                    <img class="logo-img" src={{asset('assets/logo_footer.png')}} alt="">
                </a>
            </div>
            <div>
                <div>
                    <a class="footer-link-left" href={{route('ViewHome')}}>
                        Home
                    </a>
                </div>
                <div>
                    <a class="footer-link-left" href={{route('ViewJoin')}}>
                        Join Workshop
                    </a>
                </div>
                <div>
                    <a class="footer-link-left" href={{route('ViewOrganize')}}>
                        Organize Workshop
                    </a>
                </div>
                <div>
                    <a class="footer-link-left" href={{route('ViewProfile')}}>
                        Profile
                    </a>
                </div>
                <div>
                    <a class="footer-link-left" href="">
                        Contact Us
                    </a>
                </div>
            </div>
        </div>

        <div class="right-footer-container">
            <div>
                <a class="footer-link-right" href="http://www.facebook.com/">
                    <img src={{asset('assets/fb.png')}} alt="">
                </a>
            </div>
            <div>
                <a class="footer-link-right" href="http://www.instagram.com/">
                    <img src={{asset('assets/ig.png')}} alt="">
                </a>
            </div>
            <div>
                <a class="footer-link-right" href="http://www.youtube.com/">
                    <img src={{asset('assets/yt.png')}} alt="">
                </a>
            </div>
        </div>
    </div>
    <script src={{asset('js/app.js')}}></script>

</body>

</html>
