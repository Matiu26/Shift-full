<?php include("funcAgr.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguridad Viera</title>
    <link rel="stylesheet" href="styles1.css">
    <link rel="stylesheet" href="../../../src/estilos.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="imgs" href="../../../src/imgs/favicon.png.png">
    <?php 
        error_reporting(0);
        session_start();
    require_once("miapp_user.php");
    $sesion_i = $_SESSION['session_username'];

    if ($sesion_i == null ||  $sesion_i = "") {
    
        echo '
        <script language="javascript">
        alert("No has iniciado sesión");
        </script>
        ';
        header('refresh: 0; url=login.php');
        die();
    }
    $sesion_i = $_SESSION['session_username'];

    if(existe_jefe($sesion_i)==true){

    } else{
   
       echo '
       <script language="javascript">
       alert("No  tienes el rol necesario");
       </script>
       ';
       header('refresh: 0; url=../productos/pags/index.php');
       die();
    }
     ?>
</head>
<body class="mx-5 md:mx-10 font-Comfortaa" >
  <header class="flex justify-around flex-wrap items-center bg-blue-900 rounded md:px-10 ">


    <div class="flex items-center flex-shrink-0 text-whit ">
      <img class="h-10 sm:h-14 inline" src="../../../src/imgs/Logo.png" alt="">
      <span class="text-sm text-white sm:text-lg md:tex-3xl  font-semibold"><a href="../productos/pags/index.php">Ropa de seguridad Viera</a> </span>

    </div><link rel="stylesheet" href="">
    <div class="block ml-16 sm:ml-52 md:ml-0 md:hidden ">
      <button id='boton' class="flex text-2xl items-center  px-1 py-0.5 sm:px-2.5 sm:py-1.5 md:mr-5 border 
      rounded text-white font-semibold border-whiteS hover:text-white
       hover:border-white md:hidden">
       <ion-icon name="menu"></ion-icon>
      </button>

    </div>
    <div id="menu" class="w-full mt-0 md:mt-5 hidden flex-grow md:flex md:items-center md:w-auto text-end ">
      <div  class="text-md md:flex-grow text-center items-cenetr mb-5  md:text-end justify-center items-cenetr ">

        <a href="../productos/pags/index.php" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b mr-4">
          Inicio
        </a>
        <a href="" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b mr-4">
          Contacto
        </a>
        <a href="" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b mr-4">
          Nosotros
        </a>
        <a href="../sesiones/logout.php" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b mr-4">
          Cerrar Sesión
        </a>
        <!-- <div x-data="{ open: false }" class="inline">
          <div class="inline">
            <button x-on:click="open = ! open" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b">
              Iniciar sesion
            </button>
          </div>
          
          <div x-show="open" class="absolute text-center right-24 sm:right-60 md:right-11 mx-3 md:mx-0  z-10 border border-black bg-blue-900
                                  mt-7 w-40 origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <a href="login.php" class="block mx-4 py-1 text-sm text-white hover:border-b" role="menuitem" tabindex="-1" id="user-menu-item-0">Ingresar</a>
            <a href="registrarse.php" class="block mx-4 py-1 text-sm text-white hover:border-b" role="menuitem" tabindex="-1" id="user-menu-item-1">Registrarse</a>
          </div>
        </div> -->
          
      </div>
      
    </div>
    
  </header>



  

  
  <nav class="mt-2 hidden md:flex md:justify-center">
        <div class="  flex justify-center  id="menuCategorias">
          <ul x-show="open" class=" hidden md:flex  items-center bg-slate-800 rounded">
            <li><a href="../productos/Pags/Cascos.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/casco.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Cascos</p></a></li>
            <li><a href="../productos/Pags/Chalecos.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Chaleco.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Chalecos</p></a></li>
            <li><a href="../productos/Pags/Uniformes.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Uniforme.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Uniformes</p></a></li>
           
            <li><a href="../productos/Pags/Combos.php"><img class="h-11 px-5 m-2 mt-2" src="../../../src/imgs/Combos.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Combos</p></a></li>
            <li><a href="../productos/Pags/Ofertas.php"><img class="h-11 px-5 m-2 mt-2" src="../../../src/imgs/Ofertas.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Ofertas</p></a></li>
            <li><a href="../productos/Pags/Botas.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Botas.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Botas</p></a></li>


          </ul>
        </div>
      </nav> 
    
      <div class="flex mb-10">
     
        <div  class="  flex-col w-auto md:hidden absolute mt-1 lg:left-0 mr-5
                    text-center bg-slate-800 rounded h-auto mb-10 ">
          <button id="boton2" class=" flex my-3  m-auto">
            <span class=" text-white text-2xl  left-4 cursor-pointer md:hidden" >
              <i class="bi bi-filter-left px-3 py-1 left-4 cursor-pointer rounded-md "></i>
            </span>
          </button> 

          <div id="menu2" class="flex-col hidden mx-14">
            <div class="text-gray-100  text-xl">
              <div class="px-2.5 flex items-center">
              </div> 
            </div>
          <div class="p-2.5 mt- flex items rounded-md px-4 duration-300
                      cursor-pointer bg-gray-700 text-white ">
            <i class="bi bi-search font-bold text-sm " ></i>        
            <input type="text" class="text-[15px] ml-4 w-full bg-transparent
                focus:outline-none" placeholder="Buscar...">    
          </div>
          
          <div class="p-2.5  flex items-center justify-between rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white" >
                      <a href="../productos/Pags/Cascos.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/casco.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Cascos</p>
                    <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
          </div>
          
  
          <div class="p-2.5  flex items rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white">
                      <a href="../productos/Pags/Chalecos.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Chaleco.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Chalecos</p>        
                      <span class="text-sm m-auto p-auto" id="arrow">
                        <i class="bi bi-chevron-down"></i>    
                     </span>
          </div>
          <div class="p-2.5  flex items rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white">
                      <a href="../productos/Pags/Uniformes.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Uniforme.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Uniformes</p>        
                      <span class="text-sm m-auto p-auto" id="arrow">
                        <i class="bi bi-chevron-down"></i>    
                     </span>
          </div>
          <div class="p-2.5  flex items rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white">
                      <a href="../productos/Pags/Botas.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Botas.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-center">Botas</p>        
                      <span class="text-sm m-auto p-auto" id="arrow">
                        <i class="bi bi-chevron-down"></i>    
                     </span>
          </div>
          <div class="p-2.5  flex items rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white">
                      <a href="../productos/Pags/Ofertas.php"><img class="h-7 m-2 p-auto inline" src="../../../src/imgs/Ofertas.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Ofertas</p>        
                      <span class="text-sm m-auto p-auto" id="arrow">
                        <i class="bi bi-chevron-down"></i>    
                     </span>
          </div>
          <div class="p-2.5  flex items-center justify-between rounded-md px-4 duration-300
                      cursor-pointer hover:bg-blue-700 text-white">
                      <a href="../productos/Pags/Combos.php"><img class="h-7 m-2 p-auto inline" src="../../../src/imgs/Combos.png" alt=""></a>  
                      <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Combos</p>        
                      <span class="text-sm m-auto p-auto" id="arrow">
                        <i class="bi bi-chevron-down"></i>    
                     </span>
          </div>
  
        </div>           
                 

                 

      </div>



      
        
        
       
      
      
      
        <div class="flex flex-col w-full mx-14 ">
          <div class="flex  w-full mt-5">
            <h2 class="text-lg md:text-3xl mx-auto pb-4 w-full text-center border-b border-gray-300">Agregar usuario</h2>
          </div>
          <div class="flex h-screen flex-col border-b border-gray-400 mt-10">

            <form  class="form" name="formulario" method="post" action="">

              <br> <input class="controls" placeholder="Nombre" type="text" name="nom" required maxlength="30" size="40"> <br>

              <br> <input class="controls" placeholder="Apellido" type="text" name="ape" required maxlength="30" size="40"> <br>

              <br> <input class="controls"placeholder="Email" type="email" name="mail" required maxlength="30" size="40"> <br>

              <br> <input class="controls" placeholder="Contraseña" type="password" name="pass" required maxlength="30" size="40"> <br>

              <br> 
              <select name="rol" onchange="" id="elemento"> <br><br>
                <option value="0">Selecciona un Rol</option> <br>
                <option value="1">Vendedor</option>
                <option value="2">Comprador </option>
                <option value="3">Jefe </option>


              </select>
                <br>
                <br> <input class="botons" type="submit" value="Agregar Usuario" name="agregar"> <br>
                <br> <a href="../../dise/accion.php" class="regresar">Regresar</a> <br>
            </form>
         
          </div>
        
        </div>
  
      </div>
  
  <footer class="flex h-auto ">
    <div class="flex flex-col w-full bg-blue-900 rounded">
  
      <div class="   ">
        <div class="  grid grid-cols-1 md:grid-cols-3 w-full ">
  
          <div class="flex col-span-1  sm:col-span-3 justify-center items-center">
             <!-- quiero que no se achique -->
            <img class="h-16 md:h-24 lg:h-28 inline" src="../../../src/imgs/Logo.png" alt="">
            <span class="font-semibold text-xl md:text-2xl text-white tracking-tight">
              Ropa de Seguridad
            </span>
          </div>
    
          <div class="m-auto mt-3 p-auto h-auto">
             <h4 class="mb-2 md:pt- sm:w-40 w-auto font-semibold border-b mr-3 text-white">
              Cuenta
            </h4> 
            <a href="" class="text-white">Mi cuenta</a> <br>
            <a href="" class="text-white">Favoritos</a> <br>
            <a href="" class="text-white">Carrito</a>  <br>
            <a href="" class="text-white">Cerrar/Iniciar Sesión</a>
          </div>
  
          <div class="m-auto mt-3 p-auto h-auto">
            <h4 class="mb-2 sm:w-40 w-auto font-semibold border-b mr-3 text-white">
              Empresa
            </h4>
            <a href="" class="text-white">Envios</a> <br>
            <a href="" class="text-white">Metodos de pago</a>  <br>
            <a href="" class="text-white">Politicas de garantía</a> 
          </div>
  
          <div class="m-auto mt-3 p-auto h-auto">
            <h4 class="mb-2 ml-5 md:ml-9 font-semibold border-b mr-3 text-white">
              Redes y contactos
            </h4> 
            <ul class="flex ml-5 hover:text-white">
        
              <li><a href=""><img class="w-12 rounded-full mx-2 " src="../../../src/imgs/Instagram_logo_2022.svg" alt=""></a></li>
              <li><a href=""><img class="w-12 rounded-full mx-2 " src="../../../src/imgs/Instagram_logo_2022.svg" alt=""></a></li>
              <li><a href=""><img class="w-12 rounded-full mx-2 " src="../../../src/imgs/Instagram_logo_2022.svg" alt=""></a></li>
        
            </ul>
          </div>
    
             
        </div>
        <div class="w-full h-5 my-1 ">
          &copy; Copyright
        </div>
      </div>
  
    </div>
  
  </footer>
      
  <script src="../../../src/app.js"></script>
  <script src="../../../src/jquer.js"></script>
  
</body>
  
</html>
  
  
  <!--<npx tailwindcss -i ./src/input.css -o ./src/estilos.css --watch>  -->
   