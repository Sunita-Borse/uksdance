<!DOCTYPE html>
<!-- Coding by Multiwebpress-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/style.css"/>
    <title> Home page </title>
    <style>
        *{
    margin:0; padding:0;
    color:#f2f5f7;
    font-family: sans-serif;
    letter-spacing: 1px;
    font-weight: 300;
}

body{
    overflow: hidden;

}

nav{
    height: 6rem;
    width: 100vw;
    display: flex;
    position: fixed;
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
           
      <h1 class=" logo-header" ><a style="color: #BF9961 !important;" href="/student_inquiry">UKS</a></h1>
        </div>
        <div class="hamburger">
            <div class="bars1"></div>
            <div class="bars2"></div>
            <div class="bars3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="#">HOME</a></li>
            <li><a href="#">ABOUT</a></li>
            <li><a href="/newstudent">NEW STUDENT</a></li>
            
            <li><a href="#">Contact Us</a></li>
            <li><a href="/register">REGISTER</a></li>
            <li><a href="/login">LOGIN</a></li>
            <!-- <li><button class="login-button" href="/login">Sign In</button></li> -->
        </ul>
    </nav>
    <!-- <script src="javascript/script.js"></script> -->
    <script>const hamburger = document.querySelector(".hamburger");
const navLinks = document.querySelector(".nav-links");
const links = document.querySelectorAll(".nav-links li");

hamburger.addEventListener('click', ()=>{
   //Links
    navLinks.classList.toggle("open");
    links.forEach(link => {
        link.classList.toggle("fade");
    });

    //Animation
    hamburger.classList.toggle("toggle");
});</script>
</body>
</html>