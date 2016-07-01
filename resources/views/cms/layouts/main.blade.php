<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title', 'Page Title') | CMS</title>
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
                        <div class="ui dropdown item {{ AppHelper::is_active_parent('content') }}">
                            <a href="/content">Content</a>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item {{ AppHelper::is_active('content') }}" href="{{ url('content') }}"><i class="list icon"></i> All Content</a>
                                <a class="item {{ AppHelper::is_active('content/create/article') }}" href="/content/create/article"><i class="add icon"></i> Add Article</a>
                                <a class="item {{ AppHelper::is_active('content/create/page') }}" href="/content/create/page"><i class="add icon"></i> Add Page</a>
                                <a class="item {{ AppHelper::is_active('content/create/series') }}" href="/content/create/series"><i class="add icon"></i> Add Series</a>
                                <a class="item {{ AppHelper::is_active('content/create/chapter') }}" href="/content/create/chapter"><i class="add icon"></i> Add Chapter</a>
                            </div>
                        </div>
                        <div class="ui dropdown item {{ AppHelper::is_active_parent('categories') }}">
                            <a href="/categories">Categories</a>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item {{ AppHelper::is_active('categories') }}" href="/categories"><i class="list icon"></i> All Categories</a>
                                <a class="item {{ AppHelper::is_active('categories/create') }}" href="/categories/create"><i class="add icon"></i> Add Categories</a>
                            </div>
                        </div>
                        <div class="ui dropdown item {{ AppHelper::is_active_parent('menus') }}">
                            <a href="/menus">Menus</a>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item {{ AppHelper::is_active('menus') }}" href="/menus"><i class="list icon"></i> All Menus</a>
                                <a class="item {{ AppHelper::is_active('menus/create') }}" href="/menus/create"><i class="add icon"></i> Add Menu</a>
                            </div>
                        </div>
                        <div class="ui dropdown item {{ AppHelper::is_active_parent('users') }}">
                            <a href="/users">Users</a>
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                <a class="item {{ AppHelper::is_active('users') }}" href="/users"><i class="list icon"></i> All users</a>
                                <a class="item {{ AppHelper::is_active('users/create') }}" href="/users/create"><i class="add icon"></i> Add User</a>
                            </div>
                        </div>
                        <div class="ui dropdown item {{ AppHelper::is_active_parent('users/'.Auth::user()->id) }} right">
                            @if (Auth::check())
                                <i class="user icon"></i>
                                <a href="/users/{{ Auth::user()->id }}/edit">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
                                <div class="menu">
                                  <a class="item {{ AppHelper::is_active('users/'.Auth::user()->id.'/edit') }}" href="/users/{{ Auth::user()->id }}/edit"><i class="settings icon"></i> User profile</a>
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
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/semantic.min.js"></script>-->
            <script src="https://cdn.rawgit.com/mdehoog/Semantic-UI/6e6d051d47b598ebab05857545f242caf2b4b48c/dist/semantic.min.js"></script>
        @endif
        <script src="//cdn.ckeditor.com/4.5.9/full/ckeditor.js"></script>
		<script src="/js/dependsOn.min.js"></script>
        <script src="/js/app.js"></script>

    </body>
</html>