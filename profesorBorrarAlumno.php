

<?php
 include './con1.php';
 
if (!isset($_SESSION)) {
  session_start();
}


	/* DEFINICION DE LAS VARIABLES CON LOS DATOS DE CONEXION */
	include './con1.php';

	/* CAPTURA LA MATRIZ ENVIADA DESDE FUNCIONES.JS */
	$matrizCV=$_POST['matrizCV'];
    
   
    

        	
	/* RECORRIDO DE TODOS LOS ELEMENTOS DE LA MATRIZ */
	foreach ($matrizCV as $elementoMatriz){
		
		/* ELIMINACION DE LOS REGISTROS - TODOS LOS VALORES ENTRE COMILLAS SIMPLES AUNQUE SEAN NUMERICOS */
		if ($mysqli->query("DELETE FROM usuario WHERE idusuario='$elementoMatriz'") === TRUE) {
                    $mysqli->query("DELETE FROM grupointegrantes WHERE idusuario='$elementoMatriz'");
                    
		}	
		else {
			printf("Los datos no han sido eliminados");
		}			
	
	}
	/* VACIADO DE LA REFERENCIA */
	unset($elementoMatriz);

 $listaAlumnosModificados=$_POST['valorListaGrupoAlumnos'];
 




         

                                 $consulta2 = $mysqli->query("select grupointegrantes.idusuario,usuario.nombre,usuario.apellido1,usuario.apellido2,usuario.correo,usuario.clave,usuario.telefono,usuario.dni  from grupointegrantes join usuario on grupointegrantes.idusuario = usuario.idusuario join grupointegrantes as grupo on grupointegrantes.idgrupo=grupo.idgrupo where usuario.nivel=3 and grupo.idusuario='" . $_SESSION['idusuario'] . "'and grupointegrantes.idgrupo=$listaAlumnosModificados  group by grupointegrantes.idusuario
"); //falta filtrar por grupo
// Volcado de los datos
                                
                                
                                
                                while ($fila2 = $consulta2->fetch_assoc()) {

                                    // Almacenamiento de los datos en variables
                                    $idusuario = $fila2['idusuario'];
                                    $nombre = $fila2['nombre'];
                                    $apellido1 = $fila2['apellido1'];
                                    $apellido2 = $fila2['apellido2'];
                                    $correo = $fila2['correo'];
                                    $clave = $fila2['clave'];
                                    $telefono = $fila2['telefono'];
                                    $dni = $fila2['dni'];


                                    echo "<div class='lis1'><input type='checkbox' class='checklist'  id='" . $idusuario . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='nombre' value='" . $nombre . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='apellido1' value='" . $apellido1 . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='apellido2' value='" . $apellido2 . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='correo' value='" . $correo . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='clave' value='" . $clave . "'></div>
                         <div class='lis2'><input type='text' class='campos' id='" . $idusuario . "' name='dni' value='" . $dni . "'></div>
                         <div class='lis3'><input type='text' class='campos' id='" . $idusuario . "' name='telefono' value='" . $telefono . "'></div>";
                                }

                                //Vaciado de la variable
                                $consulta2->free();

                                //Cierre de la conexion
                                $mysqli->close();
                                ?>