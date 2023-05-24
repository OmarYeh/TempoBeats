<!DOCTYPE html>
<html>
<head>
    <title> @yield('title', 'Default Title')</title>
    <link href="{{ asset('css/styleHome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            width:450px;
            padding:15px;
            border-radius:15px;
            box-shadow: -2px 5px 8px #121212;
        }
        .container p{
            color:white;
        }
        .input{
            outline:none;
            width:300px;
            border-radius:7px;
            padding:5px;
            height:30px;
            font-size:16px;
            margin:0 5px;
            margin-bottom:10px;
        }
        label{
            color:white;
        }
        .logo{
        width: 50%;
        margin:10px 0;
        margin-bottom:15px;
    }
        button{
            margin-top:10px;
            margin-left:90px;
            width: 125px;
            height:30px;
            padding:0px;
            background:rgb(214, 175, 44);
            outline:none;
            border:none;
            border-radius:7px;
            color:white;

        }
        .error{
            color:red;
            margin:5px 0;
        }
        </style>
    </head>
   

<body>
    <div class="container">
    <img class="logo" src="{{ asset('images/temp.png') }}" />
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <br>
            <input class="input" id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 error" />
        </div>

        <!-- Password -->
        <div class="mt-4">
        <label for="password">Password</label>
        <br>
            <input class="input" id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 error" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
        <label for="password_confirmation">Password Confirmation</label>
        <br>
            <input class="input" id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 error" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit">
                {{ __('Reset Password') }}
            </button>
        </div>
    </form>
    </div>
    <body>
</html>
