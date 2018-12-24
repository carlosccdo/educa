<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

            <link rel=StyleSheet href="css/cssApp.css" type="text/css" media=screen>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

            <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
            <script src= "pl/jquery.fittext.js" ></script>
            <script src="pl/unslider.min.js"></script>
            <script src="js/jsApp2.js" type="text/javascript"></script>


        <title>APP EDUCATIVE</title>
    </head>
    <body>
        <?php require './seguridadGlobalprofe.php'; ?>
        <div class="contPagina">
<!--cabecera-->
            <?php include './cabecera.php'; ?>
            <div class="contPagina2"><!--las paginas de alumno y profesor no cogian el fondo de pantalla-->
            <?php include './menuVerticalProfesor.php'; ?>

<!--desde aqui va el contenido-->


                <div id="profesor">

<!--crer grupo-->
                    <div  class=" ocultarDiv mostrarCrearGrupo " >
                        <div  class="lis css3Form cajaProCrearGrupo  "><input type="text" id="proCrearGrupo"  name="proCrearGrupo" placeholder="Escribe el nombre del grupo"><input type="button" value="crear" id="botonProGrupo" class="button"></div>
                        <br>
                    </div>
                        
                        
<!--modificar grupo-->     
                    <div class="ocultarDiv mostrarBorrarGrupo">

                        <div  class="css3Form cajaProCrearGrupo"  >          
                            <div class="lisg1">Select</div>
                            <div class="lisg2">Grupo</div>

                            <div id="crearGruposMensaje">
                                <?php
                                include './con1.php';
                                if (!isset($_SESSION)) {
                                    session_start();
                                }
                                $consultag = $mysqli->query('SELECT distinct grupo.idgrupo,nombregrupo FROM grupo join grupointegrantes on grupo.idgrupo=grupointegrantes.idgrupo where grupointegrantes.idusuario=' . $_SESSION['idusuario']);

                                // Volcado de los datos
                                while ($filag = $consultag->fetch_assoc()) {

                                    // Almacenamiento de los datos en variables
                                    $idgrupo = $filag['idgrupo'];
                                    $nombregrupo = $filag['nombregrupo'];
                                     echo "<div class='lisg1'><input type='checkbox' class='checklist'  id='" . $idgrupo . "'></div>
                                           <div class='lisg2'><input type='text' class='campos' readonly='readonly' id='" . $idgrupo . "' name='nombregrupo' value='" . $nombregrupo . "'></div>";
                                }
                                //Vaciado de la variable
                                $consultag->free();
                                //Cierre de la conexion
                                $mysqli->close();
                                ?>

                            </div>
                            <input type="button" id="borrarGrupo" class="button" value="borrar" >
                            
                        </div>

                    </div>
                    


<!--registrar alumno-->
                    <div class="ocultarDiv mostrarRegistrarAlumno" >
                        
                        <div id="contenedorRegistrarAlumno">
                            <form class="css3Form">
                                <div class="lis">Name<br /><input type="text" name="pronombre" id="pronombre" required="" ></div>
                                <div class="lis">First name<br /><input type="text" name="proapellido1" id="proapellido1" required=""></div>
                                <div class="lis">Last name<br /><input type="text" name="proapellido2" id="proapellido2" required="" ></div>
                                <div class="lis">Edad<br /><input type="text" maxlength="2" name="proedad" id="proedad" ></div>
                                <div class="lis">I.D<br /><input type="text" name="dni" id="dni" ></div>
                                <div class="lis">Email<br /><input type="text" name="procorreo" id="procorreo" required=""></div>
                                <div class="lis">Keys<br /><input type="text" name="proclave" id="proclave" required="introdusca una clave"></div>
                                <div class="lis">Phone<br /><input type="tel" name="protelefono" id="protelefono" ></div>
                                

                                    Grupo al que pertenecera<br>
                                 <select id="selectgrupo" >
                                    <option id="Elige_un_grupo">Elige un grupo</option>
                                    <?php
                                    include './con1.php';
                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }
                                    $consulta = $mysqli->query('SELECT distinct grupo.idgrupo,nombregrupo FROM grupo join grupointegrantes on grupo.idgrupo=grupointegrantes.idgrupo where grupointegrantes.idusuario=' . $_SESSION['idusuario']);

                                    while ($fila = $consulta->fetch_assoc()) {
                                    echo" <option id ='" . $fila['idgrupo'] . "' value='" . $fila['nombregrupo'] . "'>" . $fila['nombregrupo'] . "</option>";
                                    }
                                    //Vaciado de la variable
                                    $consulta->free();
                                    //Cierre de la conexion
                                    $mysqli->close();
                                    ?>
                                </select>
                                <div id="registroUsuario"></div>
                                <div><input type="button" name="proenviar" id="proenviar" class="button" value="registrar"></div>
                            </form>
                        </div>
                    </div>

<!-- mostrar alumnos filtrado por grupos-->
                <div class="ocultarDiv mostrarModificarAlumno">
                    <div id="listaAlumnos" class="css3Form">
                          
                        <select id="selectGrupoAlumnos" name="selectGrupoAlumnos" onchange="" >
                        <option id="Elige_un_grupo">Elige un grupo</option>
                        <?php
                        include './con1.php';
                        if (!isset($_SESSION)) {
                        session_start();
                        }
                        $consulta44 = $mysqli->query('SELECT distinct grupo.idgrupo,nombregrupo FROM grupo join grupointegrantes on grupo.idgrupo=grupointegrantes.idgrupo where grupointegrantes.idusuario=' . $_SESSION['idusuario']);
                        while ($fila88 = $consulta44->fetch_assoc()) {

                        echo" <option id ='" . $fila88['idgrupo'] . "' value='" . $fila88['idgrupo'] . "'>" . $fila88['nombregrupo'] . "</option>";
                        }
                        //Vaciado de la variable
                        $consulta44->free();
                        //Cierre de la conexion
                        $mysqli->close();
                        ?>
                        </select><br><br><br>
                            <div class="lis1">Select</div>
                            <div class="lis2">Name</div>
                            <div class="lis2">First name</div>
                            <div class="lis2">Last name</div>
                            <div class="lis2">Email</div>
                            <div class="lis2">Keys</div>
                            <div class="lis2">I.D</div>
                            <div class="lis3">Phone</div>
                        <div id="listaAlumnosModificados"></div>
                             
                            <input type="button" id="borrarAlumno" class="button" value="borrar" >
                     </div>
                </div>

<!--chat-->
                    <div class="ocultarDiv mostrarChat" id="chatAlumnos">
                        <div id='resultado'>
                            <h1 id="tituloChat">Chat Web APP</h1>
                            <div id='texto'></div>
                        </div>
                        <div id='botones'>
                        <input type='text'   id='texto_chat'   name='texto_chat' ><br>
                            <select id="selectcentro" name="selectcentro" onchange="" >
                                <option id="Elige_un_grupo">Elige un grupo</option>
                                <?php
                                include './con1.php';
                                if (!isset($_SESSION)) {
                                session_start();
                                }


                                $consulta3 = $mysqli->query('SELECT distinct grupo.idgrupo,nombregrupo FROM grupo join grupointegrantes on grupo.idgrupo=grupointegrantes.idgrupo where grupointegrantes.idusuario=' . $_SESSION['idusuario']);
                                while ($fila3 = $consulta3->fetch_assoc()) {
                                echo" <option id ='" . $fila3['idgrupo'] . "' value='" . $fila3['idgrupo'] . "'>" . $fila3['nombregrupo'] . "</option>";
                                }
                                //Vaciado de la variable
                                $consulta3->free();
                                //Cierre de la conexion
                                $mysqli->close();
                                ?>
                            </select>
                            <select id="contenedorUsuario" name="contenedorUsuario">
                                <option id="sinUsuarioChat"></option>
                            </select>
                             <input type='button' id='enviar'  name='enviar' value='Enviar' onclick="chatear()" >
                        </div>

                    </div>


                </div>

<!-- forum-->
                <div id="cajaBlog" class="ocultarDiv mostrarForum">
                    <div id="encabezadoBlog">
                        <h1 id="portada"> Welcome to your blog</h1>
                        <span id="portada2">This is a place to share your ideas </span><br><br><br><br>  
<!--forums de grupos-->

                        <select id="selectcentroBlog" name="selectcentroBlog"  >
                            <option id="Elige_un_grupo">Elige un grupo</option>
                            <?php
                            include './con1.php';
                            if (!isset($_SESSION)) {
                            session_start();
                            }
                            $consulta5 = $mysqli->query('SELECT distinct grupo.idgrupo,nombregrupo FROM grupo join grupointegrantes on grupo.idgrupo=grupointegrantes.idgrupo where grupointegrantes.idusuario=' . $_SESSION['idusuario']);
                            while ($fila3 = $consulta5->fetch_assoc()) {
                            echo" <option id ='" . $fila3['idgrupo'] . "' value='" . $fila3['idgrupo'] . "'>" . $fila3['nombregrupo'] . "</option>";
                            }
                            //Vaciado de la variable
                            $consulta5->free();
                            //Cierre de la conexion
                            $mysqli->close();
                            ?>
                        </select>

                    </div>

                    <div id="reg">

                        <form method="post" action="blogImg.php" enctype="multipart/form-data" target="fr">
                            title<br>
                            <input name="titulo" type="text" id="titulo"  ><br>
                            subtitle<br>
                            <input name="subtitulo" type="text" id="subtitulo" ><br>
                            <textarea name="mensaje" id="mensaje" placeholder="Write your comment" rows="5%" cols="30%"></textarea><br>
                            <input type="file" name="rutaimg" id="rutaimg"  ><br>
                            <input type="submit" name="enviar" id="botcar" value="Submit" class="bo">
                        </form>
                        <iframe id="fr" name="fr" src="#" hidden=""></iframe>
                    </div>
                    
                    <div id="cajapublicar">
                            <a href="#"> <img src="img/blogImg/publicar.png" id="botreg" alt="Publish article"></a>
                    </div>
                    <!-- <input type="button" id="botreg"value="publicar"><br>-->
                    <div id="pag"></div>
                </div>
<!--tablon-->

                <div id="cajaTablon" class="ocultarDiv mostrarTablon">
                    <div id="encabezadoTablon">
                        <h2 id="tituloTablon"> Tell us your experience </h2>
                    </div>

                    <div id="regTablon">

                        <form method="post" target="fr">
                            title<br>
                            <input name="titulo" type="text" id="tituloT"  ><br>
                            name or alias<br>
                            <input name="nombre" type="text" id="nombreT"  ><br>
                            <textarea name="mensaje" id="mensajeT" placeholder="Write your comment" rows="5%" cols="30%"></textarea><br>
                            <input type="submit" name="botcarp" id="botcarp" value="Submint" class="bop">
                        </form>
                        <iframe id="fr" name="fr" src="tablon.php" hidden=""></iframe>
                        
                    </div>
                    <div id="mensajeTablon"></div>
                    <!-- <div id="cajapublicar">
                         
                          <a href="#"> <img src="img/blogImg/publicar.png" id="botreg" alt="publicar articulo"></a>
                     </div>
                    <input type="button" id="botreg"value="publicar"><br>-->



                </div>
<!--cuestionario-->
                <div id="cajaExamen" class="ocultarDiv mostrarCuestionario">
                    <div id="encabezadoExamen">
                        <h1 id="tituloExamen"> Questionnaire </h1>
                        <span id="subtituloExamen">write or choose the following questions</span>
                    </div>

                    <form id="cuestionario" name="examen" action="#" method="post">
                        <p>Task 1</p>
                        <input type="radio" value="1" name="respuesta_1" /> completely disagree <br />
                        <input type="radio" value="2" name="respuesta_1" /> disagree<br />
                        <input type="radio" value="3" name="respuesta_1" /> quite agree<br />
                        <input type="radio" value="4" name="respuesta_1" />agree<br />
                        <input type="radio" value="5" name="respuesta_1" />completely disagree<br />
                        <p>Task 2</p>
                        <input type="radio" value="1" name="respuesta_1" /> completely disagree <br />
                        <input type="radio" value="2" name="respuesta_1" /> disagree<br />
                        <input type="radio" value="3" name="respuesta_1" /> quite agree<br />
                        <input type="radio" value="4" name="respuesta_1" />agree<br />
                        <input type="radio" value="5" name="respuesta_1" />completely disagree<br />
                        <p>Task 3</p>
                        <input type="radio" value="1" name="respuesta_1" /> completely disagree <br />
                        <input type="radio" value="2" name="respuesta_1" /> disagree<br />
                        <input type="radio" value="3" name="respuesta_1" /> quite agree<br />
                        <input type="radio" value="4" name="respuesta_1" />agree<br />
                        <input type="radio" value="5" name="respuesta_1" />completely disagree<br />
                        <p>Task 4</p>
                        <textarea name="pregunta4" id="articulo" placeholder="write your answer" rows="5%" cols="30%"></textarea><br>
                        <p>Task 5</p>
                        <textarea name="pregunta5" id="articulo" placeholder="write your answer" rows="5%" cols="30%"></textarea><br>
                        <p><input type="submit" name="evaluar" value="Submint" /></p>
                    </form>
                </div>

            </div> 

<?php include 'pie.php'; ?>


        </div>
<!--    </div>-->
</body>
</html>
