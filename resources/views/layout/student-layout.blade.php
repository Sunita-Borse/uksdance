<!doctype html>
<html lang="en">
  <head>
  	<title>UKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/ico" href="{{ asset('/public/favicons/favicon.ico') }}">

     <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- Include Bootstrap CSS -->
   <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('/public/css/style.css')}}">
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>




		<style>
		#sidebar-wrapper .dropdown-menu {
     position: relative; 
     float:none;
     background-color:#1F496C;
} 
		</style>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">

   @php
    $user = auth()->user();
    $currentStudentInfo = $user ? $user->studentInfo : null;
    $currentExam = $currentStudentInfo ? $currentStudentInfo->exam->value : null;
    
    $dancestyleJson = $currentStudentInfo ? $currentStudentInfo->dancestyle : null;

    // Decode JSON string to an array
   // $dancestyleArray = json_decode($dancestyleJson, true);

    // Fetch the dance style value from the array
  //  $dancestyle = isset($dancestyleArray[0]) ? $dancestyleArray[0] : null;
@endphp



			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
        <div class="logo">
            <a href="/"><img src="{{ asset('/public/assets/img/ukslogo2.png') }}" alt="Logo" class="img-fluid"></a>
        </div>
	  		<h1><a href="/dashboard" class="logo">Hi, {{ Auth::user()->name }}</a></h1>
       
        <ul class="list-unstyled components mb-5">
    <li class="active">
        <a href="/studentinfo" class="nav-link"><span class="fa fa-home mr-3"></span>Student</a>
    </li>

    <li>
        <a href="#syllabusSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <span class="fa fa-book mr-3"></span>Syllabus
        </a>
        @if($currentExam == 1)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
            <li><a href="/student/prarmbhik">Prarmbhik</a></li>
           
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       @if($currentExam == 2)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
            <li><a href="/student/prarmbhik">Prarmbhik</a></li>
            <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       
         @if($currentExam == 3)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
        <li><a href="/student/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student/praveshika-purna">Praveshika_Purna</a></li>
                                    
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

        @if($currentExam == 4)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
        <li><a href="/student/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student/madhyama-pratham">Madhyama_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

          @if($currentExam == 5)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
        <li><a href="/student/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student/madhyama-pratham">Madhyama_Pratham</a></li>
                                    <li><a href="/student/madhyama-purna">Madhyama_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

          @if($currentExam == 6)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
        <li><a href="/student/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student/madhyama-pratham">Madhyama_Pratham</a></li>
                                     <li><a href="/student/madhyama-purna">Madhyama_Purna</a></li>
                                      <li><a href="/student/visharad-pratham">Visharad_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

          @if($currentExam == 7)
        <ul class="collapse list-unstyled" id="syllabusSubmenu">
        <li><a href="/student/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student/madhyama-pratham">Madhyama_Pratham</a></li>
                                     <li><a href="/student/madhyama-purna">Madhyama_Purna</a></li>
                                      <li><a href="/student/visharad-pratham">Visharad_Pratham</a></li>
                                       <li><a href="/student/visharad-purna">Visharad_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
    </li>
    <li>
                <!--a href="/sources"><span class="fa fa-user mr-3"></span> Resources</a-->

                 <a href="#sourcesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <span class="fa fa-book mr-3 "></span>Resources
    </a>
                       @if($currentExam == 1)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
            <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
           
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       @if($currentExam == 2)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
            <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
            <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       
         @if($currentExam == 3 )
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
        <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-sources/praveshika-purna">Praveshika_Purna</a></li>
                                    
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

        @if($currentExam == 4)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
        <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-sources/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-sources/madhyama-pratham">Madhyama_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
        @if($currentExam == 5)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
        <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-sources/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-sources/madhyama-pratham">Madhyama_Pratham</a></li>
                                     <li><a href="/student-sources/madhyama-purna">Madhyama_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
        @if($currentExam == 6)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
        <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-sources/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-sources/madhyama-pratham">Madhyama_Pratham</a></li>
                                      <li><a href="/student-sources/madhyama-purna">Madhyama_Purna</a></li>
                                        <li><a href="/student-sources/visharad-pratham">Visharad_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
        @if($currentExam == 7)
        <ul class="collapse list-unstyled" id="sourcesSubmenu">
        <li><a href="/student-sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-sources/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-sources/madhyama-pratham">Madhyama_Pratham</a></li>
                                     <li><a href="/student-sources/madhyama-purna">Madhyama_Purna</a></li>
                                        <li><a href="/student-sources/visharad-pratham">Visharad_Pratham</a></li>
                                         <li><a href="/student-sources/visharad-purna">Visharad_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
        </li>
            <li>
                <!--a href="/questionpapers"><span class="fa fa-user mr-3"></span> Sample Question Papers</a-->

               <a href="#questionpaperSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
        <span class="fa fa-book mr-3 "></span>Question Papers
    </a>                @if($currentExam == 1)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
            <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
           
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       @if($currentExam == 2)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
            <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
            <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
       
         @if($currentExam == 3)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
        <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-questions/praveshika-purna">Praveshika_Purna</a></li>
                                    
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

        @if($currentExam == 4)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
        <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-questions/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-questions/madhyama-pratham">Madhyama_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif

         @if($currentExam == 5)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
        <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-questions/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-questions/madhyama-pratham">Madhyama_Pratham</a></li>
                                    <li><a href=/student-questions/madhyama-purna">Madhyama_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
         @if($currentExam == 6)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
        <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-questions/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-questions/madhyama-pratham">Madhyama_Pratham</a></li>
                                    <li><a href="/student-questions/madhyama-purna">Madhyama_Purna</a></li>
                                    <li><a href="/student-questions/visharad-pratham">Visharad_Pratham</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
         @if($currentExam == 7)
        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
        <li><a href="/student-questions/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/student-questions/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/student-questions/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/student-questions/madhyama-pratham">Madhyama_Pratham</a></li>
                                       <li><a href="/student-questions/madhyama-purna">Madhyama_Purna</a></li>
                                    <li><a href="/student-questions/visharad-pratham">Visharad_Pratham</a></li>
                                    <li><a href="/student-questions/visharad-purna">Visharad_Purna</a></li>
            <!-- Add more submenu items as needed -->
        </ul>
        @endif
        </li>
    <li>
        <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
    </li>
    <!-- ... (existing code) ... -->

   
        <!-- <li>
            <a href="#"><span class="fa fa-sticky-note mr-3"></span> Subcription</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Settings</a>
          </li>
          <li>
            <a href="#"><span class="fa fa-paper-plane mr-3"></span> Information</a>
          </li> -->
        </ul>

		

    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        @yield('space-work')
       
       </div>
		</div>
   <script>
        // Assuming 'userStatus' is a variable representing the user's status
        var userStatus = '{{ Auth::check() ? Auth::user()->status : 'Inactive' }}';

        document.addEventListener('DOMContentLoaded', function() {
            // Disable navigation items based on the user's status
            var navItems = document.querySelectorAll('.nav-link');

            navItems.forEach(function(item) {
                if (userStatus !== 'Active') {
                    item.classList.add('disabled');
                    item.removeAttribute('href');
                    item.addEventListener('click', function(event) {
                        event.preventDefault();
                        alert('Your account is not active. Please contact support.');
                    });
                }
            });
        });
    </script>     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{asset('/public/js/popper.js')}}"></script>
    <script src="{{asset('/public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/public/js/main.js')}}"></script>
  </body>
</html>