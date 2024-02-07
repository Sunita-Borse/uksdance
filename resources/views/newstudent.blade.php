
 <!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Information Form</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
       <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
   <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('/public/css/style.css')}}">

    <style>
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
            margin: 0 0px;
            width:auto;
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
        <div class="logo">
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
<div class="container">
    <div class="card">
        <h3>Student Information Form</h3>
         @if($errors->any())

        <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)

                <li class="list-group-item">
                    {{ $error }}
                </li>

                @endforeach

            </ul>

        </div>

        @endif

        <form action="/newstudent" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">(A) Student Full Name</label>
                <input type="text" class="form-control my-2" name="name" placeholder="Name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" class="form-control my-2" name="dob" placeholder="DOB" value="{{ old('dob') }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control my-2" name="email" placeholder="Enter Email" value="{{ old('email') }}">
            </div>

            <div class="form-group col-md-6 my-2" style="padding-left:0px;">
                <label for="maritalstatus">Marital Status</label>
                <select class="form-control my-2" name="maritalstatus" required="required" value="{{ old('maritalstatus') }}">
                    <option value="single" {{ old('maritalstatus') == "single" ? 'selected' : '' }}>Single</option>
                    <option value="married" {{ old('maritalstatus') == "married" ? 'selected' : '' }}>Married</option>
                </select>
            </div>
             

            <div class="form-group">
            <label for="phone"> Phone </label>
    <input type="number" class="form-control my-2" name="phone" placeholder="Contact Number" value="{{ old('phone') }}">
    </div>
      

    <div class="form-group">
    <label for="fathername"> Father Name </label>
    <input type="text" class="form-control my-2" name="fathername" placeholder="Father/Husband Name" value="{{ old('fathername') }}">
    </div>
    <div class="form-group">
    <label for="mothername"> Mother Name </label>
    <input type="text" class="form-control my-2" name="mothername" placeholder="Mother Name" value="{{ old('mothername') }}">
    </div>
    <div class="form-group">
    <label for="permanentaddress"> Permanent Address </label>
            <textarea name="permanentaddress" placeholder="Permanent Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('permanentaddress') }}">{{ old('permanentaddress') }}</textarea>
    </div>
    <div class="form-group">
    <label for="currentaddress"> Current Address </label>
            <textarea name="currentaddress" placeholder="Current Address"  class="form-control my-2"  cols="10" rows="3" value="{{ old('currentaddress') }}">{{ old('currentaddress') }}</textarea>
    </div>
    
      <div class="form-group">
     <label for="recentphoto">  Please Add your Recent Photo (250px by 250px)  </label>
    <input type="file" class="form-control-file my-2" name="recentphoto" >
    </div>  
   

    

    <div class="form-group">
   

    <label for="birthcertificate">  Please Add your Birth Certificate (Not more than 500KB)  </label>
   
    <input type="file" class="form-control-file my-2" name="birthcertificate" value="{{ old('birthcertificate') }}">
    
</div>  

    <div class="form-group">
    <label for="marriagecertificate">  Please Add your Marriage Certificate (Not more than 500KB)  </label>
    
    <input type="file" class="form-control-file my-2" name="marriagecertificate" value="{{ old('marriagecertificate') }}">
    </div>   
     
 

<div class="form-group">
   

    <label for="dancestyle">Select Dance Style:</label>
    <select name="dancestyle" id="dancestyle">
       @foreach(\App\Enums\Dancestyle::cases() as $dstyle)
    <option value="{{ $dstyle->value }}">{{ $dstyle->label() }}</option>
@endforeach
    </select>

    
<div class="form-group">
    <label for="exam" class="control-label">Exam Year</label>

    <div class="col-md-6" style="padding-left:0px;">
        <select id="exam" class="form-control" name="exam" required="required"  >
          
 @foreach(\App\Enums\Exam::cases() as $exam)
                <option value="{{ $exam->value }}">{{ $exam->label() }}</option>
            @endforeach
        </select>
    </div>
</div>    

  



    <div class="form-group">
    <label for="description"> Description </label>
            <textarea name="description" placeholder="Description"  class="form-control my-2"  cols="10" rows="3" value="{{ old('description') }}">{{ old('description') }}</textarea>
    </div>
    

 
        <div class="form-group">
            <div class="form-check" style="padding-left:0px;">
                <input class="" type="checkbox" value="1" id="t&c" name="t&c" style="margin-left: 0px;" {{ (old('t&c') == '1') ? 'checked' : ''}} style="margin-left: 0px; width: auto !important; margin-top: 7px !important;">
                <label class="form-check-label" style="padding-left:20px;" for="t&c">
                    I agree to the terms and conditions.
                </label>
            </div>
            </div>

            <!-- Add more form groups for other fields -->

            <div class="form-group text-center">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</div>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/public/js/popper.js')}}"></script>
    <script src="{{asset('/public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/public/js/main.js')}}"></script>
</body>
</html>
