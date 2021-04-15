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
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="./intervenants.php">Promotions</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ajout</li>
                        </ol>
                    </nav>
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



        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->

        <div class="card justify-content-center col-10 m-auto">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h3 class="mb-0">Connection</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <form class="col-10" action="./traitementUser.php?action=login" method="POST">
                    <h6 class="heading-small text-muted mb-4">vos informations</h6>
                    <div class="pl-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">votre Email</label>
                                    <input type="email" name="name" id="input-name" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Mot de pass</label>
                                    <input type="password" name="studentsNumber" id="input-studentsNumber" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Référence</label>
                                    <input type="text" name="ref" id="input-ref" class="form-control">
                                </div>
                            </div>
                        </div> -->
                        <div class="d-flex justify-content-center mb-4">

                            <input type="submit" class="btn btn-success" value="Conneter">
                            <div class="w-100"></div>
                            <a href="http://">vous n'avez pas de compte , inscrivez vous</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <!---------------------------------------------------------------------------------------------------------------------------

                                             METTRE LE CONTENU DE VOTRE PAGE CI-DESSOUS

        --------------------------------------------------------------------------------------------------------------------------->


    </div>

    <?php include("./components/footer.php") ?>