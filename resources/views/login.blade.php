@extends('layouts.authentication')
@section('title', 'Login')

@section('content')
<div class="pattern">
    <span class="red"></span>
    <span class="indigo"></span>
    <span class="blue"></span>
    <span class="green"></span>
    <span class="orange"></span>
</div>

<div class="auth-main particles_js">
    <div class="auth_div vivify popIn">
        <div class="card">
            <div class="body">
                <p class="lead">Login</p>
                <form class="form-auth-small m-t-20" action="/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="signin-email" class="control-label sr-only">NIS</label>
                        <input type="text" class="form-control round" id="signin-email" placeholder="NIS" value="{{ old('nis') }}" name="nis">
                    </div>
                    <div class="form-group">
                        <label for="signin-password" class="control-label sr-only">Password</label>
                        <input type="password" class="form-control round" id="signin-password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-round btn-block">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
    <div id="particles-js"></div>
</div>
@stop

@section('page-styles')

@stop

@section('page-script')

@stop