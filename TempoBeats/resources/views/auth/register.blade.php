<!DOCTYPE html>
<html lang="eng">

<Head>
    <meta charset="utf-8">
    <title>Register - TempoBeats</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/TBLogo.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/style_R.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</Head>

<body>
    <div class="logo-top">
        <img src="{{asset('images/Group 9.png')}}" width="250px">
    </div>
    <div class="container">
        <h1 class="para">Tune in for free by signing up now!</h1>
        <!-- <h1 class="para">Tune in for free by signing up now!</h1>-->
        <div class="Continue">
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
        <div class="emailAddresssign">
            <div class="title">
                <h1>Sign Up using you're email address</h1>
            </div>

    <form method="POST" action="{{ route('register') }}" class="email-login">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <label for="email">Email address</label>
                <input class="email" type="email" name="email" placeholder="Email" />
                @if ($errors->has('email'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('email') }}</strong>
                 </span>
                @endif
                <label for="pass">Password</label>
                <input class="pass"   name="password" type="password" placeholder="Password" />
                @if ($errors->has('password'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('password') }}</strong>
                 </span>
                @endif
                <label for="cpass">Confirm Password</label>
                <input name="password_confirmation" class="cpass" type="password" placeholder="Confirm Password" />
                @if ($errors->has('password_confirmation'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('password_confirmation') }}</strong>
                 </span>
                @endif
                <label for="UserName">UserName</label>
                <input class="UserName" type="text" name="name" placeholder="UserName" />
                @if ($errors->has('name'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('name') }}</strong>
                 </span>
                @endif
                <label for="birthday">Date of birth</label>
                <input type="date" id="birthday" name="birthday">
                @if ($errors->has('birthday'))
                 <span class="Error-msg" role="alert">
                           <strong>{{ $errors->first('birthday') }}</strong>
                 </span>
                @endif<br>
                <label for="Gender">Gender</label>
                <div class="radioG">
                    <input type="radio" id="Male" name="gender" value="Male">
                      <label for="Male">Male</label>
                      <input type="radio" id="Female" name="gender" value="Female">
                      <label for="Female">Female</label>
                      <input type="radio" id="Other" name="gender" value="Other">
                      <label for="Other">Other</label>
                    <input type="radio" id="PreferN" name="gender" value="">
                      <label for="PreferN">Prefer not to say</label>
                </div>
                <div class="check">
                    <input type="checkbox" id="share" value="share">
                    <label id="sharel" for="share">Share my registration data with TempoBeats's content providers for
                        marketing purposes.</label>

                </div>
                <div class="signupa">
                    <p class="p1">By clicking on sign-up, you agree to TempoBeats'S <a href="{{Route('downloadTerms')}}">Terms and Conditions of
                            Use.</a></p>

                    <p class="2">To learn more about how Spotify collects, uses, shares and protects your personal data,
                        please see <a href="{{Route('downloadPrivacy')}}" class="2">TempoBeats's Privacy Policy</a></p>

                </div>
                <input type="submit" class="btn" value="Sign Up" />
            </form>
            <div class="login">
                <p>Have an account? <a href="">Log in.</a></p>

            </div>
        </div>
    </div>
    <script src="" async></script>
</body>

</html>

