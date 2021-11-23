<?php
// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Rosly Alta Costura</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="img/logos.png">
		<link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/LineIcons.2.0.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/stile.css">
        <link rel="stylesheet" href="resources/assets/font/bootstrap-icons.css">
        <style>
        .container{padding: 20px;}
        input[type="number"]{width: 20%;}
        </style>
        <script src="resources/assets/js/jquery-3.5.1.min.js"></script>
        <script>
        function updateCartItem(obj,id){
            $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
                if(data == 'ok'){
                    location.reload();
                }else{
                    alert('Cart update failed, please try again.');
                }
            });
        }
        </script>
    </head>
    <body>
        
        <!-- =========== header start ============== -->
        <header class="header">
            <div class="navbar-area ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <nav class="navbar navbar-expand-lg bg-dark">
                                <a class="navbar-brand" href="index.php"><img src="img/logos.png" alt="Logo" width="80"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ml-auto">
                                        <li class="nav-item"><a class="page-scroll" href="#inicio">Inicio</a></li>
                                        <li class="nav-item"><a class="page-scroll active" href="#caracteristica">Tienda</a></li>          
                                    </ul>
                                </div> <!-- navbar collapse -->
                            </nav> <!-- navbar -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- container -->
            </div> <!-- navbar area -->

        </header>
        <!-- ======== header end ================ -->
     

        <!--========================= pedido ========================= -->    
        <section id="caracteristica" class="service-section gray-bg pt-150 pb-70">
            <div class="container">
                <h1>Carrito de compras</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($cart->total_items() > 0){
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach($cartItems as $item){
                        ?>
                        <tr>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '$'.$item["price"].' USD'; ?></td>
                            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                            <td><?php echo 'Bs'.$item["subtotal"].' BOB'; ?></td>
                            <td>
                                <a href="AccionCarta.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>" class="btn btn-danger" onclick="return confirm('Confirma eliminar?')"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                        <?php } }else{ ?>
                        <tr><td colspan="5"><p>Tu carta esta vacia.....</p></td>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><a href="articulos.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a></td>
                            <td colspan="2"></td>
                            <?php if($cart->total_items() > 0){ ?>
                            <td class="text-center"><strong>Total <?php echo 'Bs'.$cart->total().' BOB'; ?></strong></td>
                            <td><a href="Pagos.php" class="btn btn-success btn-block">Pagos <i class="glyphicon glyphicon-menu-right"></i></a></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </section>


        <!-- ========================= FOOTER start ========================= -->
        <footer class="footer gray-bg">
              <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="footer-links text-center">
                            <br>
                            <a href="index.php" class="logo"><img src="img/rosly.png" alt="" width="100"> </a>
                            <div class="footer-social-links">
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-filled"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-instagram-original"></i></a></li>
                                </ul>
                            </div>
                            <nav class="footer-menu">
                                <ul>
                                    <li><a href="#inicio">Inicio</a></li>
                                    <li><a href="#caracteristica">Servicios</a></li>
                                    <li><a href="#procesos">Procesos</a></li>
                                    <li><a href="#team">Team</a></li>
                                    <li><a href="#contact">Contactos</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="copyright-area text-center">
                    <p class="mb-0">Diseñado y desarrollado por: <a href="#" rel="nofollow" target="_blank">@Sonia Marlene Tinta Chambi</a></p>
                </div>
            </div>
        </footer>
        <!-- ========================= FOOTER end ========================= -->


        <!-- ========================= scroll-top ========================= -->
        <a href="#" class="scroll-top"><i class="lni lni-chevron-up"></i></a>

		<!-- ========================= JS here ========================= -->
		<script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/count-up.min.js"></script>
		<script src="js/wow.min.js"></script>
		<!-- <script src="js/main.js"></script> -->
        
    </body>
</html>
