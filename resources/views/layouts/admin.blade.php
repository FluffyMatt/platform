<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Page Title') | Geek Squad Complaints</title>
        @if (App::environment('local'))
            <link rel="stylesheet" href="/css/semantic.min.css">
        @else
            <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.css">-->
            <link rel="stylesheet" href="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.css">
        @endif
        <link rel="stylesheet" href="/css/app.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        @if (Auth::check())
            <header>
                <nav>
                    <div class="ui menu inverted">
                        <a class="header item">CMS</a>
                        <div class="ui dropdown item">
                            Content
                            <i class="dropdown icon"></i>
                            <div class="menu">
                              <a class="item" href="/content/create"><i class="add icon"></i> Add Content</a>
                            </div>
                        </div>
                        <div class="ui dropdown item right">
                            @if (Auth::check())
                                <i class="user icon"></i>
                                {{Auth::user()->name}}
                                <div class="menu">
                                  <a class="item" href="/users/{{Auth::user()->id}}/edit"><i class="settings icon"></i> User profile</a>
                                  <a class="item" href="/logout"><i class="sign out icon"></i> Logout</a>
                                </div>
                            @else

                            @endif
                        </div>
                    </div>
                </nav>
            </header>
        @endif

        @if (Auth::check())
            <div class="ui container">
        @endif

        @include('shared._errors')

        @if (Auth::check())
        <h1 class="ui dividing header">
            @yield('header')
        </h1>
        @endif
        
        @yield('content')

        @if (Auth::check())
            </div>
        @endif

        <footer>

        </footer>

        @if (App::environment('local'))
            <script src="/js/jquery.min.js"></script>
            <script src="/js/semantic.min.js"></script>
        @else
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>-->
            <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
        @endif
        <script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
        <script src="/js/app.js"></script>

    </body>
</html>
