<?php
require_once('../config/sesiones.php');
if ($_SESSION['Rol'] == 'ADMINISTRADOR') {
    $_SESSION['rutas'] = 'Dashboard'
?>


    <!DOCTYPE html>

    <html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

    <head>
        <?php require_once('./html/head.php') ?>
    </head>

    <body>
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                <?php require_once('html/menu.php') ?>

                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Navbar -->

                    <?php require_once('html/header.php') ?>

                    <!-- / Navbar -->

                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">
                            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">RegAsis /</span> <?php echo $_SESSION["rutas"] ?></h4>
                            <iframe name="base" id="base" src="graficos.php" style="border: none;" width="100%" height="1000px"></iframe>
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <?php require_once('html/footer.php') ?>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        </div>
        <!-- / Layout wrapper -->


        <?php include_once('html/scripts.php') ?>
        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->

    </body>

    </html>

<?php
} else {
    header('Location:../login.php');
}

?>