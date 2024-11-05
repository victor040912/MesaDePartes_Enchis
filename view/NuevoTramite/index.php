<?php
require_once("../../config/conexion.php")
?>
<!doctype html>
<html lang="es">

<head>
    <title>Victor | Inicio Mesa de Partes - consultar tramite</title>
    <?php require_once("../html/head.php") ?>
</head>

<body>

    <div id="layout-wrapper">

        <?php require_once("../html/header.php") ?>

        <?php require_once("../html/menu.php") ?>

        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0 font-size-18">Inicio</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Starter Page</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Ingrese toda la informacion requerida</h4>
                                    <p class="card-title-desc"> (*) Datos Obligatorios </p>
                                    </p>
                                </div>

                                <div class="card-body">
                                    <form method="post" id="documento_form">
                                        <div class="row">


                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">Area</label>
                                                    <select class="form-select" name="area_id" id="area_id" placeholder="Seleccionar">
                                                        <option value="">Seleccionar</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-9">
                                                <div class="mb-3">
                                                    <label for="example-text-input" class="form-label">Tramite</label>
                                                    <select class="form-select" name="tra_id" id="tra_id" placeholder="Seleccionar">
                                                        <option value="">Seleccionar</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">Nro Externo</label>
                                                    <input class="form-control" type="text" value="" name="doc_externo" id="doc_externo">
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">Tipo (*)</label>
                                                    <select class="form-select" name="tipo_id" id="tipo_id" placeholder="Seleccionar" required>
                                                        <option value="">Seleccionar</option>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-3">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">DNI / RUC (*)</label>
                                                    <input class="form-control" type="number" value="" name="doc_dni" id="doc_dni" required>
                                                    <!-- maxlength="12" oninput="if(this.value.length > 12) this.value = this.value.slice(0, 12);" -->
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">Nombre / Razon Social (*)</label>
                                                    <input class="form-control" type="text" value="" name="doc_nom" id="doc_nom" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="form-label" class="form-label">Descripcion (*)</label>
                                                    <textarea class="form-control" type="text" rows="2" value="" name="doc_descrip" id="doc_descrip" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="fallback">
                                                    <input name="file" type="file" multiple="multiple">
                                                </div>
                                                <div class="dz-message needsclick">
                                                    <div class="mb-3">
                                                        <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                                    </div>
                                                    <h5> Subir archivos </h5>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-2 mt-4">
                                                <button type="button" id="btnlimpiar" class="btn btn-secondary waves-effect waves-light">Limpiar</button>
                                                <button type="submit" id="btnguardar" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                            </div>


                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <?php require_once("../html/footer.php") ?>

    </div>

    </div>

    <?php require_once("../html/sidebar.php") ?>

    <div class="rightbar-overlay"></div>

    <?php require_once("../html/js.php") ?>

    <script type="text/javascript" src="nuevotramites.js"></script>
</body>

</html>