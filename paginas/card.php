<div class="col-md-4">
  <div class="card mb-4 shadow-sm">
    <img src="<?php echo $platos['imgurl']; ?>" class="plato_img" alt="" />
    <div class="card-body">
      <p class="card-text">
      <h1><?php echo $platos['nombre_plato']; ?></h1>
      </p>
      <div class="d-flex justify-content-between align-items-center">
        <a type="button" href="./paginas/detalle.php" data-toggle="modal" data-target="#modalPlatoId<?php echo $platos['id_plato']; ?>" class="btn btn-sm btn-outline-primary btn-block">
          Ver plato
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade " id="modalPlatoId<?php echo $platos['id_plato']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="<?php echo $platos['imgurl']; ?>" class="plato_img" alt="" />
            <div class="row value_card">
                <div class="col-7">
                <h1><?php echo $platos['nombre_plato']; ?> </h1>
                </div>
                <div class="col value_card_val">
                    <h3>$ <?php echo $platos['valor']; ?></h3>
                </div>
            </div>
            <h2><span class="badge badge-secondary"><?php echo $platos['nombre_categoria']; ?></span></h2>
            <p><?php echo $platos['desc_plato']; ?></p>
        </div>
      </div>
    </div>
  </div>