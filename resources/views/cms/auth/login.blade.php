@extends('cms.layouts.main')

@section('title', 'Login')

@section('content')

<div class="ui middle aligned center aligned grid">

    <div class="column" style="max-width: 450px;">

        <h2><div class="content">Login to your account</div></h2>

        <form class="ui large form" id="login" method="post" action="/cms/login">

            <div class="ui segment">

            {{ csrf_field() }}

            <div class="field">
                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="username" placeholder="Username">
                </div>
            </div>

            <div class="field">
                <div class="ui left icon input">
                    <i class="lock icon"></i>
                    <input type="password" name="password" placeholder="******">
                </div>
            </div>

            <button class="ui button large submit primary" type="submit">Login</button>

            </div>

        </form>

    </div>

</div>

@endsection
