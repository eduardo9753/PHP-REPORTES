<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="index.php?ruta=updatePersonal" method="POST">

                                                <div class="">
                                                    <div class="">
                                                        <div class="form-group">
                                                            <label for="" class="my-2">NOMBRE</label>
                                                            <input type="text" class="form-control" name="txt_dni" value="<?php echo $dataPersonal->idDNI; ?>" hidden>
                                                            <input type="text" class="form-control" name="txt_nombre" value="<?php echo $dataPersonal->nombre; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="my-2">APELLIDO PATERNO</label>
                                                            <input type="text" class="form-control" name="txt_apellido_paterno" value="<?php echo $dataPersonal->apellidoPaterno; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="my-2">APELLIDO MATERNO</label>
                                                            <input type="text" class="form-control" name="txt_apellido_materno" value="<?php echo $dataPersonal->apellidoMaterno; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="my-2">FECHA NACIMIENTO</label>
                                                            <input type="text" class="form-control" name="txt_fecha_nacimiento" value="<?php echo $dataPersonal->fecha; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="my-2">ACTIVIDAD</label>
                                                            <input type="text" class="form-control" name="txt_actividad" value="<?php echo $dataPersonal->actividad; ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="" class="my-2">PROFESIÓN</label>
                                                            <input type="text" class="form-control" name="cbo_profesion" value="<?php echo $dataPersonal->profesion; ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="" class="my-2">ES PERSONAL COVID</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_personal_covid" value="SI" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        SI
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_personal_covid" value="NO" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                        NO
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="my-2">ENVIADO POR DIRIS</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_diris" value="SI" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        SI
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_diris" value="NO" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                        NO
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="my-2">SE APLICO PRIMERA DOSIS DE VACUNA SINOPHARMA</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_vacuna" value="SI" id="flexCheckDefault">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        SI
                                                                    </label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="check_vacuna" value="NO" id="flexCheckChecked">
                                                                    <label class="form-check-label" for="flexCheckChecked">
                                                                        NO
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="" class="my-2">HORARIO BRIGADAS</label>
                                                                <input type="text" class="form-control" name="cboBrigradas" value="<?php echo $dataPersonal->tipo_brigada; ?>" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="" class="my-3">OBSERVACIONES</label>
                                                                <textarea name="txtObservacion" id="" class="form-control"><?php echo $dataPersonal->observaciones; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row my-3">
                                                        <div class="col-md-8">
                                                            <input type="submit" class="btn btn-primary" value="Actualizar el Registro" name="btnUpdate">
                                                        </div>
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
            </div>
        </div>
    </section>
</main>


<?php include_once('view/templates/footer.php'); ?>