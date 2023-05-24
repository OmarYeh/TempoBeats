
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
        .msgS{
            margin:5px 0;
            color:#22d710;
        }
        </style>
</head>
<body>
<div class="container">

    
<div class="msg">
<img class="logo" src="{{ asset('images/temp.png') }}" />
        <p>Forgot Your Password?</p>
        <p> Please, Enter your email below and we will send you a link to reset your password!</p>
            
    </div>
    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600 msgS">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

 <!-- Session Status -->
 <x-auth-session-status class="mb-4 msgS" :status="session('status')" />

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
     <div class="msg2con">
            
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="input" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2" style="color:red;margin:5px 0;"/>
    

   
    <button type="submit">
                    {{ __('Send Link') }}
                </button>
                </div>
</form>
 
       
   
    </div>
</body>
</html>
