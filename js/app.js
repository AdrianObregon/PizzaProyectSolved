// Menu Responsive

var btnMenuOpen = document.getElementById("btnMenuOpen"),
btnMenuClose = document.getElementById("btnMenuClose"),
menuResponsive = document.getElementById("menuBar"),
enlaces = document.getElementById("enlaces");

//Click abrir side bar
btnMenuOpen.addEventListener("click", function(){
    menuResponsive.classList.add("active");
});

//Click cerrar side bar
btnMenuClose.addEventListener("click", function(){
    menuResponsive.classList.remove("active");
});

//Cerrar menu con elementos de enlace
enlaces.addEventListener("click",function(){
    menuResponsive.style.transitionDelay="0.5s"
    menuResponsive.classList.remove("active");
})

// SLIDER DE PRODUCTOS
//NOTA QUERY SLECTOR ME PERMITE ENTRAR A CLASES Y ID'S
var contenedor = document.querySelector('.slider'),
    btnIzquierdo = document.getElementById("btn-izquierda"),
    btnDerecho = document.getElementById("btn-derecha");

    //EVENTO PARA EL BOTON DERECHO DEL SLIDER
    btnDerecho.addEventListener("click",function(){
        contenedor.scrollLeft += contenedor.offsetWidth;// movimiento del slider
        //+= porque avance ciertos pixeles para moverse
    });
    btnIzquierdo.addEventListener("click",function(){
        contenedor.scrollLeft -= contenedor.offsetWidth;// movimiento del slider
        //-= porque retrocedera ciertos pixeles para moverse
    });


    //Validacion de formulario

    var formulario= document.getElementById("formulario");

    function validar(e)
    {
        var inputNombre_
    }
    //eventos del formulario
    formulario.addEventListener("submit",validar);