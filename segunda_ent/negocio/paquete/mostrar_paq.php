<?php include("funcPaquete.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguridad Viera</title>
    <link rel="stylesheet" href="../../../src/estilos.css">
    <link rel="icon" type="imgs" href="../../../src/imgs/favicon.png.png">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">  
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
        <?php
          error_reporting(0);
        session_start();
$sesion_i = $_SESSION['session_username'];
if ($sesion_i == null ||  $sesion_i = "") {

?>
        <div x-data="{ open: false }" class="inline">
          <div class="inline">
            <button x-on:click="open = ! open" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b">
              Iniciar sesion
            </button>
          </div>
          
          <div x-show="open" class="absolute text-center right-24 sm:right-60 md:right-11 mx-3 md:mx-0  z-10 border border-black bg-blue-900
                                  mt-7 w-40 origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
            <a href="../usuario/login.php" class="block mx-4 py-1 text-sm text-white hover:border-b" role="menuitem" tabindex="-1" id="user-menu-item-0">Ingresar</a>
            <a href="../usuario/registrarse.php" class="block mx-4 py-1 text-sm text-white hover:border-b" role="menuitem" tabindex="-1" id="user-menu-item-1">Registrarse</a>
          </div>
        </div>
          
      </div>
      
    </div>
    <?php
  } else{
    ?>
 <a href="../sesiones/logout.php" class="block w-full md:w-auto mt-4 md:inline-block md:mt-0 text-white hover:border-b mr-4">
 <?php  echo $_SESSION['session_username'];?>          
        </a>
    <?php
}
?>
  </header>
  
  <nav class="mt-2 hidden md:flex md:justify-center">
        <div class="  flex justify-center  id="menuCategorias">
          <ul x-show="open" class=" hidden md:flex  items-center bg-slate-800 rounded">
            <li><a href="../productos/Pags/Cascos.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/casco.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Cascos</p></a></li>
            <li><a href="../productos/Pags/Chalecos.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Chaleco.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Chalecos</p></a></li>
            <li><a href="../productos/Pags/Uniformes.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Uniforme.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Uniformes</p></a></li>
            <li><input class="h-6" type="text"></li>
            <li><img class="h-6 p-1 border"src="../../../src/imgs/Lupa2.png" alt=""></li>            
            <li><a href="../productos/Pags/Ofertas.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Ofertas.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Ofertas</p></a></li>
            <li><a href="../productos/Pags/Combos.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Combos.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Combos</p></a></li>
            <li><a href="../productos/Pags/Botas.php"><img class="h-10 px-5 m-2 mt-2" src="../../../src/imgs/Botas.png" alt=""><p class="flex text-white justify-center hover:border-b mb-2 mx-3">Botas</p></a></li>


          </ul>
        </div>
      </nav> 
  

  
      <div class="flex">
     
      
      
     <div  class="  flex-col w-full md:hidden  mt-1 lg:left-0 
                   text-center bg-slate-800 rounded h-auto">
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
                     <a href="../Pags/Cascos.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/casco.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Cascos</p>
                   <span class="text-sm m-auto p-auto" id="arrow">
                      <i class="bi bi-chevron-down"></i>    
                   </span>
         </div>
         
 
         <div class="p-2.5  flex items rounded-md px-4 duration-300
                     cursor-pointer hover:bg-blue-700 text-white">
                     <a href="../Pags/Chalecos.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Chaleco.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Chalecos</p>        
                     <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
         </div>
         <div class="p-2.5  flex items rounded-md px-4 duration-300
                     cursor-pointer hover:bg-blue-700 text-white">
                     <a href="../Pags/Uniformes.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Uniforme.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Uniformes</p>        
                     <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
         </div>
         <div class="p-2.5  flex items rounded-md px-4 duration-300
                     cursor-pointer hover:bg-blue-700 text-white">
                     <a href="../Pags/Botas.php"><img class="h-6 m-2 p-auto inline" src="../../../src/imgs/Botas.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-center">Botas</p>        
                     <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
         </div>
         <div class="p-2.5  flex items rounded-md px-4 duration-300
                     cursor-pointer hover:bg-blue-700 text-white">
                     <a href=""><img class="h-7 m-2 p-auto inline" src="../../../src/imgs/Ofertas.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Ofertas</p>        
                     <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
         </div>
         <div class="p-2.5  flex items-center justify-between rounded-md px-4 duration-300
                     cursor-pointer hover:bg-blue-700 text-white">
                     <a href="../Pags/Combos.php"><img class="h-7 m-2 p-auto inline" src="../../../src/imgs/Combos.png" alt=""></a>  
                     <p class=" m-auto p-auto text-sm md:text-lg text-white justify-between">Combos</p>        
                     <span class="text-sm m-auto p-auto" id="arrow">
                       <i class="bi bi-chevron-down"></i>    
                    </span>
         </div>
 
       </div>           
                

     </div>

   </div>  

     
   <div>
      <div class="flex flex-col h-auto  mt-5 mx-0 md:mx-14">     
          

        <div class="flex h-full md:flex-rows mb-5">

          <div class="">
            <div class="hidden w-40 h-60 mr-10 mt-5 bg-blue-900 rounded hidden md:flex flex-col justify-around">
              <img src="../../../src/imgs/Combos.png" alt="">
            </div>  
            
            <div class="hidden w-40 h-60 mr-10 mt-3 bg-blue-900 rounded hidden md:flex flex-col justify-around">
              <img src="../../../src/imgs/Ofertas.png" alt="">
            </div> 
          </div>
          
          <div>
            
          </div>
          
          <div class="flex flex-col w-auto  
          py-5  border border-gray-200 flex-grow rounded mt-5 ">

          
            
            <div class="flex w-auto justify-center mb-5 ">
                <h2 class="mb-3 text-2xl w-28  border-b border-gray-200 shadow-md text-center font-semibold"><?php echo $nom?> </h2>
            </div>

            <div class=" mx-5 flex justify-center">
              <div class="flex  flex-col ">
                <div class="flex  h-48 w-48 md:h-64 md:w-64  items-center border border-gray-100 p-3 rounded border-r border-black">
                <?php echo $foto ?>
                </div> 

                <div class=" justify-center w-full mt-3 p-3 flex md:hidden">
                <button class="" name="a" type="submit">
                    <p class="text-sm md:text-lg p-2 text-white w-auto bg-blue-600 rounded">
                    <a href="../productos/carrito/funcAgrCarrito.php?ID=<?php echo $IDpa; ?>"><?php echo "Agregar al carrito" ?> </a>
                  </p> 
                    </button> 
                </div>
                <div class="flex-col md:hidden mt-3 ">
                  <div class="w-28  border-black">
                    <p class="font-bold text-2xl text-blue-900 ">$<?php echo $pre ?></p>
                  </div>  
  
                  <div class="flex mt-3 flex-col justify-between ">
                        
                    
                  </div>
                  

                </div>
                  
                  
                </div>
                
                <div class="hidden md:flex ">
                  <div class="flex flex-col justify-between mx-5 mb-2">
                    <div class="w-28  border-black ">
                      <p class="font-bold text-2xl text-blue-900 ">$<?php echo $pre ?></p>
                    </div>  
  
                    <div class="flex mt-3 flex-col justify-between ">

                 
                      
                      <div class="w-full text-center mt-3">
                      <button class="" name="a" type="submit">
                    <p class="text-sm md:text-lg p-2 text-white w-auto bg-blue-600 rounded">
                    <a href="../productos/carrito/funcAgrCarrito.php?ID=<?php echo $IDpa; ?>"><?php echo "Agregar al carrito" ?> </a>
                  </p> 
                  <br> <a href="javascript:history.back()"> Regresar</a>
                    </button> 
                      </div>
                    </div>

                  </div>
                </div>

                

              </div>
              <div class=" flex flex-col m-3 mt-5  ">
                <h3 class="border-b border-gray-200 shadow-sm border-r w-28 text-center">Descripcion</h3>
                <p class="mt-5 border border-gray-300 pb-10 p-5 w-full  shadow-md"><?php echo $desc?></p>
              </div>
              <br>
              <h2 class="text-lg md:text-3xl mx-auto pb-4 w-full text-center border-b border-gray-300">Paquetes Similares</h2>  
          </div>          

           
          <?php
require_once("miapp_paquete.php");

$c = mysqli_query($con, "SELECT * FROM VIEW_PAQUETES_CON_IMAGEN WHERE id != '$IDpa' limit 4") or die(mysqli_error($con));
$productos_relacionados = mysqli_fetch_all($c);
shuffle($productos_relacionados);
foreach ($productos_relacionados as $filas) {
    $IDp2 = $filas[0];
    $nom2 = $filas[2];
    $descu2 = $filas[4];
    $pre2 =$filas[3];
    $pre2 = $filas[3]- (($filas[3] * $descu2)/ 100);
    $foto2= '<img  src="'.$filas[6].'"    width="190"  alt="" srcset="">';
?>

        </div>
        <div class=" w-full  h-auto m-auto grid grid-cols-2 justify-center  sm:grid-cols-3 lg:grid-cols-4 place-items-center ">
          
          <div class="">
          <a href="mostrar_paq.php?ID=<?php echo $IDp2; ?>"><?php echo $foto2 ?> </a>
        <?php echo $nom2;?><br>
       <?php echo "$".$pre2;?><br>
     
          </div>
          <div class="h-48 w-32  sm:h-52 md:w-36 md:h-64 md:w-48 bg-slate-900 mb-5 rounded">

          </div>
          <div class="h-48 w-32  sm:h-52 md:w-36 md:h-64 md:w-48 bg-slate-900 mb-5 rounded">

          </div> 
          <div class="h-48 w-32  sm:h-52 md:w-36 md:h-64 md:w-48 bg-slate-900 mb-5 rounded">
            
          </div>
        </div>
        <?php
          }
       ?>
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
