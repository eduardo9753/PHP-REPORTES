<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>


<main>
    <section class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?ruta=registros&pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a></li>
                            <?php for ($i = 0; $i < $paginas; $i++) : ?>
                                <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="index.php?ruta=registros&pagina=<?php echo $i + 1 ?>"><?php echo $i + 1; ?></a></li>
                            <?php endfor; ?>
                            <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="index.php?ruta=registros&pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>DNI</th>
                                        <th>NOMBRE</th>
                                        <th>APELLIDO MATERNO</th>
                                        <th>APELLIDO PATERNO</th>
                                        <th>NACIMIENTO</th>
                                        <th>ACTIVIDAD</th>
                                        <th>PROFESION</th>
                                        <th>ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($paginacionData as $data) : ?>
                                        <tr>
                                            <td><?php echo $data->idDNI; ?></td>
                                            <td><?php echo $data->nombre; ?></td>
                                            <td><?php echo $data->apellidoPaterno; ?></td>
                                            <td><?php echo $data->apellidoMaterno; ?></td>
                                            <td><?php echo $data->fecha; ?></td>
                                            <td><?php echo $data->actividad; ?></td>
                                            <td><?php echo $data->profesion; ?></td>
                                            <td> <a href="index.php?ruta=dataPersonal&id=<?php echo $data->idDNI; ?>" class="btn btn-warning">Actualizar</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


<?php include_once('view/templates/footer.php'); ?>