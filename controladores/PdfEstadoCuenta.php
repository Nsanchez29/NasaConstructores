<?php

include '../modelos/conexion.php';

$IdUsuario = $_POST['idUs'];
$nombreUser = $_POST['nomUs'];
$fecha = date("d/m/y");


//INCLUIR LIBRERIA
include("../tcpdf/library/tcpdf.php");

$pdf = new tcpdf('P','mm','A4');

$pdf->startPageGroup();

$pdf->SetPrintHeader(false);
$pdf->setPrintFooter(false); 

$pdf->AddPage();

// ------------------- BLOQUE 2 -------------------
$bloque1 = <<<EOF

	<table>

		<tr>

			<td style="width:320px">
			
			<br>
			<br>
			<img src="../img/encabezado.png" width="280px" style="margin-left: 40px;">

			</td>

			

			<td style="width:220px">

        <br>
				<div style="font-size: 12px; text-align: right; line-height: 15px">
					
					<br>
					NASA CONSTRUCTORES

					<br>
					San Agustín Ac., El Progreso

          <br>
					$fecha

				</div>			

			</td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');


// ------------------- BLOQUE 2 -------------------
$qusuario = "SELECT nombre, usuario from usuario WHERE id_usuario = '$IdUsuario'";//colocar variable id usuario
                    $resultadoUser = mysqli_query($conexion,$qusuario);
                    
                    while($rowUser = mysqli_fetch_assoc($resultadoUser)){

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back2.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:400px">

				Nombre: <b>$rowUser[nombre]</b>

			</td>

			<td style="border: 1px solid #666; background-color:white; width:140px">

				Usuario: <b>$rowUser[usuario]</b>

			</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

}


// ------------------- EGRESOS -------------------
$Tituloegresos = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center"><b>EGRESOS</b></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($Tituloegresos, false, false, false, false, '');


// ------------------- BLOQUE 3 -------------------
$bloque3 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">No.</td>
		<td style="border: 1px solid #666; background-color:white; width:300px; text-align:center">Descripción</td>
    <td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Fecha</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Monto</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


// ------------------- BLOQUE 4 -------------------
$qegresos = "SELECT e.fecha as fecha, p.nombre as proyecto, e.descripcion as descripcion, e.monto as monto
  FROM egreso e
  INNER JOIN proyecto as p on p.id_proyecto = e.proyecto
  WHERE e.id_usuario = $IdUsuario 
  AND e.estado = 1"; //colocar la variable de id usuario arriba
  $resultado = mysqli_query($conexion,$qegresos);

  $i =0;

  while($rowB4 = mysqli_fetch_assoc($resultado)){
    $i ++;



$bloque4 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; border-left: 1px solid #666;  background-color:white; width:40px; text-align:center">
				
				$i
			
			</td>
			
			<td style="color:#333; background-color:white; width:300px;">
				
				$rowB4[descripcion]
			
			</td>

			<td style="color:#333; background-color:white; width:100px; text-align:right">
				
				$rowB4[fecha]
			
			</td>

			<td style="color:#333; border-right: 1px solid #666; background-color:white; width:100px; text-align:right">
				
				Q $rowB4[monto]
			
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');

}

// ------------------- BLOQUE TRANSFERENCIA -------------------
$bloqueTransfer = <<<EOF

<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center"><b>TRANSFERENCIAS</b></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloqueTransfer, false, false, false, false, '');

// ------------------- BLOQUE TRANSFERENCIAS -------------------
$qtansf = "SELECT * FROM transferencia WHERE id_usuario = '$IdUsuario'";
$resultadoT = mysqli_query($conexion,$qtansf);

  $i =0;

  while($rowT = mysqli_fetch_assoc($resultadoT)){
    $i ++;



$bloqueT = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; border-left: 1px solid #666;  background-color:white; width:40px; text-align:center">
				
				$i
			
			</td>
			
			<td style="color:#333; background-color:white; width:300px;">
				
				$rowT[descripcion]
			
			</td>

			<td style="color:#333; background-color:white; width:100px; text-align:right">
				
				$rowT[fecha]
			
			</td>

			<td style="color:#333; border-right: 1px solid #666; background-color:white; width:100px; text-align:right">
				
				Q $rowT[monto]
			
			</td>

		</tr>

    

	</table>

EOF;

$pdf->writeHTML($bloqueT, false, false, false, false, '');

}

// ------------------- INGRESOS -------------------
$Tituloingresos = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

  <tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

		<tr>
		
		<td style="border: 1px solid #666; background-color:white; width:540px; text-align:center"><b>INGRESOS</b></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($Tituloingresos, false, false, false, false, '');

// ------------------- BLOQUE 5 -------------------
$qingresos = "SELECT monto, descripcion, fecha
  FROM transferencia
  WHERE id_usuariodest = $IdUsuario
  AND estado = 1"; //colocar arriba la variable id usuario
  $resultado1 = mysqli_query($conexion,$qingresos);


  $i =0;
  while($row1 = mysqli_fetch_assoc($resultado1)){

  
    $i ++;



$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>

			<td style="color:#333; border-left: 1px solid #666;  background-color:white; width:40px; text-align:center">
				
				$i
			
			</td>
			
			<td style="color:#333; background-color:white; width:300px;">
				
				$row1[descripcion]
			
			</td>

			<td style="color:#333; background-color:white; width:100px; text-align:right">
				
				$row1[fecha]
			
			</td>

			<td style="color:#333; border-right: 1px solid #666; background-color:white; width:100px; text-align:right">
				
				Q $row1[monto]
			
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');

}

// ------------------- BLOQUE 6 -------------------
$bloque6 = <<<EOF

	<table>

		<tr>
		
			<td style="border-bottom: 1px solid #666; border-left: 1px solid #666; border-right: 1px solid #666; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque6, false, false, false, false, '');

// ------------------- BLOQUE 7 -------------------

$qtingreso = "SELECT SUM(monto) as ingreso FROM transferencia WHERE id_usuariodest = '$IdUsuario'";//colocar variable id usuario
                    $resultado = mysqli_query($conexion,$qtingreso);
                    
                    if($rowIngreso = mysqli_fetch_array($resultado)){

                        $ing= $rowIngreso['ingreso'];

                    }

                    $qtansf = "SELECT SUM(monto) as transf FROM transferencia WHERE id_usuario = '$IdUsuario'";
                    $resultadoT = mysqli_query($conexion,$qtansf);
                    
                    if($rowTrans = mysqli_fetch_array($resultadoT)){

                        $Transf= $rowTrans['transf'];

                    }


$qtegreso = "SELECT SUM(monto) as egreso FROM egreso WHERE id_usuario = '$IdUsuario'";//colocar variable id usuario
                    $resultado = mysqli_query($conexion,$qtegreso);
                    
                    if($rowEgreso = mysqli_fetch_array($resultado)){

                        $eg= $rowEgreso['egreso'];

                    }

$egreso = $eg + $Transf;

$cap = $ing-$egreso;


$bloque7 = <<<EOF

	<table style="font-size:10px; padding:5px 10px;">

		<tr>
		
			<td style="width:540px"></td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">Ingresos:
			</td>
      
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				Q $ing
			</td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">
				Egresos:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				Q $egreso
			</td>

		</tr>

		<tr>
		
			<td style="width:340px;"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:right">
				<b>Capital</b>:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right">
				<b>Q $cap</b>
			</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque7, false, false, false, false, '');

// ------------------- IMPRIMIR -------------------
$pdf->Output('Estado_de_cuenta_'.$nombreUser.'.pdf');


?>