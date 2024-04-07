<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; CLNEWS</title>


    @include('admin.layouts.styles.styles')

</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>{{ __('admin.Login') }}</h4>
                            </div>

                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.handle-login') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('admin.Email') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>

                                        @error('email')
                                            <code>{{ $message }}</code>
                                        @enderror

                                        <div class="invalid-feedback">
                                            {{ __('admin.Please fill in your email') }}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password"
                                                class="control-label">{{ __('admin.Password') }}</label>
                                            <div class="float-right">
                                                <a href="{{ route('admin.forgot-password') }}" class="text-small">
                                                    {{ __('admin.Forgot Password?') }}
                                                </a>
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>

                                        @error('password')
                                            <code>{{ $message }}</code>
                                        @enderror

                                        <div class="invalid-feedback">
                                            {{ __('admin.Please fill in your password') }}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label"
                                                for="remember-me">{{ __('admin.Remember Me') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('admin.Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; CLNEWS {{ date('Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('admin.layouts.scripts.scripts')
</body>

</html>
