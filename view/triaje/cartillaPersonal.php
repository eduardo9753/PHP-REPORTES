<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?ruta=updateCartillaPersonal" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-3">
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
                                    <label for="" class="my-2 morado">ACTIVIDAD</label>
                                    <input type="text" class="form-control" name="txt_actividad" value="<?php echo $dataPersonal->actividad; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">PROFESIÓN</label>
                                    <input type="text" class="form-control" name="cbo_profesion" value="<?php echo $dataPersonal->profesion; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">TELEFONO</label>
                                    <input type="text" class="form-control" name="txt_celular" value="<?php echo $dataPersonal->telefono; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">PLANILLA</label>
                                    <input type="text" class="form-control" name="idPlanilla" value="<?php echo $dataPersonal->id_planilla; ?>" hidden>  
                                    <input type="text" class="form-control" name="cboPlanilla" value="<?php echo $dataPersonal->nombre_planilla; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="" class="my-2 morado">HORARIO BRIGADAS</label>
                                    <input type="text" class="form-control" name="cboBrigradas" value="<?php echo $dataPersonal->tipo_brigada; ?>" readonly>
                                    <label for="" class="text-center my-2 morado">FECHA DE REGISTRO</label>
                                    <input type="text" class="form-control" value="<?php echo $dataPersonal->fechaRegistro; ?>" name="txt_fecha_actual" readonly>
                                </div>
                            </div>


                            <div class="col-md-6 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">Preguntas ya contestadas por el Personal</div>

                                        <div class="form-group">
                                            <label for="" class="my-2">¿Tiene o ha Tenido fiebre en la última semana?</label>
                                            <div class="form-group">
                                                <label class="form-check-label" for=""><?php echo $dataPersonal->checkfiebre ?></label>
                                                <input type="text" class="form-control" name="" value="<?php echo $dataPersonal->descfiebre; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">¿Tiene o ha Tenido dolor de garganta o pérdida de olfato en la ultima semana?</label>
                                            <div class="form-group">
                                                <label class="form-check-label" for=""><?php echo $dataPersonal->checkgarganta ?></label>
                                                <input type="text" class="form-control" name="" value="<?php echo $dataPersonal->descgarganta; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">¿Tiene algún familiar o contacto cercano con infeccion confirmada a COVID-19 actualmente?</label>
                                            <div class="form-group">
                                                <label class="form-check-label" for=""><?php echo $dataPersonal->checkcovid ?></label>
                                                <input type="text" class="form-control" name="" value="<?php echo $dataPersonal->desccovid; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">¿En caso de mujeres en edad fértil (18 a 49 años) : ¿Está embarzada o tiene sospecha de estarlo?</label>
                                            <div class="form-group">
                                                <label class="form-check-label" for=""><?php echo $dataPersonal->checkembarazo ?></label>
                                                <input type="text" class="form-control" name="" value="<?php echo $dataPersonal->descembarazo; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">¿Tiene antecedentes de alergia severe a alguna vacuna o medicamento?</label>
                                            <div class="form-group">
                                                <label class="form-check-label" for=""><?php echo $dataPersonal->checkalergia ?></label>
                                                <input type="text" class="form-control" name="" value="<?php echo $dataPersonal->descalergia; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2">OBSERVACIONES</label>
                                            <textarea name="txtObservacion" id="" class="form-control" readonly><?php echo $dataPersonal->observaciones; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="" class="morado">Foto</label>
                                            <img src="<?php echo $dataPersonal->foto ?>" class="img-fluid" alt="">
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="my-2 morado">SELECCIONE LA CARTILLA</label>
                                            <input type="file" name="cartilla" class="form-control" accept=".jpg, .jpeg, .png , .pdf" id="img" required>
                                            <div class="text-center my-3 img-vista"> <img src="" id="imgPreview" alt="imgPreview"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class=" my-3">
                                    <input type="submit" class="boton color-morado" value="Subir Cartilla" name="btnUpdateCartilla">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include_once('view/templates/footer.php'); ?>