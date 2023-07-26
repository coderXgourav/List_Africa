<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from www.yello.ae/sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 05:23:48 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Language" content="en" />
    <meta name="viewport"
        content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=0, width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Members Sign In - Africa Business Directory</title>
    <meta name="description"
        content="Members Sign In. Welcome to  Africa. Enter your username and password here in order to login on Africa Business Directory:" />
    <link rel="stylesheet" type="text/css" href="css/main.mina2f7.css?v=556" />
    <link rel="shortcut icon" href="{{url('img/africa-logo.png')}}" type="image/png" sizes="96x96" type="image/png" />
    <link rel="stylesheet" type="text/css" href="css/profile.mina2f7.css?v=556" />
    <link rel="manifest" href="manifest/aemanifest.json">
    <link rel="apple-touch-icon" href="{{url('img/africa-logo.png')}}">
    <meta name="msapplication-config" content="none" />
    <meta name="theme-color" content="#7fc6c8">
    <meta name="msapplication-navbutton-color" content="#7fc6c8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="preconnect" href="https://ajax.googleapis.com/">
    <link rel="preconnect" href="https://maxcdn.bootstrapcdn.com/">
    <link rel="preconnect" href="https://googleads.g.doubleclick.net/">
    <link rel="alternate" type="application/rss+xml" title="Africa Business Directory Feed" href="rss.html">
    <meta property="og:image" content="https://www.yello.ae/img/site/members-sign-in.jpg" />
    <meta property="fb:app_id" content="1360649584020818" />
    <style>
        .nv_footer {
            background-color: rgba(48, 46, 46, 0.836);
        }
        .error{
          color:red;
        }
    </style>
</head>

<body>
    <main>
        <div class="nv_top">
            <a href="{{ url('/') }}"
                class="logo_link logo_yello" style="background-image: url({{ url('img/africa-logo.png') }});  background-size: 117px 80px; height:100px;">Africa
                Business Directory - Africa</a></div>
        <div class="nv_inner r_3px">
            <h1>Members Sign In</h1>
            <div style="border-bottom: solid 1px #e1e8e9; height: 30px; margin : 0 0 -20px 0;"></div>
            <div class="acenter"
                style="line-height: 40px; width: 40px; margin : 0 auto; background: white; padding-bottom : 10px;">Login
            </div>
            <form id="user_login">
                <fieldset style="display:none;"><input type="hidden" name="_method" value="POST" /></fieldset>
                <div class="input text"><input type="text" placeholder="Username" class=""
                        value="" id="" name="username" /></div>
                <div class="input password"><input type="password" name="password" placeholder="Password" class=""
                        value="" id="" /></div>
                <div class="submit acenter" id="login_submit">
                    <input type="submit" id="btn" value="Sign in" />
                </div>
                <br />
                <div class="acenter">
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ url('authorized/google') }}">
                            <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="border: 0;
                            outline: none;
                            width: 190px;
                            border-radius: 5px;">
                        </a>
                    </div>
                </div>
                {{-- <div class="acenter" style="display:none;">
                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ url('login/facebook') }}">
                            <img src="https://goolaracompany.files.wordpress.com/2017/01/fb-logo-signup.png" style="border: 0;
                            outline: none;
                            width: 190px;
                            border-radius: 5px;"
                        </a>
                    </div><br />
                </div> --}}

                
                <div class="acenter"><br />
                    <h2 class="acenter">Not a Member Yet?</h2>
                    <a href="{{ url('sign-up') }}" id="login_box_sign_up" class="signup_fb signup_business r_20px">Sign
                        up</a>
                </div>
            </form>
            <br />
        </div>
    </main>
    {{-- <footer class="nv_footer">
        <a href="#" rel="nofollow, noindex">Contact us</a>
        <a href="#" rel="nofollow, noindex">Terms of use</a>
        <a href="#" rel="nofollow, noindex">Cookies policy</a><a href="#"
            rel="nofollow, noindex">Privacy policy</a>
    </footer> --}}
    <script src="{{ url('project-js/jquery.js') }}"></script>
    <script src="{{ url('project-js/validation.js') }}"></script>
    <script src="{{ url('project-js/sweetalert.js') }}"></script>
    <script src="{{ url('project-js/user/user-login.js') }}"></script>
</body>

<!-- Mirrored from www.yello.ae/sign-in by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 May 2023 05:23:49 GMT -->

</html>
