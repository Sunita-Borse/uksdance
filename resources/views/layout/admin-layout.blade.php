<!DOCTYPE html>
<html lang="en">
<head>
    <title>UKS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
<link rel="icon" type="image/ico" href="{{ asset('/public/favicons/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/public/css/style.css')}}">
  </head>
<body>

<div class="wrapper d-flex align-items-stretch">
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
        <h1><a  href="{{ asset('/public/assets/img/logo2.jpg') }}" class="logo">Admin Dashboard</a></h1>
        <ul class="list-unstyled components mb-5">
            <!-- <li>
                <a href="/admin/dashboard"><span class="fa fa-user mr-3"></span> Dashboard</a>
            </li> -->
            <li class="active">
                <a href="#"><span class="fa fa-home mr-3"></span> Homepage</a>
            </li>
            <li>
                <a href="/admin/add-student"><span class="fa fa-user mr-3"></span> Add Students</a>
            </li>
            <li>
                <a href="/admin/allstudents"><span class="fa fa-user mr-3"></span> All Students</a>
            </li>

            <li>
                  <a href="#syllabusSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                      <span class="fa fa-book mr-3"></span>Syllabus
                  </a>
                        <ul class="collapse list-unstyled" id="syllabusSubmenu">
                        <li>
                          <a href="/admin/syllabus">Add Syllabus</a></li>
                        <li>
                          <a href="/admin/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/admin/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/admin/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/admin/madhyama-pratham">Madhyama_Pratham</a></li>
                                     <li><a href="/admin/madhyama-purna">Madhyama_Purna</a></li>
                                      <li><a href="/admin/visharad-pratham">Visharad_Pratham</a></li>
                                       <li><a href="/admin/visharad-purna">Visharad_Purna</a></li>
                            <!-- Add more submenu items as needed -->
                        </ul>
            </li>
            
            <li>
                <!--a href="/sources"><span class="fa fa-user mr-3"></span> Resources</a-->

                 <a href="#sourcesSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="fa fa-book mr-3"></span>Resources
    </a>
                       <ul class="collapse list-unstyled" id="sourcesSubmenu">
                        <li>
                          <a href="/sources">Add Resources</a></li>
                        <li>
                          <a href="/sources/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/sources/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/sources/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/sources/madhyama-pratham">Madhyama_Pratham</a></li>
                                      <li><a href="/sources/madhyama-purna">Madhyama_Purna</a></li>
                                      <li><a href="/sources/visharad-pratham">Visharad_Pratham</a></li>
                                       <li><a href="/sources/visharad-purna">Visharad_Purna</a></li>
                            <!-- Add more submenu items as needed -->
                        </ul>
            </li>
            <li>
                <!--a href="/questionpapers"><span class="fa fa-user mr-3"></span> Sample Question Papers</a-->

               <a href="#questionpaperSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        <span class="fa fa-book mr-3"></span>Question Papers
    </a>
                        <ul class="collapse list-unstyled" id="questionpaperSubmenu">
                        <li>
                          <a href="/questionpapers">Add Question Papers</a></li>
                        <li>
                          <a href="/questionpapers/prarmbhik">Prarmbhik</a></li>
                                    <li><a href="/questionpapers/praveshika-pratham">Praveshika_Pratham</a></li>
                                    <li><a href="/questionpapers/praveshika-purna">Praveshika_Purna</a></li>
                                    <li><a href="/questionpapers/madhyama-pratham">Madhyama_Pratham</a></li>
                                      <li><a href="/questionpapers/madhyama-purna">Madhyama_Purna</a></li>
                                      <li><a href="/questionpapers/visharad-pratham">Visharad_Pratham</a></li>
                                       <li><a href="/questionpapers/visharad-purna">Visharad_Purna</a></li>
                            <!-- Add more submenu items as needed -->
                        </ul>
            </li>
            <li>
                <a href="/logout"><span class="fa fa-sign-out mr-3"></span> Logout</a>
            </li>
        </ul>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5">
        <!-- Your content goes here -->
        @yield('space-work')
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="{{asset('/public/js/jquery.min.js')}}"></script>
    <script src="{{asset('/public/js/popper.js')}}"></script>
    <script src="{{asset('/public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/public/js/main.js')}}"></script>

</body>
</html>