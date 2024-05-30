<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $titulo ?></h1>
        <?php
        if (strpos($_SESSION['permisos'], 'w') !== false) {
            ?>
            <a href="/usuario/add" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Añadir usuario</a>
                <?php
            }
            ?>
    </div>
    <?php
    if (isset($mensaje)) {
        ?>
        <div class="col-12">
            <div class="alert alert-<?php echo $mensaje['class']; ?> d-flex align-items-center">
                <p class="mb-0"><?php echo $mensaje['texto']; ?></p>
            </div>
        </div>
        <?php
    }
    ?>

    <!-- DataTale -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Usarios</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <?php
                if (count($usuarios) > 0) {
                    ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">                    
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Email</th>                          
                                <th>Rol</th>
                                <th>Última conexión</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($usuarios as $u) {
                                ?>
                                <tr>
                                    <td><?php echo $u['nombre']; ?></td>
                                    <td><a href="mailto: <?php echo $u['email']; ?>"><?php echo $u['email']; ?></a></td>
                                    <td><?php echo $u['nombreRol']; ?></td>      
                                    <td><?php echo (isset($u['last_log'])) ? $u['last_log'] : '-'; ?></td>     
                                    <td>                              
                                        <a class="btn btn-success ml-1 mt-1 mb-1" href="/usuario/view/<?php echo $u['idUsuario']; ?>"><i class="fas fa-eye text-white"></i></a>
                                        <?php
                                        if (strpos($_SESSION['permisos'], 'w') !== false) {
                                            ?>
                                            <a class="btn btn-dark ml-1 mt-1 mb-1" href="/usuario/edit/<?php echo $u['idUsuario']; ?>"><i class="fas fa-edit text-white"></i></a>
                                            <a class="btn btn-danger ml-1 mt-1 mb-1" href="/usuario/delete/<?php echo $u['idUsuario']; ?>"><i class="fas fa-trash text-white"></i></a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            Total de registros: <?php echo count($usuarios); ?>
                        </tfoot>
                    </table>
                    <div id="pagination" class="mt-3 text-center">
                        <!-- Los controles de paginación son generados por JavaScript si es necesario-->
                    </div>
                    <?php
                } else {
                    ?>
                    <p class="text-danger">No existen registros.</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->