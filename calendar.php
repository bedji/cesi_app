<?php include("./components/header.php") ?>

<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">CESI Reims</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Intervenants</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="./addIntervenant.php" class="btn btn-sm btn-neutral">Ajouter intervenant</a>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="card card-calendar">
            <!-- Card header -->
            <div class="card-header">
                <!-- Title -->
                <h5 class="h3 mb-0">Calendar</h5>
            </div>
            <!-- Card body -->
            <div class="card-body p-0">


                <div class="calendar" data-toggle="calendar" id="calendar">
                    <div class="col-md">
                        <button type="button" class="btn btn-block btn-warning mb-3" data-toggle="modal" data-target="#modal-notification">Notification</button>
                        <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                            <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                <div class="modal-content bg-gradient-danger">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="py-3 text-center">
                                            <i class="ni ni-bell-55 ni-3x"></i>
                                            <h4 class="heading mt-4">You should read this!</h4>
                                            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                                        </div>

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white">Ok, Got it</button>
                                        <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        <?php include("./components/footer.php") ?>