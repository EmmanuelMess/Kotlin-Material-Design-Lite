<?php
//conexion con base de datos
	$conexion = mysqli_connect('localhost','root','','messuputo') or die ('No se puede conectar'.mysqli_error($conexion));
	$ultid = $_POST['id'];
	$i = $ultid + 1;
//peticion de otras 5 armas
for($i=$ultid+1; i<=$ultid+6;i++){
		$pedirn = 'SELECT name, description FROM armas WHERE id="'.$i.'"';
		$result = mysqli_query($conexion, $pedirn);
		$row = mysqli_fetch_array($result);
		$data['name'] = $row['name'];
		$data['description'] = $row['description'];
		$array[$i] = $data;
	}
//devolucion
	echo json_encode($array);
?>