<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UKZSurvey</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/92fb36e307.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,regular,italic,500,500italic,700,700italic,900,900italic" rel="stylesheet" />


    <!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/newapp.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />


 
</head>
<body>
    


    <nav class="nav">
        <div class="nav-container">
        <a href="/" class="logo">Ukz Survey</a>
        <div class="account-name">
            <a href="#" id="trigger-dropdown">Endrit Shabani <span><i class="fas fa-caret-down"></i></span></a>
            <button class="hamburger" id="hamburger"><span></span>
            <span></span>
            <span></span></button>
            <div class="dropdown-menu hide" id="dropdown-menu">
                <ul>
                    <li>
                     <a href="#">Log Out</a>
                    </li>
                </ul>
            </div>
        </div>
     </div>
    </nav>
    <section class="sidebar" id='sidebar'>
     <ul>
         <li><a href="/Survey">Surveys</a></li>
         <li><a href="/Survey/Manage/all">Manage<br/> Surveys</a></li>
         <li><a href="/Professor">Proffesors</a></li>
         <li><a href="/Classes">Subjects</a></li>
         <li><a href="groups.html">Groups</a></li>
         <li><a href="users.html">Users</a></li>
         <li class="logout-small"><a href="#">Log Out</a></li>
     </ul>
    </section>
    <section class="content">
       
       
            @yield('content')
    </section>
    
    <script type="text/javascript" src="{{ URL::asset('js/all.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
    @yield('script')
</body>
</html>
