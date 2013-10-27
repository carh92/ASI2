<?php
$conex = pg_connect("host=localhost port=5434 dbname=cargomania user=postgres password=123456");
if($_POST)
{

$q=$_POST['ncliente'];//se recibe la cadena que queremos buscar
$sql_res=pg_query($conex,"select * from cliente where nom_represent like '%$q%' or apellido_represent like '%$q%' ");
while($row=pg_fetch_array($sql_res))
{
$id=$row['nombre_empr'];
$nombre=$row['nom_represent'];
$apellido=$row['apellido_represent'];
$direc=$row['nombre_empr'];


?>
<a href="usuario_completo.php?id=<?php echo $id; ?>" style="text-decoration:none;" >
<div class="display_box" align="left">
<div style="margin-right:6px;"><b><?php echo $nombre." ".$apellido; ?></b></div>
<div style="margin-right:6px; font-size:14px;" class="desc"><?php echo $direc; ?></div></div>
</a>

<?php
}

}
else
{

}


?>
