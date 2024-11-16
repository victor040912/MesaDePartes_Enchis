<?php 
    require_once("../../config/conexion.php")
?>
<!doctype html>
<html lang="es">
    <head>
        <title>Victor | Inicio Mesa de Partes - consultar tramite</title>
        <?php require_once("../html/head.php")?>
    </head>

    <body>

        <div id="layout-wrapper">

            <?php require_once("../html/header.php")?>

            <?php require_once("../html/menu.php")?>

            <div class="main-content">

            <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Consultar Tramite</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                            <li class="breadcrumb-item active">Starter Page</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Listado de Tramites.</h4>
                                            <p class="card-title-desc">(*) Datos obligatorios. </p>
                                        </div>

                                        <div class="card-body">

                                                <table id="listado_table" class="table table-bordered dt-responsive  nowrap w-100">
                                                    <thead>
                                                        <tr>
                                                            <th>Nro.Tramite</th>
                                                            <th>Area</th>
                                                            <th>Tramite</th>
                                                            <th>Doc.Externo</th>
                                                            <th>Tipo</th>
                                                            <th>Doc.</th>
                                                            <th>Nombre.</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                    </tbody>
                                                </table>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

                <?php require_once("../html/footer.php")?>
        </div>

        <?php require_once("../html/sidebar.php")?>

        <div class="rightbar-overlay"></div>

        <?php require_once("../html/js.php")?>

        <script type="text/javascript" src="consultar.js"></script>

    </body>
</html>