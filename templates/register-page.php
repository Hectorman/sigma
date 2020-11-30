<header>

    <img class="logo" src="<?php echo $data['site_url']; ?>/assets/img/sigma-logo.png" alt="Sigma" />
    
    <h1>Prueba de desarrollo Sigma</h1>

    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

</header><!-- /header -->

<main class="register-page">

    <div class="container">
    
        <div class="row">

            <div class="col-12 col-md-6">

                <img src="<?php echo $data['site_url']; ?>/assets/img/sigma-image.png" alt="Imagen sigma" />

            </div><!-- /col -->

            <div class="col-12 col-md-6">

                <form class="register-form" method="POST" action="<?php echo $data['site_url']; ?>/index.php?route=nuevo-registro">

                    <div class="form-group">
                        <label for="departamento">Departamento*</label>
                        <div class="select-wrapper">
                            <select class="form-control" name="departamento">
                                <option value="" disabled selected>Seleccionar...</option>
                                <?php foreach( $data['ciudades'] as $departamento => $municipios ) { ?>
                                    <option value="<?php echo $departamento; ?>"><?php echo $departamento; ?></option>
                                <?php } ?>
                            </select>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </div>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="ciudad">Ciudad*</label>
                         <div class="select-wrapper">
                            <select disabled class="form-control" name="ciudad">
                                <option value="" disabled selected>Seleccionar...</option>
                            </select>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"></path>
                            </svg>
                        </div>
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="nombre">Nombre*</label>
                        <input type="text" class="form-control" name="nombre">
                    </div><!-- /form-group -->

                    <div class="form-group">
                        <label for="email">Correo*</label>
                        <input type="email" class="form-control" name="email">
                    </div><!-- /form-group -->

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary rounded-pill">
                            <span class="loader spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="text">ENVIAR</span>
                        </button>
                    </div><!-- /form-group -->

                    <div style="display:none" class="alert alert-success alert-dismissible fade show" role="alert">
                        Tu información ha sido recibida satisfactoriamente
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div style="display:none" class="alert alert-danger alert-dismissible fade show" role="alert">
                        Error al guardar, por favor inténtelo de nuevo más tarde
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                </form><!-- /register-form -->

            </div><!-- /col -->

        </div><!-- /row -->

    </div><!-- /container -->

</main><!-- /main -->