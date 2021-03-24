<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?ruta=updatePersonal" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="my-2 morado">NOMBRE</label>
                                    <input type="text" class="form-control" name="txt_dni" value="<?php echo $dataPersonal->idDNI; ?>" hidden>
                                    <input type="text" class="form-control" name="txt_nombre" value="<?php echo $dataPersonal->nombre; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">APELLIDO PATERNO</label>
                                    <input type="text" class="form-control" name="txt_apellido_paterno" value="<?php echo $dataPersonal->apellidoPaterno; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">APELLIDO MATERNO</label>
                                    <input type="text" class="form-control" name="txt_apellido_materno" value="<?php echo $dataPersonal->apellidoMaterno; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">FECHA NACIMIENTO</label>
                                    <input type="text" class="form-control" name="txt_fecha_nacimiento" value="<?php echo $dataPersonal->fecha; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">FECHA ACTUAL</label>
                                    <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="txt_fecha_actual" readonly>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="my-2 morado"># DE CELULAR</label>
                                    <input type="text" class="form-control" value="<?php echo $dataPersonal->telefono; ?>" name="txt_celular" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">ACTIVIDAD</label>
                                    <input type="text" class="form-control" name="txt_actividad" value="<?php echo $dataPersonal->actividad; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">PROFESIÓN</label>
                                    <input type="text" class="form-control" name="cbo_profesion" value="<?php echo $dataPersonal->profesion; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">BRIGADA</label>
                                    <input type="text" class="form-control" name="cboBrigradas" value="<?php echo $dataPersonal->tipo_brigada; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">PLANILLA</label>
                                    <input type="text" class="form-control" name="idPlanilla" value="<?php echo $dataPersonal->id_planilla; ?>" hidden>    
                                    <input type="text" class="form-control" name="cboPlanilla" value="<?php echo $dataPersonal->nombre_planilla; ?>" readonly>    
                                </div>
                            </div>

                            <div class="col-md-4 mt-4">
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <label for="" class="my-2 morado">SELECCIONE UNA FOTO</label>
                                        <input type="file" name="file" class="form-control" accept=".jpg, .jpeg, .png" id="img">
                                        <div class="text-center my-3 img-vista"> <img src="" id="imgPreview" alt="imgPreview"></div>
                                    </div>
                                </div>
                            </div>

                            <div class=" col-md-8">
                                <div class="form-group">
                                    <label for="" class="my-2 morado">OBSERVACIONES</label>
                                    <textarea name="txtObservacion" id="" class="form-control"><?php echo $dataPersonal->observaciones; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <!--CIERRE DEL ROW-->


                        <div class="row my-3 triaje">
                            <div class="col-md-8">
                                <div class="card">
                                    <!--borde de color-->
                                    <div class="borde card-body">
                                        <div class="text-center"><h1 class="morado">Responda las preguntas</h1></div>

                                        <div class="form-group">
                                            <label for="" class="my-2">
                                                <p class="pregunta">¿Tiene o ha Tenido fiebre en la última semana?</p>
                                            </label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="check_fiebre1" value="NO" id="check_fiebre1" checked>
                                                <label class="form-check-label" for="">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_fiebre2" id="check_fiebre2" data-bs-toggle="collapse" data-bs-target="#fiebre" aria-expanded="false" aria-controls="collapseExample">
                                                <label class="form-check-label" for="">SI</label>
                                                <div class="collapse" id="fiebre">
                                                    <div class="card card-body"><input type="text" class="form-control" name="txt_fiebre" placeholder="Descripcion"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">
                                                <p class="pregunta">¿Tiene o ha Tenido dolor de garganta o pérdida de olfato en la ultima semana?</p>
                                            </label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="check_garganta1" value="NO" id="check_garganta1" checked>
                                                <label class="form-check-label" for="">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_garganta2" id="check_garganta2" data-bs-toggle="collapse" data-bs-target="#garganta" aria-expanded="false" aria-controls="collapseExample">
                                                <label class="form-check-label" for="">SI</label>
                                                <div class="collapse" id="garganta">
                                                    <div class="card card-body"><input type="text" class="form-control" name="txt_garganta" placeholder="Descripcion"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">
                                                <p class="pregunta">¿Tiene algún familiar o contacto cercano con infeccion confirmada a COVID-19 actualmente?</p>
                                            </label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="check_covid1" value="NO" id="check_covid1" checked>
                                                <label class="form-check-label" for="">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_covid2" id="check_covid2" data-bs-toggle="collapse" data-bs-target="#covid" aria-expanded="false" aria-controls="collapseExample">
                                                <label class="form-check-label" for="">SI</label>
                                                <div class="collapse" id="covid">
                                                    <div class="card card-body"><input type="text" class="form-control" name="txt_covid" placeholder="Descripcion"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">
                                                <p class="pregunta">¿En caso de mujeres en edad fértil (18 a 49 años) : ¿Está embarzada o tiene sospecha de estarlo?</p>
                                            </label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="check_embarazo1" value="NO" id="check_embarazo1" checked>
                                                <label class="form-check-label" for="">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_embarazo2" id="check_embarazo2" data-bs-toggle="collapse" data-bs-target="#embarazo" aria-expanded="false" aria-controls="collapseExample">
                                                <label class="form-check-label" for="">SI</label>
                                                <div class="collapse" id="embarazo">
                                                    <div class="card card-body"><input type="text" class="form-control" name="txt_embarazo" placeholder="Descripcion"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">
                                                <p class="pregunta">¿Tiene antecedentes de alergia severe a alguna vacuna o medicamento?</p>
                                            </label>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" name="check_alergia1" value="NO" id="check_alergia1" checked>
                                                <label class="form-check-label" for="">No</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="check_alergia2" id="check_alergia2" data-bs-toggle="collapse" data-bs-target="#alergia" aria-expanded="false" aria-controls="collapseExample">
                                                <label class="form-check-label" for="">SI</label>
                                                <div class="collapse" id="alergia">
                                                    <div class="card card-body"><input type="text" class="form-control" name="txt_alergia" placeholder="Descripcion"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                               <div class="card">
                                 <div class="card-body">
                                    <div class="form-group">
                                        <label for="text-center">EN CASO QUE APLIQUE </label>
                                        <select name="cboEstado" id="estado" class="form-control mt-3">
                                            <option value="0">MARCAR RESPUESTAS</option>
                                            <option value="3">DESISTIR DE LA VACUNACION</option>
                                            <option value="4">ME HE VACUNADO EN OTRO CENTRO DE SALUD</option>
                                        </select>
                                    </div>
                                 </div>
                               </div>
                            </div>
                        </div>


                        <div class="row my-3">
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Actualizar el Registro" name="btnUpdate">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include_once('view/templates/footer.php'); ?>