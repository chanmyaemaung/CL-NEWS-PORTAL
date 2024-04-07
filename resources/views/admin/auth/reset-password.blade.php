<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Reset Password &mdash; CLNEWS</title>


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
                                <h4>{{ __('admin.Reset Password') }}</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.handle-reset-password') }}"
                                    class="needs-validation" novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('Email') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ @request()->email }}" tabindex="1" required autofocus>
                                        <input hidden id="email" name="token" value="{{ $token }}">


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
                                        <div class="d-block">
                                            <label for="password_confirmation" class="control-label">
                                                {{ __('admin.Confirm Password') }}
                                            </label>
                                        </div>

                                        <input id="password_confirmation" type="password" class="form-control"
                                            name="password_confirmation" tabindex="2" required>

                                        @error('password_confirmation')
                                            <code>{{ $message }}</code>
                                        @enderror

                                        <div class="invalid-feedback">
                                            {{ __('admin.Password confirmation does not match') }}
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('admin.Reset Now') }}
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
