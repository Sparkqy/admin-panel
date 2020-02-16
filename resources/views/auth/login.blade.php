@extends('layouts.no-sidebar')
@section('title', 'Login')

@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="login-box-body">
                <h1 class="h4">Login</h1>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="my-4">
                        <div class="form-group has-feedback">
                            <label for="email" class="small text-bold">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="Email" autofocus required>

                            @if ($errors->has('email'))
                                <span class="glyphicon glyphicon-envelope form-control-feedback">
                                    {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback">
                            <label for="password" class="small text-bold">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="Password" required>

                            @if ($errors->has('password'))
                                <span class="glyphicon glyphicon-lock form-control-feedback">
                                    {{ $errors->first('password') }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
