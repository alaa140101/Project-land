<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link href="{{!! asset('css/app.css') !!}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href=" {{mix ('css/app.css')}}">


    {{-- <script src="https://kit.fontawesome.com/6da2c478e2.js" crossorigin="anonymous"></script> --}}

</head>
<body @if(LaravelLocalization::getCurrentLocale() == 'ar')
        dir="rtl" style="text-align:right;" lang="ar"
        @else
        dir="ltr" style="text-align:left;" lang="en"
        @endif >
    <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/') }}" class="nav-link">{{ __('main.Projects') }}</a>
                        </li>
                        @auth                            
                        @if (auth()->user()->is_admin)
                        <li class="nav-item">
                            <a href="{{ LaravelLocalization::localizeUrl('/subscribers') }}" class="nav-link">{{ __('main.Subscribers') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/projects/create') }}" class="nav-link">{{ __('main.Create Project') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ LaravelLocalization::localizeUrl('/sendEmails') }}" class="nav-link">{{ __('main.Send Emails') }}</a>
                        </li>
                        @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav">
                        <!-- Authentication Links -->
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                                </li>
                                @endif
                                
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-{{app()->getLocale()=='ar' ? 'start':'end'}}" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('auth.Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-1">
            @if (Session::has('flash_message'))
                        <div class="p-3 mb-2 bg-success text-white rounded text-center">
                            {{ session('flash_message')}}
                        </div>
            @endif
        </div>
        <main class="min-vh-100 py-4">

            @yield('content')
        </main>
            <!-- Footer -->           
            <footer class="p-5 navbar-dark bg-dark shadow-sm text-white">
              <div class="container">
                  <form class="input-group"  action="{{route('subscriber.store')}}" method="post">
                    @csrf
                    <div class="row w-100">
                        <div class="col-8">
                            <input type="text" class="form-control mx-1 @error('email') is-invalid @enderror" name="email" id="email" placeholder="email@email.com">
                            @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-4">
                            <button class="btn btn-primary w-40  mx-2" type="submit">{{__('main.Subscirbe')}}</button>
                        </div>
                    </div>         
                </form>  
              </div>
          
              <div class="d-flex justify-content-between py-4 my-4 border-top">
                <p>&copy; 2022 {{ trans('main.copy right')}}</p>
                {{-- <ul class="list-unstyled d-flex">
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                  <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul> --}}
              </div>
            </footer>
            <!-- Footer -->
    </div>

    @yield('script')
</body>
</html>
