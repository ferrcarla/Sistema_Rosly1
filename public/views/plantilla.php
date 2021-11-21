<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once 'template/meta.php'; ?>
    <?php require_once 'template/style.php'; ?>
    <title><?php echo (isset($titulo)) ? $titulo : 'Sin titulo'; ?></title>
</head>
<body>
    <div class="d-flex">
        <?php require_once 'template/left_menu.php'; ?>
        <div class="w-100">
            <?php require_once 'template/top_menu.php'; ?>
            <div id="content">
                <section>
                    <div class="container-fluid">                        
                        <?php
                        if (isset($contenido))
                            require_once($contenido);
                        ?>                        
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php require_once 'template/scripts.php'; ?>
</body>
</html>