<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>TnE - @yield('titre')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- 🔐 CSRF TOKEN -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CONSOMMABLES DEBUT --}}
        {{-- SELECT2 --}}
        <link rel="stylesheet" href="{{asset('dependances/templates/consomables/selects/select2.css')}}">
        {{-- FONTAWS --}}
        <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/font-awesome.min.css')}}">

        {{-- <link rel="stylesheet" href="{{asset('dependances/templates/consomables/autres/monstyle.css')}}"> --}}
        {{-- MONSTYLE --}}
        <link rel="stylesheet" href="{{asset('dependances/templates/consomables/autres/monstyle.css')}}">
        <link rel="stylesheet" href="{{asset('dependances/templates/consomables/autres/histopage.css')}}">
        {{-- MON DATA TABLE DEBUT --}}
            <link rel="stylesheet" href="{{asset('dependances/templates/consomables/tables/table.css')}}">
        {{-- MON DATA TABLE FIN --}}
    {{-- CONSOMMABLES FIN --}}
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/font-awesome.min.css')}}">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/owl.transitions.css')}}">


    <link rel="stylesheet" href="{{asset('dependances/templates/admins/admins/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/admins/css/data-table/bootstrap-editable.css')}}">

    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/normalize.css')}}">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/meanmenu.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/main.css')}}">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/morrisjs/morris.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/metisMenu/metisMenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('dependances/templates/admins/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body x-data>

    @yield('header')
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Header menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><a href="index.html"><img src="img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a class="has-arrow" href="index.html">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Paramétrages</span>
								</a>
                            <ul class="submenu-angle" aria-expanded="true">
                                <li><a title="Dashboard v.1" href="{{route('ADM-TP-type')}}"><span class="mini-sub-pro">Type de Paramétre</span></a></li>
                                <li><a title="Dashboard v.2" href="index-1.html"><span class="mini-sub-pro">Dashboard v.2</span></a></li>
                                <li><a title="Dashboard v.3" href="index-2.html"><span class="mini-sub-pro">Dashboard v.3</span></a></li>
                                <li><a title="Analytics" href="analytics.html"><span class="mini-sub-pro">Analytics</span></a></li>
                                <li><a title="Widgets" href="widgets.html"><span class="mini-sub-pro">Widgets</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Landing Page" href="events.html" aria-expanded="false"><span class="educate-icon educate-event icon-wrap sub-icon-mg" aria-hidden="true"></span> <span class="mini-click-non">Event</span></a>
                        </li>
                        <li>
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Access</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="{{route('ADM-PRO-pro')}}"><span class="mini-sub-pro">Profil</span></a></li>
                                <li><a title="Add Professor" href="add-professor.html"><span class="mini-sub-pro">Add Professor</span></a></li>
                                <li><a title="Edit Professor" href="edit-professor.html"><span class="mini-sub-pro">Edit Professor</span></a></li>
                                <li><a title="Professor Profile" href="professor-profile.html"><span class="mini-sub-pro">Professor Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-students.html" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Students</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Students" href="all-students.html"><span class="mini-sub-pro">All Students</span></a></li>
                                <li><a title="Add Students" href="add-student.html"><span class="mini-sub-pro">Add Student</span></a></li>
                                <li><a title="Edit Students" href="edit-student.html"><span class="mini-sub-pro">Edit Student</span></a></li>
                                <li><a title="Students Profile" href="student-profile.html"><span class="mini-sub-pro">Student Profile</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Courses</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Courses" href="all-courses.html"><span class="mini-sub-pro">All Courses</span></a></li>
                                <li><a title="Add Courses" href="add-course.html"><span class="mini-sub-pro">Add Course</span></a></li>
                                <li><a title="Edit Courses" href="edit-course.html"><span class="mini-sub-pro">Edit Course</span></a></li>
                                <li><a title="Courses Profile" href="course-info.html"><span class="mini-sub-pro">Courses Info</span></a></li>
                                <li><a title="course Payment" href="course-payment.html"><span class="mini-sub-pro">Courses Payment</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Library</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Library" href="library-assets.html"><span class="mini-sub-pro">Library Assets</span></a></li>
                                <li><a title="Add Library" href="add-library-assets.html"><span class="mini-sub-pro">Add Library Asset</span></a></li>
                                <li><a title="Edit Library" href="edit-library-assets.html"><span class="mini-sub-pro">Edit Library Asset</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Departments</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Departments List" href="departments.html"><span class="mini-sub-pro">Departments List</span></a></li>
                                <li><a title="Add Departments" href="add-department.html"><span class="mini-sub-pro">Add Departments</span></a></li>
                                <li><a title="Edit Departments" href="edit-department.html"><span class="mini-sub-pro">Edit Departments</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-message icon-wrap"></span> <span class="mini-click-non">Mailbox</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Inbox" href="mailbox.html"><span class="mini-sub-pro">Inbox</span></a></li>
                                <li><a title="View Mail" href="mailbox-view.html"><span class="mini-sub-pro">View Mail</span></a></li>
                                <li><a title="Compose Mail" href="mailbox-compose.html"><span class="mini-sub-pro">Compose Mail</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-interface icon-wrap"></span> <span class="mini-click-non">Interface</span></a>
                            <ul class="submenu-angle interface-mini-nb-dp" aria-expanded="false">
                                <li><a title="Google Map" href="google-map.html"><span class="mini-sub-pro">Google Map</span></a></li>
                                <li><a title="Data Maps" href="data-maps.html"><span class="mini-sub-pro">Data Maps</span></a></li>
                                <li><a title="Pdf Viewer" href="pdf-viewer.html"><span class="mini-sub-pro">Pdf Viewer</span></a></li>
                                <li><a title="X-Editable" href="x-editable.html"><span class="mini-sub-pro">X-Editable</span></a></li>
                                <li><a title="Code Editor" href="code-editor.html"><span class="mini-sub-pro">Code Editor</span></a></li>
                                <li><a title="Tree View" href="tree-view.html"><span class="mini-sub-pro">Tree View</span></a></li>
                                <li><a title="Preloader" href="preloader.html"><span class="mini-sub-pro">Preloader</span></a></li>
                                <li><a title="Images Cropper" href="images-cropper.html"><span class="mini-sub-pro">Images Cropper</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-charts icon-wrap"></span> <span class="mini-click-non">Charts</span></a>
                            <ul class="submenu-angle chart-mini-nb-dp" aria-expanded="false">
                                <li><a title="Bar Charts" href="bar-charts.html"><span class="mini-sub-pro">Bar Charts</span></a></li>
                                <li><a title="Line Charts" href="line-charts.html"><span class="mini-sub-pro">Line Charts</span></a></li>
                                <li><a title="Area Charts" href="area-charts.html"><span class="mini-sub-pro">Area Charts</span></a></li>
                                <li><a title="Rounded Charts" href="rounded-chart.html"><span class="mini-sub-pro">Rounded Charts</span></a></li>
                                <li><a title="C3 Charts" href="c3.html"><span class="mini-sub-pro">C3 Charts</span></a></li>
                                <li><a title="Sparkline Charts" href="sparkline.html"><span class="mini-sub-pro">Sparkline Charts</span></a></li>
                                <li><a title="Peity Charts" href="peity.html"><span class="mini-sub-pro">Peity Charts</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-data-table icon-wrap"></span> <span class="mini-click-non">Data Tables</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Peity Charts" href="static-table.html"><span class="mini-sub-pro">Static Table</span></a></li>
                                <li><a title="Data Table" href="data-table.html"><span class="mini-sub-pro">Data Table</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-form icon-wrap"></span> <span class="mini-click-non">Forms Elements</span></a>
                            <ul class="submenu-angle form-mini-nb-dp" aria-expanded="false">
                                <li><a title="Basic Form Elements" href="basic-form-element.html"><span class="mini-sub-pro">Bc Form Elements</span></a></li>
                                <li><a title="Advance Form Elements" href="advance-form-element.html"><span class="mini-sub-pro">Ad Form Elements</span></a></li>
                                <li><a title="Password Meter" href="password-meter.html"><span class="mini-sub-pro">Password Meter</span></a></li>
                                <li><a title="Multi Upload" href="multi-upload.html"><span class="mini-sub-pro">Multi Upload</span></a></li>
                                <li><a title="Text Editor" href="tinymc.html"><span class="mini-sub-pro">Text Editor</span></a></li>
                                <li><a title="Dual List Box" href="dual-list-box.html"><span class="mini-sub-pro">Dual List Box</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="has-arrow" href="mailbox.html" aria-expanded="false"><span class="educate-icon educate-apps icon-wrap"></span> <span class="mini-click-non">App views</span></a>
                            <ul class="submenu-angle app-mini-nb-dp" aria-expanded="false">
                                <li><a title="Notifications" href="notifications.html"><span class="mini-sub-pro">Notifications</span></a></li>
                                <li><a title="Alerts" href="alerts.html"><span class="mini-sub-pro">Alerts</span></a></li>
                                <li><a title="Modals" href="modals.html"><span class="mini-sub-pro">Modals</span></a></li>
                                <li><a title="Buttons" href="buttons.html"><span class="mini-sub-pro">Buttons</span></a></li>
                                <li><a title="Tabs" href="tabs.html"><span class="mini-sub-pro">Tabs</span></a></li>
                                <li><a title="Accordion" href="accordion.html"><span class="mini-sub-pro">Accordion</span></a></li>
                            </ul>
                        </li>
                        <li id="removable">
                            <a class="has-arrow" href="#" aria-expanded="false"><span class="educate-icon educate-pages icon-wrap"></span> <span class="mini-click-non">Corbeilles</span></a>
                            <ul class="submenu-angle page-mini-nb-dp" aria-expanded="false">
                                <li><a title="Login" href="{{route('ADM-CRB-CBL')}}"><span class="mini-sub-pro">Corbeille</span></a></li>
                                {{-- <li><a title="Register" href="register.html"><span class="mini-sub-pro">Register</span></a></li>
                                <li><a title="Lock" href="lock.html"><span class="mini-sub-pro">Lock</span></a></li>
                                <li><a title="Password Recovery" href="password-recovery.html"><span class="mini-sub-pro">Password Recovery</span></a></li>
                                <li><a title="404 Page" href="404.html"><span class="mini-sub-pro">404 Page</span></a></li>
                                <li><a title="500 Page" href="500.html"><span class="mini-sub-pro">500 Page</span></a></li> --}}
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Header menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper contenu-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="{{asset('dependances/templates/admins/img/logo/logo.png')}}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contenu-header">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
													<i class="educate-icon educate-nav"></i>
												</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="#" class="nav-link">Home</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">About</a>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Services</a>
                                                </li>
                                                <li class="nav-item dropdown res-dis-nn">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">Project <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
                                                    <div role="menu" class="dropdown-menu animated zoomIn">
                                                        <a href="#" class="dropdown-item">Documentation</a>
                                                        <a href="#" class="dropdown-item">Expert Backend</a>
                                                        <a href="#" class="dropdown-item">Expert FrontEnd</a>
                                                        <a href="#" class="dropdown-item">Contact Support</a>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" class="nav-link">Support</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-message edu-chat-pro" aria-hidden="true"></i><span class="indicator-ms"></span></a>
                                                    <div role="menu" class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Message</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-bell" aria-hidden="true"></i><span class="indicator-nt"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow" aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="img/product/pro4.jpg" alt="" />
															<span class="admin-name">Prof.Anderson</span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="#"><span class="edu-icon edu-home-admin author-log-ic"></span>My Account</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-user-rounded author-log-ic"></span>My Profile</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-money author-log-ic"></span>User Billing</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-settings author-log-ic"></span>Settings</a>
                                                        </li>
                                                        <li><a href="#"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item nav-setting-open"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="educate-icon educate-menu"></i></a>

                                                    <div role="menu" class="admintab-wrap menu-setting-wrap menu-setting-wrap-bg dropdown-menu animated zoomIn">
                                                        <ul class="nav nav-tabs custon-set-tab">
                                                            <li class="active"><a data-toggle="tab" href="#Notes">Notes</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Projects">Projects</a>
                                                            </li>
                                                            <li><a data-toggle="tab" href="#Settings">Settings</a>
                                                            </li>
                                                        </ul>

                                                        <div class="tab-content custom-bdr-nt">
                                                            <div id="Notes" class="tab-pane fade in active">
                                                                <div class="notes-area-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-comments-o"></i> Latest Notes</h2>
                                                                        <p>You have 10 new message.</p>
                                                                    </div>
                                                                    <div class="notes-list-area notes-menu-scrollbar">
                                                                        <ul class="notes-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/4.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/1.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/2.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="notes-list-flow">
                                                                                        <div class="notes-img">
                                                                                            <img src="img/contact/3.jpg" alt="" />
                                                                                        </div>
                                                                                        <div class="notes-content">
                                                                                            <p> The point of using Lorem Ipsum is that it has a more-or-less normal.</p>
                                                                                            <span>Yesterday 2:45 pm</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Projects" class="tab-pane fade">
                                                                <div class="projects-settings-wrap">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-cube"></i> Latest projects</h2>
                                                                        <p> You have 20 projects. 5 not completed.</p>
                                                                    </div>
                                                                    <div class="project-st-list-area project-st-menu-scrollbar">
                                                                        <ul class="projects-st-menu-list">
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Web Development</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">1 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-1"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Software Development</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">2 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 68%;" class="progress-bar hd-tp-2"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Graphic Design</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">3 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 78%;" class="progress-bar hd-tp-3"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Web Design</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">4 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 38%;" class="progress-bar progress-bar-danger hd-tp-4"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Business Card</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">5 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 28%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 28%;" class="progress-bar progress-bar-danger hd-tp-5"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Ecommerce Business</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">6 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl">
                                                                                            <p>Completion with: 68%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 68%;" class="progress-bar hd-tp-6"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Woocommerce Plugin</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">7 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content">
                                                                                            <p>Completion with: 78%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 78%;" class="progress-bar"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#">
                                                                                    <div class="project-list-flow">
                                                                                        <div class="projects-st-heading">
                                                                                            <h2>Wordpress Theme</h2>
                                                                                            <p> The point of using Lorem Ipsum is that it has a more or less normal.</p>
                                                                                            <span class="project-st-time">9 hours ago</span>
                                                                                        </div>
                                                                                        <div class="projects-st-content project-rating-cl2">
                                                                                            <p>Completion with: 38%</p>
                                                                                            <div class="progress progress-mini">
                                                                                                <div style="width: 38%;" class="progress-bar progress-bar-danger"></div>
                                                                                            </div>
                                                                                            <p>Project end: 4:00 pm - 12.06.2014</p>
                                                                                        </div>
                                                                                    </div>
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="Settings" class="tab-pane fade">
                                                                <div class="setting-panel-area">
                                                                    <div class="note-heading-indicate">
                                                                        <h2><i class="fa fa-gears"></i> Settings Panel</h2>
                                                                        <p> You have 20 Settings. 5 not completed.</p>
                                                                    </div>
                                                                    <ul class="setting-panel-list">
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show notifications</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example">
                                                                                            <label class="onoffswitch-label" for="example">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Disable Chat</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example3">
                                                                                            <label class="onoffswitch-label" for="example3">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Enable history</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example4">
                                                                                            <label class="onoffswitch-label" for="example4">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Show charts</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="example7">
                                                                                            <label class="onoffswitch-label" for="example7">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Update everyday</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example2">
                                                                                            <label class="onoffswitch-label" for="example2">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Global search</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example6">
                                                                                            <label class="onoffswitch-label" for="example6">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2>Offline users</h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="collapsemenu" checked="" class="onoffswitch-checkbox" id="example5">
                                                                                            <label class="onoffswitch-label" for="example5">
																									<span class="onoffswitch-inner"></span>
																									<span class="onoffswitch-switch"></span>
																								</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                    </ul>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                <li><a href="index-3.html">Dashboard v.3</a></li>
                                                <li><a href="analytics.html">Analytics</a></li>
                                                <li><a href="widgets.html">Widgets</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="events.html">Event</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Professors <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="all-professors.html">All Professors</a>
                                                </li>
                                                <li><a href="add-professor.html">Add Professor</a>
                                                </li>
                                                <li><a href="edit-professor.html">Edit Professor</a>
                                                </li>
                                                <li><a href="professor-profile.html">Professor Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demopro" href="#">Students <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demopro" class="collapse dropdown-header-top">
                                                <li><a href="all-students.html">All Students</a>
                                                </li>
                                                <li><a href="add-student.html">Add Student</a>
                                                </li>
                                                <li><a href="edit-student.html">Edit Student</a>
                                                </li>
                                                <li><a href="student-profile.html">Student Profile</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#democrou" href="#">Courses <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="democrou" class="collapse dropdown-header-top">
                                                <li><a href="all-courses.html">All Courses</a>
                                                </li>
                                                <li><a href="add-course.html">Add Course</a>
                                                </li>
                                                <li><a href="edit-course.html">Edit Course</a>
                                                </li>
                                                <li><a href="course-profile.html">Courses Info</a>
                                                </li>
                                                <li><a href="course-payment.html">Courses Payment</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demolibra" href="#">Library <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demolibra" class="collapse dropdown-header-top">
                                                <li><a href="library-assets.html">Library Assets</a>
                                                </li>
                                                <li><a href="add-library-assets.html">Add Library Asset</a>
                                                </li>
                                                <li><a href="edit-library-assets.html">Edit Library Asset</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demodepart" href="#">Departments <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demodepart" class="collapse dropdown-header-top">
                                                <li><a href="departments.html">Departments List</a>
                                                </li>
                                                <li><a href="add-department.html">Add Departments</a>
                                                </li>
                                                <li><a href="edit-department.html">Edit Departments</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="mailbox.html">Inbox</a>
                                                </li>
                                                <li><a href="mailbox-view.html">View Mail</a>
                                                </li>
                                                <li><a href="mailbox-compose.html">Compose Mail</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Interface <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="google-map.html">Google Map</a>
                                                </li>
                                                <li><a href="data-maps.html">Data Maps</a>
                                                </li>
                                                <li><a href="pdf-viewer.html">Pdf Viewer</a>
                                                </li>
                                                <li><a href="x-editable.html">X-Editable</a>
                                                </li>
                                                <li><a href="code-editor.html">Code Editor</a>
                                                </li>
                                                <li><a href="tree-view.html">Tree View</a>
                                                </li>
                                                <li><a href="preloader.html">Preloader</a>
                                                </li>
                                                <li><a href="images-cropper.html">Images Cropper</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Charts <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="bar-charts.html">Bar Charts</a>
                                                </li>
                                                <li><a href="line-charts.html">Line Charts</a>
                                                </li>
                                                <li><a href="area-charts.html">Area Charts</a>
                                                </li>
                                                <li><a href="rounded-chart.html">Rounded Charts</a>
                                                </li>
                                                <li><a href="c3.html">C3 Charts</a>
                                                </li>
                                                <li><a href="sparkline.html">Sparkline Charts</a>
                                                </li>
                                                <li><a href="peity.html">Peity Charts</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob" href="#">Tables <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="static-table.html">Static Table</a>
                                                </li>
                                                <li><a href="data-table.html">Data Table</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#formsmob" href="#">Forms <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="formsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Appviewsmob" href="#">App views <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Appviewsmob" class="collapse dropdown-header-top">
                                                <li><a href="basic-form-element.html">Basic Form Elements</a>
                                                </li>
                                                <li><a href="advance-form-element.html">Advanced Form Elements</a>
                                                </li>
                                                <li><a href="password-meter.html">Password Meter</a>
                                                </li>
                                                <li><a href="multi-upload.html">Multi Upload</a>
                                                </li>
                                                <li><a href="tinymc.html">Text Editor</a>
                                                </li>
                                                <li><a href="dual-list-box.html">Dual List Box</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Pages <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="login.html">Login</a>
                                                </li>
                                                <li><a href="register.html">Register</a>
                                                </li>
                                                <li><a href="lock.html">Lock</a>
                                                </li>
                                                <li><a href="password-recovery.html">Password Recovery</a>
                                                </li>
                                                <li><a href="404.html">404 Page</a></li>
                                                <li><a href="500.html">500 Page</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
            {{-- <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1ç</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
           <div class="futureBreadWrapper">

    <div class="futureBreadCard">

        <div class="futureBreadContent">

            {{-- LEFT --}}
            <div class="futureBreadLeft">

                {{-- BREADCRUMB --}}
                <ul class="futureBreadList">

                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>

                    <li class="futureBreadSeparator">
                        /
                    </li>

                    <li>
                        <a href="#">
                            Dashboard
                        </a>
                    </li>

                    <li class="futureBreadSeparator">
                        /
                    </li>

                    <li class="active">

                        <span>
                            Type de paramètre
                        </span>

                    </li>

                </ul>

            </div>



            {{-- RIGHT --}}
            <div class="futureBreadRight">

                {{-- SEARCH --}}
                <div class="futureBreadSearch">

                    <i class="fa fa-search"></i>

                    <input
                        type="text"
                        placeholder="Rechercher..."
                    >

                </div>

            </div>

        </div>

    </div>

</div>
<style>
    /* =========================================
FUTURE BREAD PREMIUM CSS
========================================= */



/* =========================================
WRAPPER
========================================= */

.futureBreadWrapper{

    width:100%;

    padding:20px;

    margin-bottom:25px;

}



/* =========================================
CARD
========================================= */

.futureBreadCard{

    position:relative;

    background:
        var(--future-bg);

    backdrop-filter:
        blur(18px);

    border:
        1px solid var(--future-border);

    border-radius:
        28px;

    overflow:hidden;

    box-shadow:
        var(--future-shadow);

}



/* =========================================
CONTENT
========================================= */

.futureBreadContent{

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:20px;

    padding:22px 25px;

}



/* =========================================
LEFT
========================================= */

.futureBreadLeft{

    display:flex;

    align-items:center;

    gap:15px;

}



/* =========================================
RIGHT
========================================= */

.futureBreadRight{

    display:flex;

    align-items:center;

    justify-content:flex-end;

    margin-left:auto;

}



/* =========================================
SEARCH
========================================= */

.futureBreadSearch{

    position:relative;

    width:320px;

    margin-left:auto;

}



/* ICON */

.futureBreadSearch i{

    position:absolute;

    top:50%;

    left:16px;

    transform:translateY(-50%);

    color:
        rgba(255,255,255,.65);

}



/* INPUT */

.futureBreadSearch input{

    width:100%;

    height:48px;

    border:none;

    outline:none;

    border-radius:14px;

    padding:
        0 18px 0 45px;

    background:
        rgba(255,255,255,.05);

    border:
        1px solid var(--future-border);

    color:#ffffff;

    transition:.25s;

}



/* PLACEHOLDER */

.futureBreadSearch input::placeholder{

    color:
        rgba(255,255,255,.55);

}



/* FOCUS */

.futureBreadSearch input:focus{

    border-color:
        var(--future-primary);

    box-shadow:
        0 0 20px rgba(0,229,255,.15);

}



/* =========================================
BREAD LIST
========================================= */

.futureBreadList{

    display:flex;

    align-items:center;

    gap:12px;

    margin:0;

    padding:0;

    list-style:none;

    flex-wrap:wrap;

}



/* =========================================
ITEMS
========================================= */

.futureBreadList li{

    display:flex;

    align-items:center;

    font-size:14px;

}



/* =========================================
LINKS
========================================= */

.futureBreadList li a{

    color:
        rgba(255,255,255,.75);

    text-decoration:none;

    transition:.25s;

    font-weight:500;

}



/* HOVER */

.futureBreadList li a:hover{

    color:
        var(--future-primary);

}



/* =========================================
ACTIVE
========================================= */

.futureBreadList li.active span{

    color:#ffffff;

    font-weight:700;

}



/* =========================================
SEPARATOR
========================================= */

.futureBreadSeparator{

    color:
        rgba(255,255,255,.35);

}



/* =========================================
OPTIONAL TAG / CHIP
========================================= */

.futureBreadTag{

    padding:
        6px 12px;

    border-radius:
        999px;

    background:
        rgba(255,255,255,.06);

    border:
        1px solid rgba(255,255,255,.08);

    color:#ffffff;

    font-size:12px;

    font-weight:600;

}



/* =========================================
OPTIONAL ACTIONS
========================================= */

.futureBreadActions{

    display:flex;

    align-items:center;

    gap:10px;

}



/* =========================================
OPTIONAL MINI BUTTON
========================================= */

.futureBreadMiniBtn{

    width:42px;

    height:42px;

    border:none;

    border-radius:14px;

    display:flex;

    align-items:center;

    justify-content:center;

    background:
        rgba(255,255,255,.05);

    border:
        1px solid rgba(255,255,255,.08);

    color:#ffffff;

    cursor:pointer;

    transition:.25s;

}



/* HOVER */

.futureBreadMiniBtn:hover{

    transform:
        translateY(-2px);

    background:
        rgba(255,255,255,.08);

}



/* =========================================
RESPONSIVE
========================================= */

@media(max-width:992px){

    .futureBreadContent{

        flex-direction:column;

        align-items:stretch;

    }



    .futureBreadLeft,
    .futureBreadRight{

        width:100%;

    }



    .futureBreadRight{

        justify-content:flex-start;

        margin-left:0;

    }



    .futureBreadSearch{

        width:100%;

    }

}



/* =========================================
MOBILE
========================================= */

@media(max-width:576px){

    .futureBreadWrapper{

        padding:10px;

    }



    .futureBreadCard{

        border-radius:20px;

    }



    .futureBreadContent{

        padding:18px;

    }



    .futureBreadList{

        gap:8px;

    }



    .futureBreadSearch input{

        height:45px;

    }

}
</style>
        </div>



        @yield('corps')

        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jquery
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/wow.min.js')}}"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/metisMenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/morrisjs/raphael-min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/morrisjs/morris.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/morrisjs/morris-active.js')}}"></script>
    <!-- morrisjs JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/sparkline/jquery.charts-sparkline.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/sparkline/sparkline-active.js')}}"></script>
    <!-- calendar JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/calendar/fullcalendar-active.js')}}"></script>
    <!-- plugins JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/plugins.js')}}"></script>
    <!-- main JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/main.js')}}"></script>
    <!-- tawk chat JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/tawk-chat.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>






 {{-- DATA TABLE DEBUT --}}
        <script src="{{asset('dependances/templates/admins/js/data-table/bootstrap-table.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/tableExport.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/data-table-active.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/bootstrap-table-editable.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/bootstrap-editable.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/bootstrap-table-resizable.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/colResizable-1.5.source.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/data-table/bootstrap-table-export.js')}}"></script>
    {{-- DATA TABLE FIN --}}
     <!-- select2 JS
		============================================ -->
        <script src="{{asset('dependances/templates/admins/js/select2/select2.full.min.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/select2/select2-active.js')}}"></script>
         <!-- chosen JS
		============================================ -->
    <script src="{{asset('dependances/templates/admins/js/chosen/chosen.jquery.js')}}"></script>
    <script src="{{asset('dependances/templates/admins/js/chosen/chosen-active.js')}}"></script>

    <!-- summernote JS
		============================================ -->
        <script src="{{asset('dependances/templates/admins/js/summernote/summernote.min.js')}}"></script>
        <script src="{{asset('dependances/templates/admins/js/summernote/summernote-active.js')}}"></script>
        {{-- CONSOMMABLES DEBUT --}}

            {{-- ALPINE --}}
            <script src="{{asset('dependances/templates/consomables/alpines/alpine.js')}}"></script>
            {{-- SELECT --}}
            <script src="{{asset('dependances/templates/consomables/selects/select2.js')}}"></script>
            <script src="{{asset('dependances/templates/consomables/selects/script.js')}}"></script>
            {{-- POPPS --}}
            <script src="{{asset('dependances/templates/consomables/popps/pop.js')}}"></script>
            {{-- JQUERRY --}}
            <script src="{{asset('dependances/templates/consomables/jquerys/jq.js')}}"></script>
            {{-- GSAP --}}
            <script src="{{asset('dependances/templates/consomables/gsaps/gsap.js')}}"></script>
           {{-- MON DATA TABLE DEBUT --}}

{{-- XLSX --}}
<script src="{{asset('dependances/templates/consomables/tables/xlsx.js')}}"></script>

{{-- PDF --}}
<script src="{{asset('dependances/templates/consomables/tables/pdf.js')}}"></script>

{{-- AUTO --}}
<script src="{{asset('dependances/templates/consomables/tables/auto.js')}}"></script>

{{-- TABLE --}}
<script src="{{asset('dependances/templates/consomables/tables/table.js')}}"></script>

<script>

    /* =========================================
    FUTURE TABLE ENGINE V6
    RESPONSIVE + MOBILE SYNC + EXPORT FIX
    ========================================= */

    class FutureTable {

        constructor(config = {}) {

            /* =========================================
            CONFIG
            ========================================= */

            this.tableSelector =
                config.table || ".futureTable";

            this.searchSelector =
                config.search || "#futureSearch";

            this.paginationSelector =
                config.pagination || "#pagination";

            this.perPageSelector =
                config.perPage || "#rowsPerPage";

            this.selectAllSelector =
                config.selectAll || "#selectAll";



            /* =========================================
            ELEMENTS
            ========================================= */

            this.table =
                document.querySelector(
                    this.tableSelector
                );

            if(!this.table) return;



            this.tbody =
                this.table.querySelector("tbody");

            this.headers =
                Array.from(
                    this.table.querySelectorAll("thead th")
                );

            this.rows =
                Array.from(
                    this.table.querySelectorAll(
                        "tbody tr.futureRow"
                    )
                );



            this.mobileCards =
                Array.from(
                    document.querySelectorAll(
                        ".futureMobileCard"
                    )
                );



            this.searchInput =
                document.querySelector(
                    this.searchSelector
                );

            this.pagination =
                document.querySelector(
                    this.paginationSelector
                );

            this.rowsPerPage =
                document.querySelector(
                    this.perPageSelector
                );

            this.selectAll =
                document.querySelector(
                    this.selectAllSelector
                );



            /*
            EXPORT BUTTONS
            */

            this.exportExcelBtn =
                document.getElementById(
                    "exportExcel"
                );

            this.exportPDFBtn =
                document.getElementById(
                    "exportPDF"
                );

            this.exportXMLBtn =
                document.getElementById(
                    "exportXML"
                );

            this.exportCSVBtn =
                document.getElementById(
                    "exportCSV"
                );



            /*
            BULK EXPORT
            */

            this.bulkExportSelect =
                document.getElementById(
                    "bulkExportSelect"
                );



            /*
            FILTER
            */

            this.filterBtn =
                document.getElementById(
                    "futureFilterBtn"
                );



            /* =========================================
            STATE
            ========================================= */

            this.currentPage = 1;

            this.perPage = 10;

            this.sortColumn = null;

            this.sortDirection = "asc";

            this.activeFilter = "all";



            /* =========================================
            INIT
            ========================================= */

            this.init();

        }



        /* =========================================
        INIT
        ========================================= */

        init() {

            this.search();

            this.paginationSystem();

            this.selectSystem();

            this.mobileCheckboxSync();

            this.sortSystem();

            this.filterSystem();

            this.bulkExportSystem();

            this.exportExcel();

            this.exportPDF();

            this.exportXML();

            this.exportCSV();

            this.renderTable();

            this.gsapAnimations();

        }



        /* =========================================
        SEARCH
        ========================================= */

        search() {

            if(!this.searchInput) return;

            this.searchInput.addEventListener(
                "keyup",
                () => {

                    this.currentPage = 1;

                    this.renderTable();

                }
            );

        }



        /* =========================================
        PAGINATION
        ========================================= */

        paginationSystem() {

            if(!this.rowsPerPage) return;

            this.rowsPerPage.addEventListener(
                "change",
                () => {

                    this.perPage =
                        this.rowsPerPage.value === "all"
                        ? "all"
                        : parseInt(
                            this.rowsPerPage.value
                        );

                    this.currentPage = 1;

                    this.renderTable();

                }
            );

        }



        /* =========================================
        FILTER SYSTEM
        ========================================= */

        filterSystem() {

            if(!this.filterBtn) return;

            this.filterBtn.addEventListener(
                "click",
                () => {

                    this.activeFilter =
                        this.activeFilter === "all"
                        ? "withDescription"
                        : "all";

                    this.filterBtn.classList.toggle(
                        "active"
                    );

                    this.currentPage = 1;

                    this.renderTable();

                }
            );

        }



        /* =========================================
        GET FILTERED ROWS
        ========================================= */

        getFilteredRows() {

            let searchValue =
                this.searchInput
                ? this.searchInput.value
                    .toLowerCase()
                    .trim()
                : "";



            return this.rows.filter(row => {

                /*
                SEARCH
                */

                let text =
                    row.innerText.toLowerCase();

                let matchSearch =
                    text.includes(searchValue);



                /*
                FILTER
                */

                let matchFilter = true;

                if(
                    this.activeFilter ===
                    "withDescription"
                ){

                    let description =
                        row.children[4]
                        ?.innerText
                        .trim()
                        .toLowerCase();

                    matchFilter =
                        description &&
                        description !==
                        "aucune observation";

                }



                return (
                    matchSearch &&
                    matchFilter
                );

            });

        }



        /* =========================================
        RENDER TABLE
        ========================================= */

        renderTable() {

            let filteredRows =
                this.getFilteredRows();



            /*
            RESET TABLE ROWS
            */

            this.rows.forEach(row => {

                row.style.display = "none";

                row.style.opacity = "1";

                row.style.transform =
                    "translateY(0px)";

            });



            /*
            RESET MOBILE CARDS
            */

            this.mobileCards.forEach(card => {

                card.style.display = "none";

            });



            let visibleRows = [];



            /*
            PAGINATION
            */

            if(this.perPage === "all"){

                visibleRows = filteredRows;

            }

            else{

                let start =
                    (this.currentPage - 1)
                    * this.perPage;

                let end =
                    start + this.perPage;

                visibleRows =
                    filteredRows.slice(start, end);

            }



            /*
            SHOW ROWS
            */

            visibleRows.forEach(row => {

                row.style.display = "";



                /*
                MOBILE CARD SYNC
                */

                let rowId =
                    row.dataset.row;

                let mobileCard =
                    document.querySelector(
                        `.futureMobileCard[data-row="${rowId}"]`
                    );

                if(mobileCard){

                    mobileCard.style.display =
                        "block";

                }

            });



            /*
            GSAP
            */

            gsap.killTweensOf(
                visibleRows
            );

            gsap.fromTo(

                visibleRows,

                {
                    opacity:0,
                    y:15
                },

                {
                    opacity:1,
                    y:0,
                    stagger:.03,
                    duration:.35,
                    ease:"power2.out",
                    clearProps:"all"
                }

            );



            this.renderPagination(
                filteredRows.length
            );

        }



        /* =========================================
        PAGINATION BUTTONS
        ========================================= */

        renderPagination(totalRows) {

            if(!this.pagination) return;

            this.pagination.innerHTML = "";



            if(this.perPage === "all") return;



            let totalPages =
                Math.ceil(
                    totalRows / this.perPage
                );



            /*
            PREVIOUS
            */

            if(this.currentPage > 1){

                let prevBtn =
                    document.createElement(
                        "button"
                    );

                prevBtn.classList.add(
                    "futurePageBtn"
                );

                prevBtn.innerHTML =
                    '<i class="fa fa-angle-left"></i>';



                prevBtn.addEventListener(
                    "click",
                    () => {

                        this.currentPage--;

                        this.renderTable();

                    }
                );



                this.pagination.appendChild(
                    prevBtn
                );

            }



            /*
            PAGES
            */

            for(
                let i = 1;
                i <= totalPages;
                i++
            ){

                let btn =
                    document.createElement(
                        "button"
                    );

                btn.classList.add(
                    "futurePageBtn"
                );



                if(i === this.currentPage){

                    btn.classList.add(
                        "active"
                    );

                }



                btn.innerText = i;



                btn.addEventListener(
                    "click",
                    () => {

                        this.currentPage = i;

                        this.renderTable();

                    }
                );



                this.pagination.appendChild(
                    btn
                );

            }



            /*
            NEXT
            */

            if(
                this.currentPage <
                totalPages
            ){

                let nextBtn =
                    document.createElement(
                        "button"
                    );

                nextBtn.classList.add(
                    "futurePageBtn"
                );

                nextBtn.innerHTML =
                    '<i class="fa fa-angle-right"></i>';



                nextBtn.addEventListener(
                    "click",
                    () => {

                        this.currentPage++;

                        this.renderTable();

                    }
                );



                this.pagination.appendChild(
                    nextBtn
                );

            }

        }



        /* =========================================
        SELECT SYSTEM
        ========================================= */

        selectSystem() {

            if(!this.selectAll) return;



            this.selectAll.addEventListener(
                "change",
                () => {

                    let desktopCheckboxes =
                        this.table.querySelectorAll(
                            ".rowCheckbox"
                        );

                    let mobileCheckboxes =
                        document.querySelectorAll(
                            ".futureMobileCheckbox"
                        );



                    desktopCheckboxes.forEach(
                        checkbox => {

                            checkbox.checked =
                                this.selectAll.checked;

                        }
                    );



                    mobileCheckboxes.forEach(
                        checkbox => {

                            checkbox.checked =
                                this.selectAll.checked;

                        }
                    );

                }
            );

        }



        /* =========================================
        MOBILE CHECKBOX SYNC
        ========================================= */

        mobileCheckboxSync() {

            /*
            MOBILE -> DESKTOP
            */

            document
            .querySelectorAll(
                ".futureMobileCheckbox"
            )
            .forEach(mobileCheckbox => {

                mobileCheckbox
                .addEventListener(
                    "change",
                    () => {

                        let rowId =
                            mobileCheckbox
                            .dataset
                            .row;

                        let desktopCheckbox =
                            document.querySelector(
                                `.rowCheckbox[data-row="${rowId}"]`
                            );

                        if(desktopCheckbox){

                            desktopCheckbox.checked =
                                mobileCheckbox.checked;

                        }

                    }
                );

            });



            /*
            DESKTOP -> MOBILE
            */

            document
            .querySelectorAll(
                ".rowCheckbox"
            )
            .forEach(desktopCheckbox => {

                desktopCheckbox
                .addEventListener(
                    "change",
                    () => {

                        let rowId =
                            desktopCheckbox
                            .dataset
                            .row;

                        let mobileCheckbox =
                            document.querySelector(
                                `.futureMobileCheckbox[data-row="${rowId}"]`
                            );

                        if(mobileCheckbox){

                            mobileCheckbox.checked =
                                desktopCheckbox.checked;

                        }

                    }
                );

            });

        }



        /* =========================================
        SORT SYSTEM
        ========================================= */

        sortSystem() {

            this.headers.forEach(
                (header, index) => {

                    if(
                        header.dataset.sort
                        === "false"
                    ) return;



                    header.style.cursor =
                        "pointer";



                    if(
                        !header.querySelector(
                            ".futureSortIcon"
                        )
                    ){

                        header.innerHTML += `
                            <i class="fa fa-sort futureSortIcon ms-2"></i>
                        `;

                    }



                    header.addEventListener(
                        "click",
                        () => {

                            this.headers
                            .forEach(h => {

                                let icon =
                                    h.querySelector(
                                        ".futureSortIcon"
                                    );

                                if(icon){

                                    icon.className =
                                        "fa fa-sort futureSortIcon ms-2";

                                }

                            });



                            this.sortDirection =
                                this.sortColumn
                                === index
                                &&
                                this.sortDirection
                                === "asc"
                                ? "desc"
                                : "asc";



                            this.sortColumn =
                                index;



                            let currentIcon =
                                header.querySelector(
                                    ".futureSortIcon"
                                );



                            if(currentIcon){

                                currentIcon.className =
                                    this.sortDirection
                                    === "asc"
                                    ? "fa fa-sort-up futureSortIcon ms-2"
                                    : "fa fa-sort-down futureSortIcon ms-2";

                            }



                            this.rows.sort(
                                (a, b) => {

                                    let aText =
                                        a.children[index]
                                        ?.innerText
                                        .trim()
                                        .toLowerCase();

                                    let bText =
                                        b.children[index]
                                        ?.innerText
                                        .trim()
                                        .toLowerCase();



                                    let aNum =
                                        parseFloat(
                                            aText
                                        );

                                    let bNum =
                                        parseFloat(
                                            bText
                                        );



                                    if(
                                        !isNaN(aNum)
                                        &&
                                        !isNaN(bNum)
                                    ){

                                        return this
                                        .sortDirection
                                        === "asc"
                                            ? aNum - bNum
                                            : bNum - aNum;

                                    }



                                    return this
                                    .sortDirection
                                    === "asc"
                                        ? aText.localeCompare(
                                            bText
                                        )
                                        : bText.localeCompare(
                                            aText
                                        );

                                }
                            );



                            this.rows.forEach(
                                row => {

                                    this.tbody.appendChild(
                                        row
                                    );

                                }
                            );



                            this.renderTable();

                        }
                    );

                }
            );

        }



        /* =========================================
        GET SELECTED ROWS
        ========================================= */

        getSelectedRows() {

            return this.rows.filter(
                row => {

                    let checkbox =
                        row.querySelector(
                            ".rowCheckbox"
                        );

                    return checkbox?.checked;

                }
            );

        }



        /* =========================================
        BULK EXPORT
        ========================================= */

        bulkExportSystem() {

            if(!this.bulkExportSelect)
            return;



            this.bulkExportSelect
            .addEventListener(
                "change",
                e => {

                    let type =
                        e.target.value;

                    if(!type) return;



                    let selectedRows =
                        this.getSelectedRows();



                    if(
                        selectedRows.length <= 0
                    ){

                        alert(
                            "Veuillez sélectionner au moins une ligne."
                        );

                        e.target.value = "";

                        return;

                    }



                    switch(type){

                        case "excel":

                            this.exportSelectedExcel(
                                selectedRows
                            );

                        break;



                        case "csv":

                            this.exportSelectedCSV(
                                selectedRows
                            );

                        break;



                        case "xml":

                            this.exportSelectedXML(
                                selectedRows
                            );

                        break;



                        case "pdf":

                            this.exportSelectedPDF(
                                selectedRows
                            );

                        break;

                    }



                    e.target.value = "";

                }
            );

        }



        /* =========================================
        EXPORT SELECTED EXCEL
        ========================================= */

        exportSelectedExcel(rows) {

            let table =
                this.generateExportTable(
                    rows
                );

            let wb =
                XLSX.utils.table_to_book(
                    table
                );

            XLSX.writeFile(
                wb,
                "selection.xlsx"
            );

        }



        /* =========================================
        EXPORT SELECTED PDF
        ========================================= */

        exportSelectedPDF(rows) {

            const { jsPDF } =
                window.jspdf;

            let doc =
                new jsPDF();

            let table =
                this.generateExportTable(
                    rows
                );

            doc.autoTable({

                html:table,

                theme:"grid",

                styles:{
                    fontSize:9
                }

            });

            doc.save(
                "selection.pdf"
            );

        }



        /* =========================================
        EXPORT SELECTED XML
        ========================================= */

        exportSelectedXML(rows) {

            let xml =
            `<?xml version="1.0" encoding="UTF-8"?>
            <data>\n`;



            let exportableHeaders =
                this.headers.filter(
                    header =>
                    header.dataset.export
                    !== "false"
                );



            rows.forEach(row => {

                xml += `    <row>\n`;



                exportableHeaders.forEach(
                    header => {

                        let index =
                            this.headers.indexOf(
                                header
                            );

                        let cell =
                            row.children[index];

                        let tag =
                            header.innerText
                            .trim()
                            .toLowerCase()
                            .replace(
                                /\s+/g,
                                "_"
                            );



                        xml += `
<${tag}>
${cell.innerText.trim()}
</${tag}>\n`;

                    }
                );



                xml += `    </row>\n`;

            });



            xml += `</data>`;



            let blob =
                new Blob(
                    [xml],
                    {
                        type:
                        "application/xml"
                    }
                );



            let a =
                document.createElement(
                    "a"
                );

            a.href =
                URL.createObjectURL(
                    blob
                );

            a.download =
                "selection.xml";

            a.click();

        }



        /* =========================================
        EXPORT SELECTED CSV
        ========================================= */

        exportSelectedCSV(rows) {

            let csv = [];



            let exportableHeaders =
                this.headers.filter(
                    header =>
                    header.dataset.export
                    !== "false"
                );



            csv.push(

                exportableHeaders
                    .map(
                        header =>
                        `"${header.innerText.trim()}"`
                    )
                    .join(",")

            );



            rows.forEach(row => {

                let rowData = [];



                exportableHeaders.forEach(
                    header => {

                        let index =
                            this.headers.indexOf(
                                header
                            );

                        let cell =
                            row.children[index];

                        rowData.push(
                            `"${cell.innerText.trim()}"`
                        );

                    }
                );



                csv.push(
                    rowData.join(",")
                );

            });



            let blob =
                new Blob(
                    [csv.join("\n")],
                    {
                        type:"text/csv"
                    }
                );



            let a =
                document.createElement(
                    "a"
                );

            a.href =
                URL.createObjectURL(
                    blob
                );

            a.download =
                "selection.csv";

            a.click();

        }



        /* =========================================
        GENERATE EXPORT TABLE
        ========================================= */

        generateExportTable(rows) {

            let table =
                document.createElement(
                    "table"
                );

            let thead =
                document.createElement(
                    "thead"
                );

            let tbody =
                document.createElement(
                    "tbody"
                );

            let headerRow =
                document.createElement(
                    "tr"
                );



            let exportableHeaders =
                this.headers.filter(
                    header =>
                    header.dataset.export
                    !== "false"
                );



            exportableHeaders.forEach(
                header => {

                    let th =
                        document.createElement(
                            "th"
                        );

                    th.innerText =
                        header.innerText.trim();

                    headerRow.appendChild(
                        th
                    );

                }
            );



            thead.appendChild(
                headerRow
            );



            rows.forEach(row => {

                let tr =
                    document.createElement(
                        "tr"
                    );



                exportableHeaders.forEach(
                    header => {

                        let index =
                            this.headers.indexOf(
                                header
                            );

                        let td =
                            document.createElement(
                                "td"
                            );

                        td.innerText =
                            row.children[index]
                            ?.innerText
                            .trim();

                        tr.appendChild(td);

                    }
                );



                tbody.appendChild(tr);

            });



            table.appendChild(thead);

            table.appendChild(tbody);



            return table;

        }



        /* =========================================
        EXPORT ALL
        ========================================= */

        exportExcel() {

            if(!this.exportExcelBtn)
            return;



            this.exportExcelBtn
            .addEventListener(
                "click",
                () => {

                    let clone =
                        this.cleanExportTable();

                    let wb =
                        XLSX.utils
                        .table_to_book(
                            clone
                        );

                    XLSX.writeFile(
                        wb,
                        "future-table.xlsx"
                    );

                }
            );

        }



        exportPDF() {

            if(!this.exportPDFBtn)
            return;



            this.exportPDFBtn
            .addEventListener(
                "click",
                () => {

                    const { jsPDF } =
                        window.jspdf;

                    let doc =
                        new jsPDF();

                    doc.autoTable({

                        html:
                            this.cleanExportTable(),

                        theme:"grid",

                        styles:{
                            fontSize:9
                        }

                    });

                    doc.save(
                        "future-table.pdf"
                    );

                }
            );

        }



        exportXML() {

            if(!this.exportXMLBtn)
            return;



            this.exportXMLBtn
            .addEventListener(
                "click",
                () => {

                    this.exportSelectedXML(
                        this.getFilteredRows()
                    );

                }
            );

        }



        exportCSV() {

            if(!this.exportCSVBtn)
            return;



            this.exportCSVBtn
            .addEventListener(
                "click",
                () => {

                    this.exportSelectedCSV(
                        this.getFilteredRows()
                    );

                }
            );

        }



        /* =========================================
        CLEAN EXPORT TABLE
        ========================================= */

        cleanExportTable() {

            return this.generateExportTable(
                this.getFilteredRows()
            );

        }



        /* =========================================
        GSAP CLEAN
        ========================================= */

        gsapAnimations() {

            gsap.set(

                [

                    ".futureBtn",
                    ".futureMiniBtn",
                    ".futureTableCard",
                    ".futurePagination",
                    ".futureSelectedActions",
                    ".futureExportGroup"

                ],

                {
                    opacity:1,
                    y:0,
                    x:0,
                    scale:1,
                    clearProps:"all"
                }

            );



            gsap.from(

                ".futureTableCard",

                {
                    opacity:0,
                    y:25,
                    duration:.5,
                    ease:"power2.out",
                    clearProps:"all"
                }

            );



            gsap.from(

                ".futureBtn",

                {
                    opacity:0,
                    y:-15,
                    stagger:.04,
                    duration:.35,
                    ease:"power2.out",
                    clearProps:"all"
                }

            );



            gsap.from(

                ".futureMiniBtn",

                {
                    opacity:0,
                    scale:.8,
                    stagger:.02,
                    duration:.25,
                    delay:.15,
                    ease:"back.out(1.7)",
                    clearProps:"all"
                }

            );



            gsap.from(

                ".futureRow",

                {
                    opacity:0,
                    y:15,
                    stagger:.02,
                    duration:.3,
                    delay:.1,
                    ease:"power2.out",
                    clearProps:"all"
                }

            );



            gsap.from(

                ".futureTableFooter",

                {
                    opacity:0,
                    y:15,
                    duration:.4,
                    delay:.2,
                    ease:"power2.out",
                    clearProps:"all"
                }

            );

        }

    }



    /* =========================================
    INIT
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        () => {

            new FutureTable({

                table: ".futureTable",

                search: "#futureSearch",

                pagination: "#pagination",

                perPage: "#rowsPerPage",

                selectAll: "#selectAll"

            });

        }
    );

</script>



<script>

    /* =========================================
    GLOBAL DROPDOWN ACTIONS
    ========================================= */

    document.addEventListener(
        "DOMContentLoaded",
        () => {

            const globalBtn =
                document.getElementById(
                    "futureGlobalActionBtn"
                );

            const globalActions =
                document.querySelector(
                    ".futureGlobalActions"
                );

            const globalDropdown =
                document.querySelector(
                    ".futureGlobalDropdown"
                );



            /*
            SECURITY
            */

            if(
                !globalBtn
                ||
                !globalActions
                ||
                !globalDropdown
            ){
                return;
            }



            /* =========================================
            TOGGLE
            ========================================= */

            globalBtn.addEventListener(
                "click",
                (e) => {

                    e.preventDefault();

                    e.stopPropagation();



                    globalActions.classList.toggle(
                        "active"
                    );



                    if(
                        globalActions.classList.contains(
                            "active"
                        )
                    ){

                        gsap.fromTo(

                            globalDropdown,

                            {
                                opacity:0,
                                y:-12,
                                scale:.96
                            },

                            {
                                opacity:1,
                                y:0,
                                scale:1,
                                duration:.22,
                                ease:"power2.out"
                            }

                        );

                    }

                }
            );



            /* =========================================
            CLOSE OUTSIDE
            ========================================= */

            document.addEventListener(
                "click",
                (e) => {

                    if(
                        !globalActions.contains(
                            e.target
                        )
                    ){

                        globalActions.classList.remove(
                            "active"
                        );

                    }

                }
            );



            /* =========================================
            INSIDE CLICK
            ========================================= */

            globalDropdown.addEventListener(
                "click",
                (e) => {

                    e.stopPropagation();

                }
            );

        }
    );

</script>

{{-- MON DATA TABLE FIN --}}

    {{-- HISTORIQUE PAGE DEBUT --}}
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                /*
                =========================================================
                ELEMENTS
                =========================================================
                */

                const btn =
                    document.getElementById(
                        "futureHistoryBtn"
                    );

                const dropdown =
                    document.getElementById(
                        "futureHistoryDropdown"
                    );

                const closeBtn =
                    document.getElementById(
                        "futureHistoryClose"
                    );

                const body =
                    document.getElementById(
                        "futureHistoryBody"
                    );

                const pagination =
                    document.getElementById(
                        "futureHistoryPagination"
                    );

                if(
                    !btn
                    ||
                    !dropdown
                    ||
                    !body
                    ||
                    !pagination
                ) return;



                /*
                =========================================================
                OPEN
                =========================================================
                */

                const openDropdown = () => {

                    dropdown.classList.add(
                        "active"
                    );

                };



                /*
                =========================================================
                CLOSE
                =========================================================
                */

                const closeDropdown = () => {

                    dropdown.classList.remove(
                        "active"
                    );

                };



                /*
                =========================================================
                RESET TO PAGE 1
                =========================================================
                */

                const resetHistoryPagination = () => {

                    const url =
                        new URL(
                            window.location.href
                        );

                    url.searchParams.delete(
                        "history_page"
                    );

                    window.history.replaceState(
                        {},
                        "",
                        url
                    );

                };



                /*
                =========================================================
                TOGGLE
                =========================================================
                */

                btn.addEventListener("click", (e) => {

                    e.stopPropagation();

                    /*
                    =========================================================
                    RESET PAGE
                    =========================================================
                    */

                    resetHistoryPagination();

                    dropdown.classList.contains("active")
                        ? closeDropdown()
                        : openDropdown();

                });



                /*
                =========================================================
                CLOSE BUTTON
                =========================================================
                */

                closeBtn?.addEventListener("click", () => {

                    closeDropdown();

                });



                /*
                =========================================================
                OUTSIDE CLICK
                =========================================================
                */

                document.addEventListener("click", (e) => {

                    if(

                        !dropdown.contains(e.target)
                        &&

                        !btn.contains(e.target)

                    ){

                        closeDropdown();

                    }

                });



                /*
                =========================================================
                ESCAPE
                =========================================================
                */

                document.addEventListener("keydown", (e) => {

                    if(e.key === "Escape"){

                        closeDropdown();

                    }

                });



                /*
                =========================================================
                AJAX PAGINATION
                =========================================================
                */

                document.addEventListener("click", async (e) => {

                    const paginationBtn =
                        e.target.closest(
                            ".futurePaginationBtn"
                        );

                    if(!paginationBtn) return;

                    e.preventDefault();



                    /*
                    =========================================================
                    PAGE
                    =========================================================
                    */

                    const page =
                        paginationBtn.dataset.page;

                    if(!page) return;



                    /*
                    =========================================================
                    LOADING
                    =========================================================
                    */

                    body.style.opacity = ".45";

                    pagination.style.pointerEvents =
                        "none";



                    try{

                        /*
                        =========================================================
                        URL
                        =========================================================
                        */

                        const url =
                            new URL(
                                window.location.href
                            );



                        /*
                        =========================================================
                        FORCE HISTORY PAGE
                        =========================================================
                        */

                        url.searchParams.set(
                            "history_page",
                            page
                        );



                        /*
                        =========================================================
                        FETCH
                        =========================================================
                        */

                        const response =
                            await fetch(

                                url.toString(),

                                {

                                    method:"GET",

                                    headers:{

                                        "X-Requested-With":
                                        "XMLHttpRequest",

                                        "Accept":
                                        "application/json"

                                    }

                                }

                            );



                        /*
                        =========================================================
                        JSON
                        =========================================================
                        */

                        const data =
                            await response.json();



                        /*
                        =========================================================
                        UPDATE BODY
                        =========================================================
                        */

                        body.innerHTML =
                            data.historiques;



                        /*
                        =========================================================
                        UPDATE PAGINATION
                        =========================================================
                        */

                        pagination.innerHTML = `

                            ${
                                data.current_page > 1

                                ?

                                `
                                    <button
                                        type="button"
                                        class="futurePageBtn futurePaginationBtn"
                                        data-page="${data.current_page - 1}"
                                    >

                                        <i class="fa fa-angle-left"></i>

                                    </button>
                                `

                                :

                                `
                                    <button
                                        type="button"
                                        class="futurePageBtn disabled"
                                    >

                                        <i class="fa fa-angle-left"></i>

                                    </button>
                                `
                            }

                            <div class="futurePageInfo">

                                Page
                                ${data.current_page}
                                sur
                                ${data.last_page}

                            </div>

                            ${
                                data.has_more_pages

                                ?

                                `
                                    <button
                                        type="button"
                                        class="futurePageBtn futurePaginationBtn"
                                        data-page="${data.current_page + 1}"
                                    >

                                        <i class="fa fa-angle-right"></i>

                                    </button>
                                `

                                :

                                `
                                    <button
                                        type="button"
                                        class="futurePageBtn disabled"
                                    >

                                        <i class="fa fa-angle-right"></i>

                                    </button>
                                `
                            }

                        `;



                        /*
                        =========================================================
                        KEEP OPEN
                        =========================================================
                        */

                        openDropdown();



                    }catch(error){

                        console.error(
                            "Erreur pagination historique :",
                            error
                        );

                    }finally{

                        /*
                        =========================================================
                        RESET
                        =========================================================
                        */

                        body.style.opacity = "1";

                        pagination.style.pointerEvents =
                            "auto";

                    }

                });

            });

        </script>
    {{-- HISTORIQUE PAGE FIN --}}

        {{-- CONSOMMABLES FIN --}}
<!-- GSAP -->
{{-- <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script> --}}
        <script>

            $(document).ready(function(){

                /* =========================================
                MODAL OPEN ANIMATION
                ========================================= */

                $(document).on('show.bs.modal', '.futuristicModal', function () {

                    let modal = $(this);

                    gsap.set(modal.find(".modal-content"), {
                        scale:0.92,
                        opacity:0
                    });

                    gsap.set(modal.find(".futureField"), {
                        opacity:0,
                        y:20
                    });

                    gsap.set(modal.find(".headerIcon, .modal-icon"), {
                        scale:0,
                        rotation:-90
                    });

                });

                $(document).on('shown.bs.modal', '.futuristicModal', function () {

                    let modal = $(this);

                    let tl = gsap.timeline();

                    tl.to(modal.find(".modal-content"), {
                        duration:.4,
                        scale:1,
                        opacity:1,
                        ease:"power3.out"
                    })

                    .to(modal.find(".headerIcon, .modal-icon"), {
                        duration:.4,
                        scale:1,
                        rotation:0,
                        ease:"back.out(1.7)"
                    }, "-=0.2")

                    .to(modal.find(".futureField"), {
                        duration:.4,
                        opacity:1,
                        y:0,
                        stagger:.06,
                        ease:"power2.out"
                    }, "-=0.2");

                });

                /* =========================================
                MODAL CLOSE
                ========================================= */

                $(document).on('hide.bs.modal', '.futuristicModal', function () {

                    let modal = $(this);

                    gsap.to(modal.find(".modal-content"), {
                        duration:.25,
                        scale:.95,
                        opacity:0,
                        ease:"power2.in"
                    });

                });

                /* =========================================
                STEPPER SYSTEM
                ========================================= */

                $(document).on('click', '.nextStep', function(){

                    let modal = $(this).closest('.futuristicModal');

                    let currentStep = parseInt(
                        modal.attr('data-step')
                    );

                    let totalSteps = parseInt(
                        modal.attr('data-max-step')
                    );

                    if(currentStep < totalSteps){

                        currentStep++;

                        modal.attr('data-step', currentStep);

                        updateStepper(modal, currentStep);

                    }

                });

                $(document).on('click', '.prevStep', function(){

                    let modal = $(this).closest('.futuristicModal');

                    let currentStep = parseInt(
                        modal.attr('data-step')
                    );

                    if(currentStep > 1){

                        currentStep--;

                        modal.attr('data-step', currentStep);

                        updateStepper(modal, currentStep);

                    }

                });

                /* =========================================
                UPDATE STEPPER
                ========================================= */

                function updateStepper(modal, currentStep){

                    modal.find('.stepItem').removeClass('active');

                    modal.find('.stepContent').removeClass('active');

                    modal.find(`.stepItem[data-step="${currentStep}"]`)
                        .addClass('active');

                    modal.find(`.stepContent[data-content="${currentStep}"]`)
                        .addClass('active');

                    gsap.fromTo(

                        modal.find(`.stepContent[data-content="${currentStep}"]`),

                        {
                            opacity:0,
                            y:20
                        },

                        {
                            opacity:1,
                            y:0,
                            duration:.4,
                            ease:"power2.out"
                        }

                    );

                    /* BUTTONS */

                    if(currentStep <= 1){

                        modal.find('.prevStep').hide();

                    }else{

                        modal.find('.prevStep').show();

                    }

                    if(currentStep >= parseInt(modal.attr('data-max-step'))){

                        modal.find('.nextStep').hide();

                        modal.find('.submitStep').show();

                    }else{

                        modal.find('.nextStep').show();

                        modal.find('.submitStep').hide();

                    }

                }

                /* =========================================
                INIT ALL STEPPERS
                ========================================= */

                $('.futuristicModal[data-stepper="true"]').each(function(){

                    updateStepper($(this), 1);

                });

            });

        </script>
        <script>

            $(document).ready(function(){

                $('.futuristicModal').each(function(){

                    let modal = $(this);

                    let currentStep = 1;

                    let totalSteps =
                        modal.find('.stepItem').length;

                    function updateStepper(){

                        // RESET
                        modal.find('.stepItem')
                            .removeClass('active');

                        modal.find('.stepContent')
                            .removeClass('active');

                        // ACTIVE STEP
                        modal.find(`.stepItem[data-step="${currentStep}"]`)
                            .addClass('active');

                        modal.find(`.stepContent[data-content="${currentStep}"]`)
                            .addClass('active');

                        // GSAP
                        gsap.fromTo(

                            modal.find(`.stepContent[data-content="${currentStep}"]`),

                            {
                                opacity:0,
                                y:25
                            },

                            {
                                opacity:1,
                                y:0,
                                duration:.45,
                                ease:"power2.out"
                            }

                        );

                        // BTN PREV
                        if(currentStep > 1){

                            modal.find('#prevStep').fadeIn(200);

                        }else{

                            modal.find('#prevStep').fadeOut(200);

                        }

                        // BTN NEXT / SUBMIT
                        if(currentStep === totalSteps){

                            modal.find('#nextStep').hide();

                            modal.find('#submitStep').fadeIn(200);

                        }else{

                            modal.find('#nextStep').show();

                            modal.find('#submitStep').hide();

                        }

                    }

                    // NEXT
                    modal.find('#nextStep').on('click', function(){

                        if(currentStep < totalSteps){

                            currentStep++;

                            updateStepper();

                        }

                    });

                    // PREV
                    modal.find('#prevStep').on('click', function(){

                        if(currentStep > 1){

                            currentStep--;

                            updateStepper();

                        }

                    });

                    // RESET MODAL
                    modal.on('shown.bs.modal', function(){

                        currentStep = 1;

                        updateStepper();

                    });

                });

            });

        </script>
        <script>

            $(document).ready(function(){

                $('.futureSelect').select2({

                    placeholder: "Sélectionner",

                    allowClear: true,

                    width:'100%',

                    dropdownParent: $('.modal.show'),

                });

            });

        </script>
        <script>


            function stepperModal(){

                return{

                    step:1,

                    next(){

                        if(this.step < 4){

                            this.step++;

                        }

                    },

                    prev(){

                        if(this.step > 1){

                            this.step--;

                        }

                    }

                }

            }

        </script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {

                // OPEN
                $(document).on('show.bs.modal', '.modal', function () {

                    let modal = $(this);

                    // 🔥 RESET AVANT AFFICHAGE
                    gsap.set(modal.find(".modal-content"), {
                        scale: 0.92,
                        opacity: 0
                    });

                    gsap.set(modal.find(".futureField"), {
                        opacity: 0,
                        y: 20
                    });

                    gsap.set(modal.find(".headerIcon, .modal-icon"), {
                        scale: 0,
                        rotation: -90
                    });
                });

                // AFTER VISIBLE
                $(document).on('shown.bs.modal', '.modal', function () {

                    let modal = $(this);

                    let tl = gsap.timeline();

                    tl.to(modal.find(".modal-content"), {
                        duration: 0.4,
                        scale: 1,
                        opacity: 1,
                        ease: "power3.out"
                    })

                    .to(modal.find(".headerIcon, .modal-icon"), {
                        duration: 0.4,
                        scale: 1,
                        rotation: 0,
                        ease: "back.out(1.7)"
                    }, "-=0.2")

                    .to(modal.find(".futureField"), {
                        duration: 0.4,
                        opacity: 1,
                        y: 0,
                        stagger: 0.06,
                        ease: "power2.out"
                    }, "-=0.2");
                });

            });
        </script>
        <script>
            $(document).on('hide.bs.modal', '.modal', function () {

                let modal = $(this);

                gsap.to(modal.find(".modal-content"), {
                    duration: 0.25,
                    scale: 0.95,
                    opacity: 0,
                    ease: "power2.in"
                });

            });
        </script>
    {{-- OUVERTURE ET FERMETURE DU MENU DEBUT  --}}
        <script>
            $(document).ready(function () {
                // Initialiser bsCustomFileInput si nécessaire
                if (typeof bsCustomFileInput !== 'undefined') {
                    bsCustomFileInput.init();
                }

                // Cacher les éléments avec la classe 'mprofil' au chargement de la page
                $('.mprofil').hide();

                // Gérer le clic sur l'élément avec l'ID 'profil'
                $('#profil').on('click', function () {
                    $(".mprofil").fadeToggle();
                });

                // Gérer le clic sur les éléments avec les ID 'A' et 'T'
                $('#A, #T').on('click', function () {
                    var $menu = $(".sumenu");

                    if ($menu.hasClass('show')) {
                        $menu.removeClass('show'); // Supprimer la classe 'show'
                    } else {
                        $menu.addClass('show'); // Ajouter la classe 'show'
                    }
                });

                // Initialiser AOS
                if (typeof AOS !== 'undefined') {
                    AOS.init();
                }
            });


        </script>
    {{-- OUVERTURE ET FERMETURE DU MENU DEBUT  --}}
    {{-- TOOLTIP DEBUT --}}
        <script>
            $(document).ready(function(){
                    $('[data-bs-toggle="tooltip"]').tooltip();
                });

        </script>
    {{-- TOOLTIP FIN --}}
     @include('sweetalert::alert')
    @yield('footer')
</body>

</html>
