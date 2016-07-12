<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Page Title') | CMS</title>
        @if (App::environment('local'))
            <link rel="stylesheet" href="/css/semantic.min.css">
        @else
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
        @endif
        <link rel="stylesheet" href="/css/cms.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>

		@include('cms.shared._bar')

        @if (Auth::check())
            <div class="ui contain">
        @endif

        @include('cms.shared._errors')

        @include('cms.shared._alerts')

        @if (Auth::check())

            @yield('buttons')

            <h1 class="ui header">
                @yield('header')
            </h1>

            <div class="ui hidden clearing fitted divider"></div>

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
            <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
        @endif

        <script src="/js/moment.min.js"></script>
        <script src="/js/moment-timezone-with-data.min.js"></script>
		<script>
			var tz = '{{ config('app.timezone') }}';
		</script>
        <script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
		<script src="/js/dependsOn.min.js"></script>
        <script src="/js/cms.js"></script>

    </body>
</html>
