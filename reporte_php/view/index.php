<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

    <main>
        <section class="mt-3">
            <div class="container">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="index.php?ruta=save" method="POST">
                                <div class="row mb-3">
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-group">
                                            <label for="" class="my-2">DNI</label>
                                            <input type="text" value="" class="form-control" name="txt_dni">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="" class="my-2">NOMBRE</label>
                                                    <input type="text" class="form-control" name="txt_nombre" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="my-2">APELLIDO PATERNO</label>
                                                    <input type="text" class="form-control" name="txt_apellido_paterno" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="my-2">APELLIDO MATERNO</label>
                                                    <input type="text" class="form-control" name="txt_apellido_materno" value="">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="my-2">FECHA NACIMIENTO</label>
                                                    <input type="date" class="form-control" name="txt_fecha_nacimiento" value="">
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="my-2">ACTIVIDAD</label>
                                                    <select class="form-control" name="txt_actividad">
                                                        <option value="ASISTENCIAL">ASISTENCIAL</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="my-2">PROFESIÓN</label>
                                                    <select name="cbo_profesion" id="" class="form-control">
                                                        <option value="ASISTENCIAL TECNICO ENFERMERO">ASISTENCIAL TECNICO ENFERMERO</option>
                                                        <option value="ASISTENCIAL ENFERMERO">ASISTENCIAL ENFERMERO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-8 mx-auto">
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
                                </div>

                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="" class="my-2">HORARIO BRIGADAS 01</label>
                                                    <select name="cboBrigradas" class="form-control" id="">
                                                    <?php foreach($dataBrigada as $data) : ?>
                                                        <option value="<?php echo $data->id?>"><?php echo $data->nombre?>  ---  tipo: <?php echo $data->id?></option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-8 mx-auto">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="" class="my-3">OBSERVACIONES</label>
                                                    <textarea name="txtObservacion" id="" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-md-8 mx-auto">
                                        <input type="submit" class="btn btn-primary" value="registar" name="btnData">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <?php include_once('view/templates/footer.php'); ?>