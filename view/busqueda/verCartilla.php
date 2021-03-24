<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
    <section class="mt-3">
        <div class="container">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?ruta=verCartillaPersonal" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-8 mx-auto">
                                    <div class="form-group">
                                        <h1 class="text-center morado">Digite su DNI para ve su cartilla</h1>
                                        <input type="text" value="" class="form-control" name="txt_dni" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row my-3">
                                <div class="col-md-8 mx-auto">
                                    <input type="submit" class="boton color-morado" value="Ver Datos" name="btnBuscar">
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