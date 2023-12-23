<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="card mt-2">
                <div class="card-header">

                    <div class="container">
                        <h1>
                            Vehiculos
                        </h1>
                        <button class="btn btn-primary m-2" data-toggle="modal" data-target="#modalAgregarUsuario">
                            Agregar vehiculo
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="modalAgregarUsuarioLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalAgregarUsuarioLabel">Agregar vehículo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="" name="carSubmit">
                                            <!-- ENTRADA PARA LA PLACA -->
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Placa</label>
                                                <input class="form-control" type="text" name="placa">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Modelo</label>
                                                <input class="form-control" type="text" name="modelo">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Color</label>
                                                <input class="form-control" type="text" name="color">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tipo</label>
                                                <input class="form-control" type="text" name="tipo">
                                            </div>
                                            <div class="modal-footer">

                                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>

                                                <input type="submit" class="btn btn-primary" name="signupSubmit" value="Subir Carro">

                                            </div>

                                            <?php

                                            $crearCarro = new ControladorCarros();
                                            $crearCarro->ctrCrearCarro();

                                            ?>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="myTable" class=" table align-middle datatable dt-responsive table-check" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Placa</th>
                                        <th>Modelo</th>
                                        <th>Color</th>
                                        <th>Tipo</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $instance = new modeloVehiculo();
                                    $cars = $instance->allCarros();

                                    foreach ($cars as $car) {
                                        echo "<tr>";
                                        echo "<td>{$car->Id}</td>";
                                        echo "<td>{$car->Placa}</td>";
                                        echo "<td>{$car->Modelo}</td>";
                                        echo "<td>{$car->Color}</td>";
                                        echo "<td>{$car->Tipo}</td>";
                                        echo "<td>";
                                        echo "<form method='post'>";
                                        echo "<input type='hidden' name='eliminarCarro' value='{$car->Id}'>";
                                        echo "<button type='submit' class='btn btn-danger eliminar-btn'>Eliminar</button>";
                                        echo "</form>";


                                        echo "</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                   



                                </tbody>

                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php



$borrarUsuario = new ControladorCarros;
$borrarUsuario->ctrBorrarCarro();



?>