<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>



<main>
    <section class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-4">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?ruta=excelDatos" method="POST">
                            <div class="form-group">
                                <label for="" class="my-2 morado">Planilla</label>
                                <select name="cboPlanilla" class="form-control" id="">
                                    <?php foreach ($dataPlanilla as $data) : ?>
                                        <option value="<?php echo $data->id_planilla ?>"><?php echo $data->nombre_planilla ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="my-2 morado">Tipos</label>
                                <select name="cboEstado" class="form-control" id="">
                                    <!--  <option value="0">Sin Vacunacion</option> -->
                                    <option value="1">Vacunados</option>
                                    <option value="2">Revocados</option>
                                    <option value="3">Desistieron</option>
                                    <option value="4">Vacunado por otro centro de Saludad</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="my-2 morado">Fecha de Registro</label>
                                <input type="date" class="form-control" name="txt_fecha_registro" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="boton color-excel my-3" value="Generar Excel" name="btn_excel">
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-5 mx-auto mt-4">
                <div class="card">
                    <div class="card-body">
                       <h3 class="text-center morado">Reportes Generales</h3>
                       <a href="index.php?ruta=VacunadosGeneral" class=" boton color-excel my-3">Personal General</a>
                       <a href="index.php?ruta=VacunadoSegundaDosis" class=" boton color-excel my-3">Personal Dosis Completa</a>
                       <a href="index.php?ruta=VacunadosPrimeraDosisMarzo" class=" boton color-excel my-3">Personal Primera Dosis</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include_once('view/templates/footer.php'); ?>