<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Page Title') | Site</title>
        @if (App::environment('local'))
            <link rel="stylesheet" href="/css/semantic.min.css">
        @else
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.min.css">
        @endif
        <link rel="stylesheet" href="/css/site.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
            <header>
                <nav>
                    <div class="ui menu inverted">
                        <a class="header item" href="/">Site</a>
                    </div>
                </nav>
            </header>
        @endif

        <div class="ui contain">

            <h1 class="ui header">
                @yield('header')
            </h1>

            <div class="ui hidden clearing fitted divider"></div>

        	@yield('content')

        </div>

        <footer>

        </footer>

        @if (App::environment('local'))
            <script src="/js/jquery.min.js"></script>
            <script src="/js/semantic.min.js"></script>
        @else
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.1/semantic.min.js"></script>
        @endif
        <script src="/js/site.js"></script>

    </body>
</html>
