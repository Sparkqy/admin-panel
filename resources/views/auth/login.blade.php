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
                                   class="form-control  @include('includes.messages.validation-error-input-class', ['fieldName' => 'password'])"
                                   placeholder="Email" autofocus required>
                            @include('includes.messages.validation-errors', ['fieldName' => 'email'])
                        </div>

                        <div class="form-group has-feedback">
                            <label for="password" class="small text-bold">Password</label>
                            <input type="password" id="password" name="password"
                                   class="form-control @include('includes.messages.validation-error-input-class', ['fieldName' => 'password'])"
                                   placeholder="Password" required>
                            @include('includes.messages.validation-errors', ['fieldName' => 'password'])
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
