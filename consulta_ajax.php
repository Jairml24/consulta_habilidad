<?php
include_once('class.php');
$objDatos=new Contador();
if($_POST['tipo_busqueda']==0)
{
    $datos=$objDatos->Buscar_Contador_Dni($_POST['dni']);
}

else if($_POST['tipo_busqueda']==1)
{
    $datos=$objDatos->Buscar_Contador_Nombres($_POST['nombres']);
}

else{
   $datos=$objDatos->Buscar_Contador_Ccp($_POST['ccp']);
}


$html='<table class="table" style="font-size:13px;width:96%;margin-left:2%">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Dni</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">CCP</th>
                <th scope="col">Fecha incorporacion</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>';
			$i=1;

foreach ($datos as $dato) {
	$html.='<tr class="info">
				<td class="p-2" >'.$i++.'</td>	
				<td  class="p-2">'. $dato->DNI .'</td>
				<td  class="p-2">' .utf8_encode($dato->NOMBRES) .'</td>
				<td  class="p-2">' .utf8_encode($dato->APELLIDO_PATERNO.' '.$dato->APELLIDO_MATERNO) .'</td>
				<td  class="p-2">' .$dato->CCP .'</td>
				<td  class="p-2">' .$dato->FECHA_INCORPORACION .'</td>
				<td  class="p-2">' .utf8_encode($dato->ESTADO) .'</td>

            </tr>	';
}  

// $html.='</tbody>
//     </table>';
		
// $data=$html;

print json_encode($html);	
?>