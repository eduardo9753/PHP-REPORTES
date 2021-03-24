<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?ruta=save" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <label for="" class="my-2">DNI</label>
                                        <input type="text" value="" class="form-control" name="txt_dni" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="" class="my-2">NOMBRE</label>
                                                <input type="text" class="form-control" name="txt_nombre" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="my-2">APELLIDO PATERNO</label>
                                                <input type="text" class="form-control" name="txt_apellido_paterno" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="my-2">APELLIDO MATERNO</label>
                                                <input type="text" class="form-control" name="txt_apellido_materno" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="my-2">FECHA NACIMIENTO</label>
                                                <input type="date" class="form-control" name="txt_fecha_nacimiento" value="" required>
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
                                                    <option value="ASISTENCIAL TECNICO ENFERMERO">TECNICO ENFERMERO</option>
                                                    <option value="ASISTENCIAL ENFERMERO">ENFERMERO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center">Responda las preguntas</div>
                                            
                                            <div class="form-group">
                                                <label for="" class="my-2">¿Tiene o ha Tenido fiebre en la última semana?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_fiebre" value="NO" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">No</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_fiebre" value="SI" data-bs-toggle="collapse" data-bs-target="#fiebre" aria-expanded="false" aria-controls="collapseExample">
                                                    <label class="form-check-label" for="flexCheckDefault">SI</label>
                                                    <div class="collapse" id="fiebre">
                                                        <div class="card card-body"><input type="text" class="form-control" name="txt_fiebre" value="" required></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="my-2">¿Tiene o ha Tenido dolor de garganta o pérdida de olfato en la ultima semana?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_garganta" value="NO" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">No</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_garganta" value="SI" data-bs-toggle="collapse" data-bs-target="#garganta" aria-expanded="false" aria-controls="collapseExample">
                                                    <label class="form-check-label" for="flexCheckDefault">SI</label>
                                                    <div class="collapse" id="garganta">
                                                        <div class="card card-body"><input type="text" class="form-control" name="txt_garganta" value="" required></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="my-2">¿Tiene algún familiar o contacto cercano con infeccion confirmada a COVID-19 actualmente?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_covid" value="NO" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">No</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_covid" value="SI" data-bs-toggle="collapse" data-bs-target="#covid" aria-expanded="false" aria-controls="collapseExample">
                                                    <label class="form-check-label" for="flexCheckDefault">SI</label>
                                                    <div class="collapse" id="covid">
                                                        <div class="card card-body"><input type="text" class="form-control" name="txt_covid" value="" required></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="my-2">¿En caso de mujeres en edad fértil (18 a 49 años) : ¿Está embarzada o tiene sospecha de estarlo?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_embarazo" value="NO" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">No</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_embarazo" value="SI" data-bs-toggle="collapse" data-bs-target="#embarazo" aria-expanded="false" aria-controls="collapseExample">
                                                    <label class="form-check-label" for="flexCheckDefault">SI</label>
                                                    <div class="collapse" id="embarazo">
                                                        <div class="card card-body"><input type="text" class="form-control" name="txt_embarazo" value="" required></div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label for="" class="my-2">¿Tiene antecedentes de alergia severe a alguna vacuna o medicamento?</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_alergia" value="NO" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault">No</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="check_alergia" value="SI" data-bs-toggle="collapse" data-bs-target="#alergia" aria-expanded="false" aria-controls="collapseExample">
                                                    <label class="form-check-label" for="flexCheckDefault">SI</label>
                                                    <div class="collapse" id="alergia">
                                                        <div class="card card-body"><input type="text" class="form-control" name="txt_alergia" value="" required></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 mx-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="" class="my-2">HORARIO BRIGADAS 01</label>
                                                <select name="cboBrigradas" class="form-control" id="">
                                                    <?php foreach ($dataBrigada as $data) : ?>
                                                        <option value="<?php echo $data->id ?>"><?php echo $data->nombre ?> --- tipo: <?php echo $data->id ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 my-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="" class="my-3">OBSERVACIONES</label>
                                                <textarea name="txtObservacion" id="" class="form-control" required></textarea>
                                                <input type="text" class="form-control my-3" value="<?php echo date('Y-m-d');?>" name="txt_fecha_actual" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="">
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