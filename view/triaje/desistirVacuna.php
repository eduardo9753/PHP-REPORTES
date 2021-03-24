<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form action="index.php?ruta=desistirUpdate" method="POST">
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
                                    <label for="" class="my-2 morado">ACTIVIDAD</label>
                                    <input type="text" class="form-control" name="txt_actividad" value="<?php echo $dataPersonal->actividad; ?>" readonly>
                                </div>

                            </div>


                            <!--  <div class="col-md-6 mx-auto">
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
                                    </div>
                                </div>
                            </div>  -->

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="" class="my-2 morado">HORARIO BRIGADAS</label>
                                            <input type="text" class="form-control" name="cboBrigradas" value="<?php echo $dataPersonal->tipo_brigada; ?>" readonly>
                                            <label for="" class="text-center my-3">FECHA DE REGISTRO</label>
                                            <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="txt_fecha_actual" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="" class="my-2 morado">OBSERVACIONES</label>
                                            <textarea name="txtObservacion" id="" class="form-control" readonly><?php echo "DESISTIO A VACUNARSE"; ?></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <label for="" class="my-2 morado">Foto</label>
                                        <img src="<?php echo $dataPersonal->foto ?>" class="img-fluid" alt="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
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
                                            <input type="text" class="form-control" name="cboPlanilla" value="<?php echo $dataPersonal->nombre_planilla; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="my-2 morado">FECHA ACTUAL</label>
                                            <input type="text" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="txt_fecha_actual" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="card my-3">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="" class="text-center my-2 morado">EN CASO QUE APLIQUE </label>
                                            <select name="cboEstado" id="estado" class="form-control mt-3">
                                                <option value="3">DESISTO DE LA VACUNACION</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group my-3">
                                    <div class=" mx-auto">
                                        <input type="submit" class="boton color-morado" value="REVOCAR A LA VACUNA" name="btnDesistir">
                                    </div>
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