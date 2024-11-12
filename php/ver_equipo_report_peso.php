<?php
session_start();
include "../../../lib/template.inc";
include "../../../lib/link_msq.php";
include "../../../lib/check.php";
include "../../../lib/functions.php";

$t = new Template('../templates');
$t->set_file(array(
	"ver"			=> "ver_report_peso.html", 
	"un"			=> "un_registro_peso.html",
	));

/* -- VARIABLES GENERALES -- */
//consulto si se recibe la variable por GET o POST
if(isset($_GET["id_syscomp07"])){
	$id_syscomp07 = $_GET["id_syscomp07"];
}else{
	$id_syscomp07 = $_POST["id_syscomp07"];
}
//si se recibe la variable y no está vacía aplico un filtro
$filtro = (isset($id_syscomp07) && $id_syscomp07 != "")? " where id_syscomp07 = $id_syscomp07" : "";

//$qr="Select syscomp01_nombre, syscomp01_nombre from sys_comp_01_cab_equipo join ".$filtro;
$qr="SELECT
equi.id_syscomp01,
equi.syscomp01_nombre,
SUM(equi_pez.syscomp07_peso) AS Peso_Total,
equi.syscomp01_codigo_embarcacion,
equi.syscomp01_tipo_embarcacion,
equi.syscomp01_potencia,
loca.syscomp03_nombre AS Localidad,
prov.syscomp04_nombre AS Provincia,
pais.syscomp05_nombre AS Pais
FROM sys_comp_01_cab_equipo AS equi
JOIN sys_comp_03_cab_localidad AS loca ON equi.rela_syscomp03=loca.id_syscomp03
JOIN sys_comp_04_cab_provincia AS prov ON loca.rela_syscomp04=prov.id_syscomp04
JOIN sys_comp_05_cab_pais AS pais ON prov.rela_syscomp05=pais.id_syscomp05
JOIN sys_comp_07_cab_equipo_pescado AS equi_pez ON equi.id_syscomp01=equi_pez.rela_syscomp01
GROUP BY equi.syscomp01_nombre ORDER BY Peso_Total DESC";



$result_sum = flex_query($qr,$link_msq);	
while ($row_sum = flex_fetch_assoc($result_sum))
{
	$t->set_var("syscomp01_nombre",$row_sum["syscomp01_nombre"]);
	$t->set_var("syscomp07_peso",$row_sum["Peso_Total"]);
	$t->set_var("syscomp07_largo",$row_sum["Provincia"]);
	$t->set_var("syscomp05_nombre",$row_sum["Pais"]);
	$t->parse("LISTADO","un",true);

}
$t->pparse("OUT", "ver");
?>