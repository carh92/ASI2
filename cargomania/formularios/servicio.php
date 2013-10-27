<!DOCTYPE html>
<html>
  <head>
    <meta content="text/html; charset=windows-1252" http-equiv="content-type">
   
    <title>Cargomania - Servicio nuevo</title>
<style type="text/css">
#caja_busqueda /*estilos para la caja principal de busqueda*/
{
width:400px;
height:25px;
border:solid 2px #979DAE;
font-size:16px;
}
#display /*estilos para la caja principal en donde se puestran los resultados de la busqueda en forma de lista*/
{
width:400px;
display:none;
overflow:hidden;
z-index:10;
border: solid 1px #666;
}
.display_box /*estilos para cada caja unitaria de cada usuario que se muestra*/
{
padding:2px;
padding-left:6px; 
font-size:18px;
height:63px;
text-decoration:none;
color:#3b5999; 
}

.display_box:hover /*estilos para cada caja unitaria de cada usuario que se muestra. cuando el mause se pocisiona sobre el area*/
{
background: #7f93bc;
color: #FFF;
}
.desc
{
color:#666;
font-size:16;
}
.desc:hover
{
color:#FFF;
}

/* Easy Tooltip */
</style>
<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery.watermarkinput.js"></script>

<script type="text/javascript">
$(document).ready(function(){

$(".busca").keyup(function() //se crea la funcioin keyup
{
var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a search.php
if(texto=='')//si no tiene ningun valor la caja de texto no realiza ninguna accion
{
}
else
{
$.ajax({//metodo ajax
type: "POST",//aqui puede  ser get o post
url: "b_cliente.php",//la url adonde se va a mandar la cadena a buscar
data: dataString,
cache: false,
success: function(html)//funcion que se activa al recibir un dato
{
$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
  }
});
}return false;    
});
});
jQuery(function($){//funcion jquery que muestra el mensaje "Buscar amigos..." en la caja de texto
   $("#caja_busqueda").Watermark("Escriba Nombre Cliente ....");
   });
</script>


<script type="text/javascript">
function popup(url,ancho,alto) {
var posicion_x; 
var posicion_y; 
posicion_x=(screen.width/2)-(ancho/2); 
posicion_y=(screen.height/2)-(alto/2); 
window.open(url, "", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y+"");
}
</script> 

<?php


$objServicio = new Cargomania;
$agente="";
if(isset($_GET["id"])){
  $consultarContenedor=$objContenedor->mostrar_contenedor($_GET["id"]);
  if($consultarContenedor->rowCount()==1){
    $contene=$consultarContenedor->fetch(PDO::FETCH_OBJ);
    $proveedor=$contene->fk_proveedor;


  }

}

$objServicio2 = new Cargomania;
$agente="";
if(isset($_GET["id"])){
  $consultarBodega=$objBodega->mostrar_serviciobodega($_GET["id"]);
  if($consultarBodega->rowCount()==1){
    $contene=$consultarBodega->fetch(PDO::FETCH_OBJ);
    $bodega=$contene->fk_servi_bod;
    

  }

}













?>






  </head>
  <body> 
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="4" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Cliente</span>
          
           <a href="javascript:popup('?mod=agregar_cliente',1100,600)"><img
              title="Agregar cliente" src="imagenes/botones/agregar.png" align="right"></a>
          
         
         
          <a href="javascript:popup('?mod=agregar_cliente',1100,600)"><img

              title="Editar cliente" src="imagenes/botones/editar.png" align="right"></a> <img

              </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Codigo</td>
          <td><input class="text_area" name="test" disabled="disabled" value="007"

              type="text"></td>
          <td class="categoria_cliente">País cliente</td>
          <td class="categoria_cliente_derecha"> <label class="text_area">El
              Salvador</label> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Fecha</td>
          <td><input class="text_area" name="test" disabled="disabled" value="11/11/11"

              type="text"></td>
          <td class="categoria_cliente">Direccion cliente</td>
          <td> <label class="text_area">Colonia General Arce, Calle Jorge
              Domínguez # H-4 - San Salvador</label></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Hora</td>
          <td><input class="text_area" name="test" disabled="disabled" value="02:34 p.m."

              type="text"></td>
          <td class="categoria_cliente">Telefono</td>
          <td> <label class="text_area">2257-7777</label> </td>
        </tr>
        <tr><form action="b_cliente.php" method="get">
          <td class="categoria_cliente">Nombre cliente</td>
          <td>
             <div style=" width:250px; padding-left:3px; " >
           <input type="text" class="busca" id="caja_busqueda" name="ncliente"  /></div></br>
           <div id="display"></div>
          </form>
          <br>
          <br>
          </td>
          <td class="categoria_cliente">Tarifa</td>
          <td><label class="text_area">$500</label> </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="10" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Informacion
              de la carga</span><a href="?mod=agregar_agentebodega"> <a href="javascript:popup('?mod=agregar_agentebodega',900,600)"><img

              title="Agregar Bodega" src="imagenes/botones/agregar.png" align="right"></a>
               <a href="javascript:popup('?mod=agregar_agentebodega',900,600)"><img

              title="Editar Bodega" src="imagenes/botones/editar.png" align="right"></a></td>
        </tr>
        <tr class="cat_titulo">
          <td>Bultos</td>
          <td>Peso</td>
          <td>Volumen (opcional)</td>
          <td>Tipo carga</td>
          <td>Servicio bodega</td>
          <td>Bodega</td>
          <td>N° Contenedor</td>
          <td>N° Sello</td>
          <td>Estado</td>
          <td>Agregar</td>
        </tr>
        <tr>
          <td> <input class="text_area2" name="test" placeholder="1000" type="text">
          </td>
          <td> <input class="text_area2" name="test" placeholder="1000 lbs" type="text">
          </td>
          <td> <input class="text_area2" name="test" placeholder="8.7 m3" type="text">
          </td>
          <td> <input class="text_area3" name="test" placeholder="Computadoras"

              type="text"> </td>
          <td>         
              <select class="select_style_bodega">
            
                <!--  fin  -->




                <!-- fin-->








          <td> <select class="select_style_bodega">
              <option value="0" selected="selected">San geronimo</option>
            </select> </td>
          <td> <input class="text_area2" name="test" placeholder="SMLV 123456-7"

              type="text"> </td>
          <td> <input class="text_area2" name="test" placeholder="01443" type="text">
          </td>
          <td>
            <select class="select_status_style">
              <option value="0" selected="selected">En espera...</option>
              <option value="1">Cargado</option>
              <option value="2">Pendiente</option>
              <option value="3">Anulado</option>
            </select>
          </td>
          <td align="center"> <img src="imagenes/botones/plus.png"></img> </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="2" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Proveedor</span><a href="?mod=agregar_proveedor"> <a href="javascript:popup('?mod=agregar_proveedor',900,600)"><img

              title="Agregar cliente" src="imagenes/botones/agregar.png" align="right"></a>
               <a href="javascript:popup('?mod=agregar_proveedor',900,600)"><img

              title="Editar cliente" src="imagenes/botones/editar.png" align="right"></a></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Nombre proveedor</td>
          <td>
           
              <select name="lstAgente" id="lstAgente" class="select_style">
      <?php 
      $consultarProveedor=$objServicio->consultar_proveedores();
      if($consultarProveedor->rowCount()>0){
        echo "<option value='0'>Elija un agente</option>";
        while($proveedor=$consultarProveedor->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($proveedor->proveedor_id==$proveedor && $proveedor!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $proveedor->proveedor_id ?>" <?php echo $selected; ?>><?php echo $proveedor->nombre_prov ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay proveedores</option>
      <?php
      }
      ?>
    </select>
          </td>
        </tr>
        <tr>
         
           <td class="categoria_cliente">Pais</td>
          <td>
           
              <select name="lstAgente" id="lstAgente" class="select_style">
      <?php 
      $consultarProveedor=$objServicio->consultar_proveedores();
      if($consultarProveedor->rowCount()>0){
        echo "<option value='0'>Elija un agente</option>";
        while($proveedor=$consultarProveedor->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($proveedor->proveedor_id==$proveedor && $proveedor!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $proveedor->proveedor_id ?>" <?php echo $selected; ?>><?php echo $proveedor->pais_prov ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay proveedores</option>
      <?php
      }
      ?>
    </select>
          </td>





        </tr>
        <tr>
           <td class="categoria_cliente">Direccion Proveedor</td>
          <td>
           
              <select name="lstAgente" id="lstAgente" class="select_style">
      <?php 
      $consultarProveedor=$objServicio->consultar_proveedores();
      if($consultarProveedor->rowCount()>0){
        echo "<option value='0'>Elija un agente</option>";
        while($proveedor=$consultarProveedor->fetch(PDO::FETCH_OBJ)){
      ?>
      <?php if($proveedor->proveedor_id==$proveedor && $proveedor!=""){
        $selected=" selected";
      }else{
        $selected="";
      } ?>
          <option value="<?php echo $proveedor->proveedor_id ?>" <?php echo $selected; ?>><?php echo $proveedor->direccion ?></option>
      <?php
        }
      }else{
      ?>
        <option value="0">No hay proveedores</option>
      <?php
      }
      ?>
    </select>
          </td>
        </tr>
      </tbody>
    </table>
    <hr>
    <table class="formulario" border="0" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="5" rowspan="1" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Naviera</span><a href="?mod=agregar_proveedor"> <a href="javascript:popup('?mod=agregar_proveedor',900,600)"><img

              title="Agregar Naviera" src="imagenes/botones/agregar.png" align="right"></a>
               <a href="javascript:popup('?mod=agregar_proveedor',900,600)"><img

              title="Editar Naviera" src="imagenes/botones/editar.png" align="right"></a></td>
        </tr>
        <tr>
          <td class="categoria_cliente">Dia salida</td>
          <td><input class="text_area" name="test" type="date"> </td>
          <td class="categoria_cliente">Tipo transporte</td>
          <td>
            <select class="select_status_style">
              <option value="0" selected="selected" style="background-image:url(images/tipsy-east.gif);">MARÍTIMO</option>
              <option value="1" style="background-image:url(images/tipsy-east.gif);">AEREO</option>
              <option value="2" style="background-image:url(images/tipsy-east.gif);">TERRESTRE</option>
            </select>
          </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Dia llegada</td>
          <td><input class="text_area" name="test" type="date"> </td>
          <td class="categoria_cliente">Nombre barco</td>
          <td><input class="text_area" name="test" placeholder="HANSA KRISTIANSAND"

              type="text"> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Puerto salida</td>
          <td><input class="text_area" name="test" placeholder="CRISTOBAL" type="text">
          </td>
          <td class="categoria_cliente">Aduana</td>
          <td><input class="text_area" name="test" placeholder="ANGUIATU" type="text">
          </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Puerto llegada</td>
          <td><input class="text_area" name="test" placeholder="SANTO TOMAS DE CASTILLA"

              type="text"> </td>
          <td class="categoria_cliente">N° Booking</td>
          <td><input class="text_area" name="test" placeholder="CZL 07-13" type="text">
          </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Destino final</td>
          <td><input class="text_area" name="test" placeholder="BODESA" type="text">
          </td>
          <td class="categoria_cliente">N° BL</td>
          <td><input class="text_area" name="test" placeholder="73283HBL-54594"

              type="text"> </td>
        </tr>
        <tr>
          <td class="categoria_cliente">Nombre naviera</td>
          <td><select class="select_style_naviera">
              <option value="0" selected="selected">Navivan</option>
            </select>
          </td>
          <td class="categoria_cliente">Pais naviera</td>
          <td>            <select class="select_style_naviera">
              <option value="0" selected="selected">Estados Unidos</option>
              <option value="1">Japon</option>
            </select></td>
        </tr>
      </tbody>
    </table>
    </br>
    <center>
<button value="Cancelar" name="cancelar">CANCELAR</button>
<button value="Cargar" name="cargar">GUARDAR</button>
</center>
    </br> 
    </br>
    <hr>
    <table class="formulario" border="1" cellpadding="0" cellspacing="0">
      <tbody>
        <tr>
          <td colspan="13" class="titulo" style="background-image:url(images/bar.jpg); 
              background-repeat: repeat-x;"><span class="tittle_text">Movimientos
              en cola</span><br>
          </td>
        </tr>
        <tr class="cat_titulo">
          <td>N°</td>
          <td>Proveedor</td>
          <td>Cliente</td>
          <td>Bultos</td>
          <td>Peso Kgs</td>
          <td>Volumen</td>
          <td>Descripcion</td>
          <td>Servicio bodega</td>
          <td>Bodega</td>
          <td>Tipo Movimiento</td>
          <td>Estado</td>
          <td>Editar </td>
          <td>Eliminar </td>
        </tr>
        <tr>
          <td>SAL0501</td>
          <td>SAMSUNG ELECTRONICS LATINOAMERICA SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>3</td>
          <td>1300.00</td>
          <td>8.84</td>
          <td>REPRODUCTOR DVD</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0502</td>
          <td>SYL INTERNATIONAL</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>1</td>
          <td>1177.00</td>
          <td>1.00</td>
          <td>CADENAS, EMPATE DE CADENAS, BALINERA DE BOLA</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0503</td>
          <td>CONNEXION ZONA LIBRE SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>181</td>
          <td>3291.04</td>
          <td>10.97</td>
          <td>ACCESORIOS PARA AUTOS</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0504</td>
          <td>NORITEX SA</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>647</td>
          <td>6393.02</td>
          <td>31.74</td>
          <td>ARTICULOS PARA EL HOGAR</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
        <tr>
          <td>SAL0505</td>
          <td>ZAGA ENTERPRISSE</td>
          <td>DISTRIBUIDORA AGELSA SA DE CV</td>
          <td>70</td>
          <td>578.00</td>
          <td>2.44</td>
          <td>PANTALONES CORTOS PARA HOMBRES</td>
          <td>CINCHAS GRUESAS</td>
          <td>SAN GERONIMO</td>
          <td>MARÍTIMO</td>
          <td>En espera...</td>
          <td align="center"><img title="Editar" src="imagenes/botones/editar.png">
          </td>
          <td align="center"><img title="Eliminar" src="imagenes/botones/eliminar.gif">
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
