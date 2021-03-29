<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="./assets/img/brand/favicon.png" type="image/png">
    <link rel="stylesheet" href="assets/vendor/fullcalendar/dist/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/vendor/sweetalert2/dist/sweetalert2.min.css">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="./assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->



    <!-- Argon CSS -->


    <link rel="stylesheet" href="./assets/css/argon.css?v=1.2.0" type="text/css">
    <style>
        .b {
            border: 1px red solid !important;
        }
        .multiselect {
        width: 200px;
        }

        .selectBox {
        position: relative;
        }

        .selectBox select {
        width: 100%;
        }

        .overSelect {
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        }

        #checkboxes {
        display: none;
        border: 1px #dadada solid;
        }

        #checkboxes label {
        display: block;
        }

        #checkboxes label:hover {
        background-color: #1e90ff;
        }
    </style>
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="./assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="ni ni-calendar-grid-58 text-primary"></i>
                                <span class="nav-link-text">TablePormos</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./intervenants.php">
                                <i class="ni ni-single-02 text-primary"></i>
                                <span class="nav-link-text">Intervenants</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./promos.php">
                                <i class="ni ni-hat-3 text-primary"></i>
                                <span class="nav-link-text">Promotions</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./subjects.php">
                                <i class="ni ni-archive-2 text-primary"></i>
                                <span class="nav-link-text">Matières</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dates.php">
                                <i class="ni ni-archive-2 text-primary"></i>
                                <span class="nav-link-text">Dates</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="./assets/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">John Snow</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->