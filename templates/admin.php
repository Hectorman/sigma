<header>

    <img class="logo" src="assets/img/sigma-logo.png" alt="Sigma" />
    
    <h1>Listado de usuarios</h1>

</header><!-- /header -->

<main class="admin-page">

    <div class="container">

        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 

                        foreach( $data['usuarios'] as $usuario ) {

                    ?>

                        <tr>
                            <th scope="row"><?php echo $usuario['id']; ?></th>
                            <td><?php echo $usuario['nombre']; ?></td>
                            <td><?php echo $usuario['email']; ?></td>
                            <td><?php echo $usuario['departamento']; ?></td>
                            <td><?php echo $usuario['ciudad']; ?></td>
                        </tr>

                    <?php } ?>
                    
                </tbody>
            </table>
        </div>

    </div><!-- /container -->

</div><!-- /main -->

