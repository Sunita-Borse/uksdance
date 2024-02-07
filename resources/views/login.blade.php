<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Include any additional CSS stylesheets or external libraries here -->
    <style>
        body {
            font-family: 'Arial', sans-serif; /* Use your preferred font family */
            background-color: #f8f9fa; /* Set your preferred background color */
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-top: 50px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
           
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
        }

        .form-input {
            width: -webkit-fill-available;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .remember-me {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #495057;
        }

        .submit-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: 600;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .forgot-password {
            font-size: 14px;
            color: #6c757d;
            text-align: right;
        }

         body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            /* overflow: hidden; */
        }

        .container {
            width: 50%;
            margin: auto;
            /* margin-top: 20px; */
        }

        .card {
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="checkbox"] {
            margin: 0 10px;
        }

        select, input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn-success {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .form-check {
            padding-left: 0;
        }

        .form-check-label {
            padding-left: 20px;
        }
        
nav{
    height: 6rem;
    /* width: 100vw; */
    display: flex;
    /* position: fixed; */
    z-index: 10;
    background-color: #fff;
    box-shadow: 0 3px 20px rgba(0,0,0,0.2);
}

/* Styling Logo*/

.logo{
    /* padding: 3vh 3vw;
    text-align: left;
    width: 20vw; */
    font-family: serif;
    min-height: 95px;
    background: #FFFFFF;
    max-width: 298px;
}

.logo img{
    width: 75px;
    height: auto;
    float: left;
    margin: auto;
}
.logo-header{

    font-size: 76px;
    color: #BF9961 !important;
    margin: 0 0 0px 90px;
    line-height: initial;
    font-weight: lighter;
}

/* Styling Navigation Links*/

.nav-links{
    width: 80vw;
    display: flex;
    padding: 0 0.7vw;
    justify-content: space-evenly;
    align-items: center;
    text-transform: uppercase;
    list-style: none;
    font-weight: 600;
}

.nav-links li a{
    margin: 0 0.7vw;
    text-decoration: none;
    transition: all ease-in-out 350ms;
    padding: 10px;
    color:#BF9961 !important;
}

.nav-links li a:hover{
    color:#000;
    background-color: #fff;
    padding: 10px;
    border-radius: 50px;
    color:#BF9961 !important;
}

.nav-links li{
    position:relative;
}

.nav-links li a:hover::before{
    width: 80%;
}


/*Buttons Styling*/

.login-button{
    padding: 0.6rem 0.8rem;
    margin-left: 2vw;
    font-size:1rem;
    cursor:pointer;
    color:#fff;
    background-color: #dd5f24;
    border:1.5px solid #dd5f24;
    border-radius: 2em;
}

.login-button:hover{
    color:#fff;
    background-color: #dd5f24;
    border:1.5px solid #dd5f24;
    transition: all ease-in-out 350ms;
}

/*Navigation Icon Styling*/

.hamburger div{
    width: 30px;
    height: 3px;
    background: #f2f5f7;
    margin: 5px;
    transition: all 0.3s ease;
}

.hamburger{
    display: none;
}


/*Responsive Adding Media Queries*/

@media screen and (max-width: 800px){
    nav{
        position: fixed;
        z-index: 3;
    }
    .hamburger{
        display:block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links{
        background: #053742;
        position: fixed;
        opacity: 1;
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
    }
    .nav-links.open{
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
    }
    .nav-links li{
        opacity: 0;
    }
    .nav-links li:nth-child(1){
        transition: all 0.5s ease 0.2s;
    }
    .nav-links li:nth-child(2){
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3){
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4){
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5){
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6){
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7){
        transition: all 0.5s ease 1s;
        margin: 0;
    }

    li.fade{
        opacity: 1;
    }

    /* Navigation Bar Icon on Click*/

        .toggle .bars1{
            transform: rotate(-45deg) translate(-5px, 6px);
        }

        .toggle .bars2{
            transition: all 0s ease;
            width: 0;
        }

        .toggle .bars3{
            transform: rotate(45deg) translate(-5px, -6px);
        }
    }
    </style>
</head>
<body>
<nav>
        <div class="logo" style="margin: auto;
    margin-bottom: 40px ">
            <img decoding="async" src="{{ asset('/public/assets/img/logo2.jpg') }}" alt="Logo Image">
           
      <h1 class=" logo-header" ><a style="color: #BF9961 !important; text-decoration:none!important;" href="/student_inquiry">UKS</a></h1>
        </div>
        <div class="hamburger">
            <div class="bars1"></div>
            <div class="bars2"></div>
            <div class="bars3"></div>
        </div>
        <ul class="nav-links">
            
            <li><a href="#">ABOUT</a></li>
            <li><a href="newstudent">NEW STUDENT</a></li>
            
            <li><a href="#">Contact Us</a></li>
            <li><a href="/register">REGISTER</a></li>
            <li><a href="/">LOGIN</a></li>
            <!-- <li><button class="login-button" href="/login">Sign In</button></li> -->
        </ul>
    </nav>
    <div class="login-container">
        <!-- Logo -->
        <div class="logo2"  style="text-align: center;">
            <a href="/"><img src="{{ asset('/public/assets/img/ukslogo2.png') }}" alt="Logo" class="img-fluid"></a>
        </div>

         @if($errors->any())

        
                @foreach($errors->all() as $error)

               <p style="color:red;">
                    {{ $error }}</p>
              

                @endforeach

           

        @endif

        <form method="POST" action="{{ route('Login') }}">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                <input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="form-group">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
            </div>

            <!--div class="form-group remember-me">
                <label for="remember_me">
                    <input id="remember_me" type="checkbox" name="remember" />
                    {{ __('Remember me') }}
                </label>
            </div-->

            <div class="form-group">
                <button type="submit" class="submit-btn">{{ __('Log in') }}</button>
            </div>
        </form>

        <div class="forgot-password">
         
                <a href="/forgot-password">Forgot your password?</a>
          
        </div>
    </div>

    <!-- Include any additional scripts or JavaScript libraries here -->
</body>
</html>
