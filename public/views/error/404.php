<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>404 Page</title>

    <link href="<?php echo ROOT; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo ROOT; ?>resources/assets/css/style.css" rel="stylesheet">
</head>

<body class="error-page">
    <section>
        <div class="container ">
            <section class="error-wrapper text-center">
                <h1><img alt="" src="<?php echo ROOT; ?>resources/assets/images/404-error.png"></h1>
                <h2>Página no encontrada</h2>
                <h3>No pudimos encontrar esta página</h3>
                <a class="back-btn" href="<?php echo CONTROLLER ?>home"> Volver a inicio</a>
            </section>
        </div>
    </section>

    <!-- Placed js at the end of the document so the pages load faster -->
    <script src="<?php echo ROOT; ?>bootstrap/js/jquery-3.5.1.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/js/bootstrap.min.js"></script>

</body>

</html>