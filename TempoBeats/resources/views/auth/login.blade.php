<!DOCTYPE html>
<html lang="eng">
    

<Head>
    <meta charset="utf-8">
    <title>Login - TempoBeats</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style_login.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</Head>

<body>
        <div class="logo-top">
            <img src="{{asset('images/Group 9.png')}}" width="250px">
        </div> 
        <div class="container">
            <p class="para">To continue, log in to TempoBeats.</p>
            <div class="Continue">
                <button class="loginbtn facebook-login">
                    <i class="fab fa-facebook logo"></i>
                    <p>CONTINUE WITH FACEBOOK</p>
                </button>
                <button class="loginbtn Apple-login ">
                    <i class="fab fa-apple logo"></i>
                    <p>CONTINUE WITH APPLE</p>
                </button>
                <button class="loginbtn Google-login">
                    <i class="fab fa-google logo"></i>
                    <p>CONTINUE WITH GOOGLE</p>
                </button>
            </div>
            <div class="breakline">
                <div class="line"></div>
                <p class="or">OR</p>
                <div class="line"></div>
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form method="POST" action="{{ route('login') }}" class="email-login">
            @csrf
                <label for="email">Email address or username</label>
                <input  id="email" class="email" type="email" name="email" placeholder="Email" require/>
                <label for="pass">Password</label>
                <input id="password" class="pass" type="password" name="password" placeholder="Password" require/>
                
                @if ($errors->has('email'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                 </span>
                @endif
                @if ($errors->has('password'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
               
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
                <div class="rmb"> 
                    <input type="checkbox" value="Remember me"/>
                    <label for="">Remember me</label>
                </div>
                <input type="submit" class="btn" value="LOG IN"/>
            </form>
            <hr>
            <div class="signup">
                <p>Don't have account?</p>
                <button><p>SIGN UP FROM TEMPOBEATS</p></button>
            </div>
        </div>   
    <script async>
        const subtn = document.querySelector(".signup");
        subtn.addEventListener('click',()=>{
                console.log("sign up btn clicked");
                window.location.href= "{{ route('register')}}";
            })
    </script>
</body>
</html>
