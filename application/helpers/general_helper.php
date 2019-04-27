<?php 

function classAgendaCita($estado)
{
	if ($estado==1) { //Atendido
		$res = 'success';
	}elseif($estado==2){ //Anulado
		$res = 'warning';
	}elseif($estado==3){ //Pendiente
		$res = 'info';
	}elseif($estado==4){ //Atendiendose
		$res = 'important';
	}elseif($estado==5){ //Citado
		$res = 'inverse';
	}elseif($estado==6){ //Confirmado por Telefono
		$res = 'special';
	}elseif($estado==7){ //En sala de espera
		$res = 'warning';
	}elseif($estado==8){ //No asiste
		$res = 'warning';
	}elseif($estado==9){ //No confirmado
		$res = 'warning';
	}

	return $res;
}

function filaEstadoCita($estado)
{
	if ($estado==1) { //Atendido
		$res = 'success';
	}elseif($estado==2){ //Anulado
		$res = 'danger';
	}elseif($estado==3){ //Pendiente
		$res = 'info';
	}elseif($estado==4){ //Atendiendose
		$res = 'success';
	}elseif($estado==5){ //Citado
		$res = 'warning';
	}elseif($estado==6){ //Confirmado por Telefono
		$res = 'special';
	}elseif($estado==7){ //En sala de espera
		$res = 'info';
	}elseif($estado==8){ //No asiste
		$res = 'danger';
	}elseif($estado==9){ //No confirmado
		$res = 'danger';
	}

	return $res;
}


function edad($fecha_nacimiento) { 
    $tiempo = strtotime($fecha); 
    $ahora = time(); 
    $edad = ($ahora-$tiempo)/(60*60*24*365.25); 
    $edad = floor($edad); 
    return $edad; 
} 

?>