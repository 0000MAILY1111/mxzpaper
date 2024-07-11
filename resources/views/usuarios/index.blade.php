

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Papeleria</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">

      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
            <!-- bootstrap css -->
            <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!-- Button light dark -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      
      
    
   </head>
   <!-- body -->
   <body class="main-layout">


      <!-- header -->
      <header>
         @if(session('success'))
         <div class="bg-green-200 text-green-800 p-4 mt-4 rounded">
        
            {{ session('success') }}
         </div>
         <div class="content-area">
    <!-- Contenido que cambiará entre modos claro y oscuro -->
        </div>
        
         @endif
         <!-- header inner -->


         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           {{-- <div class="logo">
                              <a href="#"><img src="images/logo.png" alt="#" /></a>
                           </div> --}}
                        </div>
                     </div>
                  </div>


<!-- Añadir esto en tu archivo blade donde quieres los botones -->
<div class="mode-switch" >
    <button id="light-mode">Modo Claro</button>
    <button id="dark-mode">Modo Oscuro</button>
</div>

<!-- Añadir esto en tu archivo blade donde quieres los botones -->


<button id="fontArial">Arial</button>
<button id="fontTimes">Times New Roman</button>
<button id="fontVerdana">Verdana</button>
 
<!-- Botones para ajustar el tamaño de la letra -->
<div class="size-switch">
    <button id="increase-font">+</button>
    <button id="decrease-font">-</button>
</div>


<style>
/* Estilos para modo claro */
.light-mode {
    background-color: white;
    color: black;
}

/* Estilos para modo oscuro */
.dark-mode  {
    background-color: black;
    color: white;
}


/* Estilos para el modo oscuro */
.dark-mode .bg-white {
    background-color: #333; /* Fondo oscuro */
    color: white; /* Texto claro */
}
/* tipo de letra */
.font-arial {
    font-family: Arial, sans-serif;
}

.font-times {
    font-family: 'Times New Roman', serif;
}

.font-verdana {
    font-family: Verdana, sans-serif;
}
</style>

<script>
// Función para cambiar a modo claro
function setLightMode() {
    document.body.classList.add('light-mode');
    document.body.classList.remove('dark-mode');
}

// Función para cambiar a modo oscuro
function setDarkMode() {
    document.body.classList.add('dark-mode');
    document.body.classList.remove('light-mode');
}

// Añadir event listeners a los botones
document.getElementById('light-mode').addEventListener('click', setLightMode);
document.getElementById('dark-mode').addEventListener('click', setDarkMode);


///manejo de funtes de los botones
document.addEventListener('DOMContentLoaded', () => {
    const textBg = document.querySelector('.text_norlam');

    document.getElementById('fontArial').addEventListener('click', () => {
        textBg.className = 'text_norlam font-arial';
    });

    document.getElementById('fontTimes').addEventListener('click', () => {
        textBg.className = 'text_norlam font-times';
    });

    document.getElementById('fontVerdana').addEventListener('click', () => {
        textBg.className = 'text_norlam font-verdana';
    });
});


///manejo del tamaño 
document.addEventListener('DOMContentLoaded', () => {
    const increaseFontBtn = document.getElementById('increase-font');
    const decreaseFontBtn = document.getElementById('decrease-font');
    let fontSize = 16; // Tamaño inicial de la fuente en píxeles

    increaseFontBtn.addEventListener('click', () => {
        fontSize++;
        document.body.style.fontSize = fontSize + 'px';
    });

    decreaseFontBtn.addEventListener('click', () => {
        if (fontSize > 1) { // Evita un tamaño de fuente negativo o cero
            fontSize--;
            document.body.style.fontSize = fontSize + 'px';
        }
    });
});

</script>

                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item">
                                 <a class="nav-link" href="#about">Sobre Nosotros</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="#contact">Contactanos</a>
                              </li>
                           </ul>
                           @guest
                              <div class="sign_btn">
                                 <a href="/login">Ingresar</a>
                              </div>
                           @else

                           @role('Administrador')
                           <div class="sign_btn">
                              <a href="/dashboard">DASHBOARD</a>
                           </div>
                           @endrole

                           <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <div class="sign_btn">
                                  <button type="submit" class="text-white bg-transparent border-none">
                                      CERRAR SESION
                                  </button>
                              </div>
                          </form>

                           @endguest

                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->
      <!-- banner -->


      <section class="banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="text-bg">
                     <div class="padding_lert">
                       <!--  <h1 style="color: white">Bienvenido a nuestra Papeleria </h1>
                        <p>Aquí encontrarás todo lo que necesitas para tu colegio, empleo o negocio</p> -->
                           
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>


      <div class="choose">
         <div class="container">
            <div class="titlepage">

               <h2><span class="text_norlam">Elige uno de nuestros Productos disponibles</span>
             <div class="row">
                 @foreach ($productos as $producto)
                 <div class="col-md-4">
                     <div class="bg-black rounded-lg shadow-lg p-4 mb-4">


                         <img src="{{ asset('storage/productos/'. $producto->photourl) }}" alt="Imagen de la habitación" class="w-full h-40 object-cover mb-4">
                         <p class="text-lg font-bold">ID: {{ $producto->id }}</p>
                         <p class="text-sm">Nombre: {{ $producto->name }}</p>
                         <p class="text-sm">Precio: {{ $producto->price }}</p>
                         <!-- Otros datos de la habitación -->
                         <div class="mt-4">
                             <a href="{{ route('productoscliente.show', $producto->id) }}" class="btn btn-primary text-black px-4 py-2 rounded-md">Información</a>
                             @auth
                             <a href="{{ route('productos.reserva', $producto->id) }}" class="btn btn-success text-black px-4 py-2 rounded-md">Comprar</a>
                             @endauth
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>

      <!-- end banner -->
      <!-- choose  section -->
      <div class="choose">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <div class="choose_box">
                     <div class="titlepage">

             <h2><span class="text_norlam">Elige lo mejor <br>Todo para el Éxito Escolar </span>
                     </div>
                     <p>Descubre Nuestra Amplia Gama de Artículos Escolares de Calidad</p>
                     <a class="read_more" href="#">Leer más</a>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="img_box">
                           <figure><img src="images/img1.jpg" alt="#"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="images/img2.jpg" alt="#"/></figure>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="img_box">
                           <figure><img src="images/img3.jpg" alt="#"/></figure>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <!-- end choose  section -->
      <!-- our  section -->
      <div class="our">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="img_box">
                     <figure><img src="images/img4.jpg" alt="#"/></figure>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="our_box">
                     <div class="titlepage">
                        <h2><span class="text_norlam">Preparados para el  </span> <br>Éxito</br></h2>
                     </div>
                     <p> Destino Escolar Comienza Aquí con Nuestros Artículos de Papelería</p>
                     <a class="read_more" href="#">Leer más</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end our  section -->
      <!-- about -->
      <div id="about"  class="about">
         <div class="container-fluid">
            <div class="row d_flex">
               <div class="col-md-6">
                  <div class="about_text">
                     <div class="titlepage">
           

                        <h2><span class="text_norlam">Sobre nuestra Papeleria</span>  </h2>
                        <p>Buscamos ser la mejor papeleria en Bolivia dando la mejor atención al cliente y los mejores precios</p>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="about_img">
                     <figure><img src="images/img2.jpg" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->

      <!--  footer -->
      <footer id="contact">
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="titlepage">

                        <h2> Contactanos</h2>
                     
                     <div class="cont">

                        <p>Estamos disponibles las 24 horas del día para responder a tus preguntas y atender tus necesidades. No dudes en comunicarte con nosotros.</p>
                     </div>
                  </div>
                  </div>

               </div>
            </div>

         </div>
      </footer>
      <!-- end footer -->
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
   </body>
</html>

