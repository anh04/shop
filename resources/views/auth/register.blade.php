@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-ms-12 col-xs-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body bg-white">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" id="register-form" action="{{ route('register.create') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('First Name') }}</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required autofocus>
                                    @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Last Name') }}</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required autofocus>
                                    @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus>
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror"  required autofocus>
                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"  required autofocus>

                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="row">

                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('State') }}</label>
                                    <select id="state" name="state" class="form-select">
                                        <option></option>
                                        @if(count($states) > 0)
                                            @foreach($states as $item)
                                                <option value="{{$item->code}}">{{$item->state}}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('City') }}</label>
                                    <select id="city" name="city" class="form-select" ></select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Zip') }}</label>
                                    <select id="zip" name="zip" class="form-select"></select>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label class="col-form-label">{{ __('Address') }}</label>
                                    <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required autofocus>
                                    @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary" id="btn-register">
                                    &nbsp;&nbsp;&nbsp; {{ __('Register') }}&nbsp;&nbsp;&nbsp;
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
