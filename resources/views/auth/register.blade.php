@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                <span id="error_name"></span>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                <span id="error_email"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{ $message }</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="register">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#email').blur(function () {
            var email = $('#email').val();
            var filtrovanie = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var _token = $('input[name="_token"]').val();
            if (filtrovanie.test(email)) {
                $.ajax({
                    url: "{{ route('email_available.check') }}",
                    method: "POST",
                    data: {email: email, _token: _token},
                    success: function (result) {
                        if (result == 'ok') {
                            $('#error_email').html('<label class="text-success font-weight-bold">Tento email sa ešte nepoužíva! </label>' +
                                '<img src="https://www.flaticon.com/svg/vstatic/svg/845/845646.svg?token=exp=1611065829~hmac=8c103b7d34a9c3d387e5ce8c747d2612" style="height: 15px; width: 15px;">');
                            $('#email').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        } else {
                            $('#error_email').html('<label class="text-danger font-weight-bold">Tento email je obsadený! </label>' +
                                '<img src="https://www.flaticon.com/svg/vstatic/svg/1828/1828599.svg?token=exp=1611065406~hmac=782af410d95fa91b210d5a5527c7c019" style="height: 15px; width: 15px;">');
                            $('#email').addClass('has-error');
                            $('#register').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

        $('#name').blur(function () {
            var name = $('#name').val();
            var _token = $('input[name="_token"]').val();
            if (name.length > 0) {
                $.ajax({
                    url: "{{ route('name_available.check') }}",
                    method: "POST",
                    data: {name: name, _token: _token},
                    success: function (result) {
                        if (result == 'ok') {
                            $('#error_name').html('<label class="text-success font-weight-bold">Toto uživateľské meno sa ešte nepoužíva!</label>' +
                                '<img src="https://www.flaticon.com/svg/vstatic/svg/845/845646.svg?token=exp=1611065829~hmac=8c103b7d34a9c3d387e5ce8c747d2612" style="height: 15px; width: 15px;">\');');
                            $('#name').removeClass('has-error');
                            $('#register').attr('disabled', false);
                        } else {
                            $('#error_name').html('<label class="text-danger font-weight-bold">Toto uživateľské meno sa už používa!</label>' +
                                '<img src="https://www.flaticon.com/svg/vstatic/svg/1828/1828599.svg?token=exp=1611065406~hmac=782af410d95fa91b210d5a5527c7c019" style="height: 15px; width: 15px;">');
                            $('#name').addClass('has-error');
                            $('#register').attr('disabled', 'disabled');
                        }
                    }
                })
            }
        });

    });
</script>


@endsection
