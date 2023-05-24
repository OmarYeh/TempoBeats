<!DOCTYPE html>
<html>
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Email verification</title>
    <style>
        *{
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
        }
        body{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            background-color:#1d1b1b;
            
        }

        .container{
            margin-top:250px;
            display:flex;
            background-color:#131313;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            width:500px;
            height:250px;
            padding:15px;
            border-radius:15px;
            box-shadow: -2px 5px 8px #121212;
        }
        .container p{
            color:white;
        }
        .logo{
        width: 50%;
        margin:10px 0;
    }
        
        .msg{
            text-align:center;
        }
        .msg p{
            color:white;

        }
        .msg2con {
            display:flex;
            flex-direction:row;
            justify-content:baseline;
            align-items:center;
        }
        .msg2con button{
            color:white;
            margin-left:5px;
            width:75px;
            height:30px;
            padding:0px;
            background:rgb(214, 175, 44);
            outline:none;
            border:none;
            border-radius:7px;

        }
        .input{
            outline:none;
            width:250px;
            border-radius:7px;
            padding:5px;
            height:20px;
            font-size:16px;
            margin:0 5px;
        }
        label{
            color:white;
        }
        </style>
</head>
<body>
<div class="container">

    
<div class="msg">
<img class="logo" src="{{ asset('images/temp.png') }}" />
    </div>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                       

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </body>
    </html>

