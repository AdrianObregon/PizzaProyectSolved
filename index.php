<?php

if (!isset($_GET['action'])) {
	$_GET['action'] = '';
}
session_start();

switch($_GET['action']){

	case 'addTopping': 
		$result = array();
		$result['errormsg'] = '';
		$result['success'] = 0;

		if (isset($_GET['topping']) && strlen(str_replace(' ', '', $_GET['topping'])) > 0 ) {
			if (!isset($_SESSION['toppings'])) {
				$_SESSION['toppings'] = array();
			}
			$_SESSION['toppings'][] = $_GET['topping'];
			$result['success'] = 1;
		} else {
			$result['success'] = 0;
			$result['errormsg'] = 'No Topping Entered';
		}

		echo json_encode($result);
		exit;
	break;

	case 'getToppings'; 
		$result = array();
		$result['errormsg'] = '';
		$result['success'] = 1;
		$result['toppings'] = array();

		if (isset($_SESSION['toppings'])) {
			$result['toppings'] = $_SESSION['toppings'];
			$result['success'] = 1;
		}

		echo json_encode($result);
		exit;
	break;

	case 'deleteTopping':

		$result = array();
		$result['errormsg'] = '';
		$result['success'] = 0;

		$toppingsBefore = count($_SESSION['toppings']);
		$toppings = $_SESSION['toppings'];

		if(sizeof($_SESSION['toppings']) > 1){
			array_splice($_SESSION['toppings'], $_GET['toppingId'], 1);
		}else{
			unset($_SESSION['toppings']);
		}

		if(!isset($_SESSION['toppings'])){
			$result['success'] = 1;
			echo json_encode($result);
			return;
		}

		if(count($_SESSION['toppings']) < $toppingsBefore){
			$result['success'] = 1;
		}else{
			$result['errormsg'] = "The topping was not removed";
		}
		echo json_encode($result);
		exit;
	break;

	default: 
		printForm();
}


function printForm()
{ ?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Pizza</title>
    <script src="./jquery.min.js"></script>
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="stylesheet" href="./lib/fontawesome/css/all.min.css">
    <link rel="shortcut icon" href="./img/logo.png">
    <title>World Pizza</title>
</head>

<body>
    <!--Menu principal-->
    <div class="menu-principal">
        <div class="logo" id="logo">
            <img src="./img/logo.png" alt="logo">
            <!--LOGO DE LA PAGINA-->
        </div>
        <div class="menu-bar" id="menuBar">
            <i class="fas fa-angle-right" id="btnMenuClose"></i>
            <!--Flecha para cerrar-->
            <nav class="enlaces" id="enlaces">
                <ul>
                    <li><a href="#servicios">Services</a></li>
                    <li><a href="#equipo">Team</a></li>
                    <li><a href="#contacto">Craft Your Own</a></li>
                </ul>
            </nav>
            <div class="sociales">
                <a href=""><span class="fab fa-facebook"></span></a>
                <a href=""><span class="fab fa-instagram"></span></a>
                <a href=""><span class="fab fa-twitter"></span></a>
                <a href=""><span class="fab fa-youtube"></span></a>
            </div>
        </div>
        <i class="fas fa-bars" id="btnMenuOpen"></i>

    </div>

    <!--Slider de productos-->
    <section id="menu-productos">
        <div class="contenedor-principal">
            <button id="btn-izquierda"><span class="fas fa-angle-left"></span></button>
            <div class="slider">
                <div class="container-productos">
                    <div class="descripcion-productos">
                        <h2>Premium <b>Product</b></h2>
                        <h1>Peperonni</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed numquam laborum
                            rerum iure deserunt hic voluptas dignissimos</p>
                            <button href="#contacto" class="btn"><a href="#contacto">Order Here!</a>  <span class="fas fa-angle-right"></span></button>
                    </div>

                    <div class="imagen-productos">
                        <img src="./img/menu/peperoni.png" alt="">
                    </div>
                </div>
                <div class="container-productos">
                    <div class="descripcion-productos">
                        <h2>Premium <b>Product</b></h2>
                        <h1>Special</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed numquam laborum
                            rerum iure deserunt hic voluptas dignissimos</p>
                            <button href="#contacto" class="btn"><a href="#contacto">Order Here!</a>  <span class="fas fa-angle-right"></span></button>
                    </div>

                    <div class="imagen-productos">
                        <img src="./img/menu/especial.png" alt="">
                    </div>
                </div>
                <div class="container-productos">
                    <div class="descripcion-productos">
                        <h2>Premium <b>product</b></h2>
                        <h1>Margarita</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed numquam laborum
                            rerum iure deserunt hic voluptas dignissimos</p>
                        <button href="#contacto" class="btn"><a href="#contacto">Order Here!</a>  <span class="fas fa-angle-right"></span></button>
                    </div>

                    <div class="imagen-productos">
                        <img src="./img/menu/margarita.png" alt="">
                    </div>
                </div>
                <div class="container-productos">
                    <div class="descripcion-productos">
                        <h2>Premium <b>Product</b></h2>
                        <h1>American</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed numquam laborum
                            rerum iure deserunt hic voluptas dignissimos</p>
                        <button href="#contacto" class="btn"><a href="#contacto">Order Here!</a>  <span class="fas fa-angle-right"></span></button>
                    </div>

                    <div class="imagen-productos">
                        <img src="./img/menu/americana.png" alt="">
                    </div>
                </div>
                <div class="container-productos">
                    <div class="descripcion-productos">
                        <h2>Special <b>Product</b></h2>
                        <h1>Supreme</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed numquam laborum
                            rerum iure deserunt hic voluptas dignissimos</p>
                        <button href="#contacto" class="btn"><a href="#contacto">Order Here!</a>  <span class="fas fa-angle-right"></span></button>
                    </div>

                    <div class="imagen-productos">
                        <img src="./img/menu/suprema.png" alt="">
                    </div>
                </div>
            </div>


            <button id="btn-derecha"><span class="fas fa-angle-right"></span></button>

        </div>

    </section>

    <!--SECCION SERVICIOS-->
    <section id="servicios">
        <div class="servicios-titulos">
            <h2 class="subtitulos">World's Best Pizza</h2>
            <h1 class="titulos">Welcome to WorldPizza</h1>
        </div>
        <div class="servicios-container">
            <div class="imagen-central">
                <img src="./img/mitad-mitad.png" alt="">
            </div>

            <div class="items calidad">
                <p><span class="fas fa-pizza-slice"></span></p>
                <p class="titulo-item">Quality</p>
                <p class="texto-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam quidem tempora
                    eaque!</p>
            </div>

            <div class="items ingredientes">
                <p><span class="fas fa-cheese"></span></p>
                <p class="titulo-item">Ingredients</p>
                <p class="texto-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam quidem tempora
                    eaque!</p>
            </div>

            <div class="items rapidez">
                <p><span class="fas fa-clock"></span></p>
                <p class="titulo-item">Always in time</p>
                <p class="texto-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam quidem tempora
                    eaque!</p>
            </div>

            <div class="items delivery">
                <p><span class="fas fa-shipping-fast"></span></p>
                <p class="titulo-item">Delivery</p>
                <p class="texto-item">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam quidem tempora
                    eaque!</p>
            </div>


        </div>
    </section>

    <!--SECCION DE EQUIPO-->
    <section id="equipo">
        <div class="persona">
            <img src="./img/perfil1.png" alt="" class="persona-imagen">
            <div class="persona-info">
                <h2>Jesus Alonso</h2>
                <p>Pizza Chef</p>
                <div class="social-media">
                    <a href=""><span class="fab fa-facebook"></span></a>
                    <a href=""><span class="fab fa-instagram"></span></a>
                    <a href=""><span class="fab fa-twitter"></span></a>
                    <a href=""><span class="fab fa-linkedin-in"></span></a>
                </div>
            </div>
        </div>
        <div class="persona">
            <img src="./img/perfil2.png" alt="" class="persona-imagen">
            <div class="persona-info">
                <h2>Eliza Smith</h2>
                <p>Chef</p>
                <div class="social-media">
                    <a href=""><span class="fab fa-facebook"></span></a>
                    <a href=""><span class="fab fa-instagram"></span></a>
                    <a href=""><span class="fab fa-twitter"></span></a>
                    <a href=""><span class="fab fa-linkedin-in"></span></a>
                </div>
            </div>
        </div>
        <div class="persona">
            <img src="./img/perfil3.png" alt="" class="persona-imagen">
            <div class="persona-info">
                <h2>Henry Griffith</h2>
                <p>Chef Assistant</p>
                <div class="social-media">
                    <a href=""><span class="fab fa-facebook"></span></a>
                    <a href=""><span class="fab fa-instagram"></span></a>
                    <a href=""><span class="fab fa-twitter"></span></a>
                    <a href=""><span class="fab fa-linkedin-in"></span></a>
                </div>
            </div>
        </div>
        <div class="persona">
            <img src="./img/perfil4.png" alt="" class="persona-imagen">
            <div class="persona-info">
                <h2>Paulina Vega</h2>
                <p>Assistant</p>
                <div class="social-media">
                    <a href=""><span class="fab fa-facebook"></span></a>
                    <a href=""><span class="fab fa-instagram"></span></a>
                    <a href=""><span class="fab fa-twitter"></span></a>
                    <a href=""><span class="fab fa-linkedin-in"></span></a>
                </div>
            </div>
        </div>
    </section>

   <section id="contacto">
       <div class="titulo-contacto">
           <h2 class="subtitulos">Craft your own pizza</h2>
           <h1 class="titulos">Add your favourite toppings</h1>
       </div>

        <form action="" id="formulario">
            <div class="two-fiels">
                <div class="inputConIcon">
                <input type="text" name="topping" id="topping" value="" class="input-text" placeholder="Put your topping here">
                <i class="fas fa-pizza-slice"></i>
                </div>
                

            </div>

            <div class="fiels">
                <div class="inputConIcon textareaIcon">
                <ul id="listToppings" class="textarea"></ul>
                    
                   
                    <i class="fas fa-comments"></i>
                </div>
            </div>

            <div class="fiels-btn">
                <button class="btn btn-input"type="button" onclick="addTopping()">Add it!</button>
                
            </div>
            
        </form>

   </section>

    <script src="./js/app.js"></script>
    <script src="./index.js"></script>
</body>

</html>
<?php
}
?>