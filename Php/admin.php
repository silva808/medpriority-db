<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedPriority ADMIN</title>
    <link rel="stylesheet" href="../Css/admin1.css">
</head>

<header>
    <div class="logo">
        <div class="logo-pic"></div>
        <h2 class="logo-text">MedPriority</h2>
    </div>
    <div class="user">
        <p class="user-name">ADMIN</p>
        <div class="user-pic"></div>
    </div>
</header>

<body>
    <section>

        <!-- -------------------MENU------------------- -->

        <div class="menu">

            <div class="menu-buttons">
                <div class="btn">
                    <div class="back"></div>
                </div>
                <div class="btn">
                    <div class="manage-med"></div>
                </div>
                <div class="btn">
                    <div class="manage-user"></div>
                </div>
                <div class="btn">
                    <div class="sign-out"></div>
                </div>
                <a href="#">Sign Out</a>
            </div>

            <div class="menu-options">
                <div class="manage-main">
                    <div class="manage-b">
                        <a href="#">Regresar</a>
                    </div>
                </div>
                <div class="cont-main">
                    <div id="mainDiv1" class="manage-main">
                        <div id="1" class="manage active">
                            <a href="#">Gestionar médicos</a>
                        </div>
                        <div id="2" class="manage">
                            <a href="#med-register">Registrar médico</a>
                        </div>
                        <div id="3" class="manage">
                            <a href="#med-panel">Panel médico</a>
                        </div>
                    </div>
                </div>
                <div class="cont-main">
                    <div id="mainDiv2" class="manage-main">
                        <div id="4" class="manage active">
                            <a href="#">Gestionar pacientes</a>
                        </div>
                        <div id="5" class="manage">
                            <a href="#patient-register">Registrar paciente</a>
                        </div>
                        <div id="6" class="manage">
                            <a href="#patient-list">Lista paciente</a>
                        </div>
                    </div>
                </div>
                <!-- <div class="aux2"></div> -->
            </div>

        </div>

        <main class="content">
            <!-- ---------------REGISTRAR MEDICOS------------------- -->
            <div class="med-register" id="med-register">
                <div class="survey-frame">
                    <p>Registrar médico</p>
                    <div class="survey-main">
                        <div class="survey-container">
                            <div class="question">
                                <label for="id-number">No. Identificación</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="name">Nombre</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="medical-specialty">Especialización</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="phone-number">Teléfono</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="contract-number">No. Contrato</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="professional-id">Tarjeta Profesional</label>
                                <input type="text" required>
                            </div>
                            <div class="question">
                                <label for="medical-pic">Subir foto</label>
                                <div class="pic-survey"></div>
                            </div>
                            <div class="save">
                                <div class="save-button">
                                    <a href="#">Guardar</a>
                                </div>
                            </div>
                        </div>
                        <div class="img-container">
                            <div class="img-frame">
                                <div class="nurse-img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -----------------------PANEL MEDICO----------------------- -->

            <div class="med-panel" id="med-panel">
                <div class="panel-frame">
                    <p>Panel Médico</p>
                    <div class="panel-main" id="contain_tablas">
                        <table>
                            <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Teléfono</th>
                                <th style="width: 15%;"></th>
                                <th style="width: 15%;"></th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php 
                                
                                require_once 'conexion.php';

                                $sql = "SELECT * FROM usuario WHERE id_rol='3'";    //medico
                                $consulta = mysqli_query( $conn, $sql );
                                if(mysqli_num_rows($consulta)>0){
                                    while($fila =mysqli_fetch_assoc($consulta)){
                                ?>
                                <tr>
                                    <td> <?php echo $fila['id_usuario'];?></td>
                                    <td> <?php echo $fila['nombre'];?></td>
                                    <td> <?php echo $fila['edad'];?></td>
                                    <td> <?php echo $fila['telefono'];?></td>
                                    <td><button data-modal-target="#modal">Editar</button></td>
                                    <td><button>Eliminar</button></td>
                                </tr>

                                <?php
                                    }
                                }
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <!-- -----------------------REGISTRAR PACIENTE----------------------- -->

            <div class="patient-register" id="patient-register">
                <div class="pat-survey-frame">
                    <p>Registrar paciente</p>
                    <div class="pat-survey-main">
                        <div class="pat-survey-container">
                            <div class="pat-question">
                                <label for="pat-id-type">Tipo de Documento</label>
                                <select name="pat-id-type" id="pat-id-type">
                                    <option value="null"></option>
                                    <option value="CC">Cédula de Ciudadanía</option>
                                    <option value="TI">Tarjeta de Identidad</option>
                                    <option value="RC">Registro Civil</option>
                                    <option value="PAS">Pasaporte</option>
                                </select>
                            </div>
                            <div class="pat-question">
                                <label for="pat-id-number">No. Documento</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-name">Nombres</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-lastname">Apellidos</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-age">Edad</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-phone-number">Teléfono</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-address">Dirección</label>
                                <input type="text" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-residence-area">Zona</label>
                                <select name="pat-residence-area" id="pat-residence-area">
                                    <option value="null"></option>
                                    <option value="urban">Urbana</option>
                                    <option value="rural">Rural</option>
                                </select>
                            </div>
                            <div class="save-patient">
                                <div class="save-pat-button">
                                    <a href="#">Guardar</a>
                                </div>
                            </div>
                        </div>
                        <div class="img-pat-container">
                            <div class="img-pat-frame">
                                <div class="pat-img"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -----------------------LISTA PACIENTE----------------------- -->

            <div class="patient-list" id="patient-list">
                <div class="patient-frame">
                    <p>Lista de pacientes</p>
                    <div class="patient-main">
                        <table>
                            <thead>
                            <tr>
                                <th>Identificación</th>
                                <th>Nombres</th>
                                <th>Edad</th>
                                <th>Género</th>
                                <th style="width: 15%;"></th>
                                <th style="width: 15%;"></th>
                            </tr>
                            </thead>
                            
                            <tbody>

                            <?php

                            require_once  'conexion.php';
                            $patientmodal = "SELECT * FROM usuario WHERE id_rol='2'"; //paciente modal
                            $medicmodal = "SELECT * FROM usuario WHERE id_rol='3'"; //medico modal
 
                            $sql2 = "SELECT * FROM usuario WHERE id_rol='2'";   //paciente
                            $query = mysqli_query( $conn, $sql2 );
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_assoc($query)){

                            ?>
                                <tr>
                                    <td><?php echo $row['id_usuario'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['edad'];?></td>
                                    <td><?php echo $row['genero'];?></td>
                                    <td><button data-modal-target="#modal_<?php echo $fila['id_usuario']; ?>">Editar</button></td>
                                    <td><button>Eliminar</button></td>
                                </tr>
                                    
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    </section>

    <!-- -------------------------------MODAL------------------------------------------ -->

    <?php
        require_once 'conexion.php';
        // if($idtable==1){
        //     $sql3 = "SELECT * FROM usuario WHERE id_rol = '2'";
        // }
        // else if($idtable==2){
        //     $sql3 = "SELECT * FROM usuario WHERE id_rol = '3'";
        // }


        $q = mysqli_query( $conn, $medicmodal );
            if(mysqli_num_rows($q)>0){
                while($ff =mysqli_fetch_assoc($q)){

    ?>

    <div class="modal" id="modal_<?php echo $ff['id_usuario']; ?>">
        <div class="modal-header">
            <span><?php echo htmlspecialchars($ff['nombre'])?></span>
            <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">
            <span><?php echo htmlspecialchars($ff['nombre']) ?></span>
            <span><?php echo htmlspecialchars($ff['nombre']) ?></span>
        </div>
    </div>
    <?php
                }
            }
    ?>
    <div id="overlay"></div>

    <script src="../Js/contenedores_admin.js"></script>

</body>

</html>