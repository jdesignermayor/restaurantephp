<div class="container">
  <h1>
    Bienvenido
    <?php echo $_SESSION['usuario']; ?>
  </h1>
  <table class="table table-striped">
    <thead class="thead-light">
      <tr>
        <th scope="col">Producto</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
foreach ($platosArray as $alias) {?>
      <tr>
        <th scope="row"><?php echo $alias['nombre_plato']; ?></th>
        <td>
          <button
            class="btn btn-primary btn-block"
            data-toggle="modal"
            data-target="#modalPlatoId<?php echo $alias['id_plato']; ?>"
            type="submit"
          >
            Editar
          </button>
         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id_plato_eliminar" value="<?php echo $alias['id_plato']; ?>">
            <button class="btn btn-warning btn-block" type="submit">Eliminar</button>
        </form>
        </td>
      </tr>
      <?}
?>
    </tbody>
  </table>
</div>
<?foreach ($platosArray as $alias) {?>
<div
  class="modal fade"
  id="modalPlatoId<?php echo $alias['id_plato']; ?>"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close"
        >
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Url imagen</label>
            <input
              type="text"
              class="form-control"
              id="img"
              value="<?php echo $alias['imgurl']; ?>"
              name="imgurl"
            />
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Titulo del producto</label>
            <input
              type="text"
              class="form-control"
              id="titulo"
              name="nombre_plato"
              value="<?php echo $alias['nombre_plato']; ?>"
            />
          </div>
          <!-- <div class="form-group">
            <label for="exampleInputEmail1">Categoria</label>
            <br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="options" id="option1" checked> Active
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="options" id="option2"> Radio
                </label>
              </div>
          </div> -->

          <div class="form-group">
            <label for="exampleInputEmail1">Activar o inactivar</label>
            <br>
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active">
                  <input type="radio" name="activo" id="option1" value="1"> Activar
                </label>
                <label class="btn btn-secondary">
                  <input type="radio" name="activo" id="option2" value="2"> Inactivar
                </label>
              </div>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Valor</label>
            <input
            type="number"
            class="form-control"
            id="valor"
            name="valor"
            value="<?php echo $alias['valor']; ?>"
          />
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?php echo $alias['desc_plato']; ?></textarea>
          </div>
            <input type="hidden" name="id_plato_actualizar" value="<?php echo $alias['id_plato']; ?>">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>
