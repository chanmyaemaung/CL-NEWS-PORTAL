<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Forgot Password &mdash; CLNEWS</title>

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
                                <h4>{{ __('admin.Forgot Password') }}</h4>
                            </div>

                            <div class="card-body">
                                <p class="text-muted">
                                    {{ __('admin.Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                                </p>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('admin.send-reset-link-email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">{{ __('admin.Email') }}</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>

                                        @error('email')
                                            <code class="text-danger">
                                                {{ $message }}
                                            </code>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('admin.Forgot Password') }}
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
