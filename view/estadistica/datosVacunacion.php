<?php include_once('view/templates/header.php'); ?>

<?php include_once('view/templates/nav.php'); ?>

<main>
  <section class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mx-auto">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-2">
                  <p class="center">Sin Vacunación <?php echo $porcentajeSinVacuna ?> %</p>
                  <input type="text" class="vacuna borde-no-vacunado" id="personalSinVacunacion" value="<?php echo $personalSinVacuna ?>" readonly>
                </div>
                <div class="col-md-2">
                  <p class="center">Vacunados <?php echo $porcentajeConVacuna ?> %</p>
                  <input type="text" class="vacuna borde-vacunado" id="personalVacunado" value="<?php echo $personalConVacuna ?>" readonly>
                </div>
                <div class="col-md-2">
                  <p class="center">Disistieron <?php echo $porcentajeDesistir ?> %</p>
                  <input type="text" class="vacuna borde-desistir" id="personalDesistio" value="<?php echo $personalDesistir ?>" readonly>
                </div>
                <div class="col-md-3">
                  <p class="center">Vacunacion Externa <?php echo $porcentajeOtroCentroSalud ?> %</p>
                  <input type="text" class="vacuna borde-otro-centro" id="personalVacunadoOtroSalud" value="<?php echo $personalOtroCentroSalud ?>" readonly>
                </div>
                <div class="col-md-3">
                  <p class="center">Total <?php echo $porcentajeTotal ?> %</p>
                  <input type="text" class="vacuna totales" id="personalTotal" value="<?php echo $personalTotal ?>"readonly>
                </div>
              </div>
              <div class="myChart">
                <canvas id="myChart"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once('view/templates/footer.php'); ?>