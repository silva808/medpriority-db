<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedPriority ADMIN</title>
    <link rel="stylesheet" href="../Css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- -----------------------------HEADER------------------------------ -->
<header>

    <div class="nav">
        <div class="logo">
            <div class="logo-pic"></div>
            <h2 class="logo-text">MedPriority</h2>
        </div>
        <div class="user">
            <p class="user-name">ADMIN</p>
            <div class="user-pic"></div>
        </div>
        <div id="nav-container">
            <div class="blurry-bg"></div>
            <div class="btn-mobile" tabindex="0">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div id="nav-content" tabindex="0">
                <ul>
                    <li><a href="#med-register">Registrar medico</a></li>
                    <li><a href="#med-panel">Panel medico</a></li>
                    <li><a href="#patient-register">Registrar paciente</a></li>
                    <li><a href="#patient-list">Lista pacientes</a></li>
                </ul>
            </div>
        </div>
    </div>

</header>

    <section>

    <!-- -------------------------------MODAL------------------------------------------ -->

<?php
    require_once 'conexion.php';

    $bruh = "SELECT * FROM usuario WHERE id_rol='3' OR id_rol='2'";   //jiji
    $q = mysqli_query( $conn, $bruh );
        if(mysqli_num_rows($q)>0){
            while($ff =mysqli_fetch_assoc($q)){
                $modalId = 'modal_' . $ff['id_usuario'];
                $identi = $ff['id_usuario'];

                // --------------------------------------
?>

<div class="modal" id="<?php echo $modalId?>">
    <div class="modal-header">
        <span><?php echo htmlspecialchars($ff['nombre'])?></span>
        <span><?php echo htmlspecialchars($identi)?></span>
        <button id=chao data-close-button class="close-button">&times;</button>
    </div>
    
    <div class="modal-body">
        <div class="edit-modal">Tipo de Documento
            <input type="text" required name=m_id_type value="<?php echo htmlspecialchars($ff['tipo_documento'])?>">
        </div>
        <div class="edit-modal">Numero de Documento
            <input type="text" disabled required name=m_id value="<?php echo htmlspecialchars($ff['id_usuario'])?>">
        </div>
        <div class="edit-modal">Nombre
            <input type="text" required name=m_name value="<?php echo htmlspecialchars($ff['nombre'])?>">
        </div>
        <div class="edit-modal">Edad
            <input type="text" required name=m_age value="<?php echo htmlspecialchars($ff['edad'])?>">
        </div>
        <div class="edit-modal">Sexo
            <input type="text" required name=m_sexmoneyfeelingsdie value="<?php echo htmlspecialchars($ff['genero'])?>">
        </div>
        <div class="edit-modal">Direccion
            <input type="text" required name=m_address value="<?php echo htmlspecialchars($ff['direccion'])?>">
        </div>
        <div class="edit-modal">Telefono
            <input type="text" required name=m_pickupyophonebaby value="<?php echo htmlspecialchars($ff['telefono'])?>">
        </div>
        <div class="edit-modal">Correo Electronico
            <input type="text" required name=m_email value="<?php echo htmlspecialchars($ff['correo'])?>">
        </div>
        <div class="edit-modal">Tipo de Afiliacion
            <input type="text" required name=m_afi value="<?php echo htmlspecialchars($ff['tipo_afiliacion'])?>">
        </div>
        <div class="modal-savebutton">
            <button class="save-button" id="sage" data-modal-id="<?php echo $modalId;?>">Aplicar cambios</button>
        </div>
    </div>
    
</div>
<?php
            }
        }
?>
<div id="overlay"></div>

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
                                <input type="text" name="doc_id-number" required>
                            </div>
                            <div class="question">
                                <label for="name">Nombre</label>
                                <input type="text" name="doc_name" required>
                            </div>
                            <div class="question">
                                <label for="age">Edad</label>
                                <input type="text" name="doc_age" required>
                            </div>
                            <div class="question">
                                <label for="phone-number">Teléfono</label>
                                <input type="text" name="doc_phone-number" required>
                            </div>
                            <div class="question">
                                <label for="email">Correo Electronico</label>
                                <input type="text" name="doc_email" required>
                            </div>
                            <div class="question">
                                <label for="sex">Sexo</label>
                                <input type="text" name="doc_sex" required>
                            </div>
                            <div class="question">
                                <label for="medical-pic">Subir foto</label>
                                <div class="pic-survey"></div>
                            </div>
                            <div class="save">
                                <div class="save-button">
                                    <a href="#" id="guardar-button">Guardar</a>
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
                                <tr id=table_row_<?php echo $fila['id_usuario']?>>
                                    <td> <?php echo $fila['id_usuario'];?></td>
                                    <td> <?php echo $fila['nombre'];?></td>
                                    <td> <?php echo $fila['edad'];?></td>
                                    <td> <?php echo $fila['telefono'];?></td>
                                    <td><button data-modal-target="#modal_<?php echo $fila['id_usuario'];?>">Detalles</button></td>
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
                                    <option value="Cedula de Ciudadania">Cédula de Ciudadanía</option>
                                    <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                    <option value="Registro Civil">Registro Civil</option>
                                    <option value="Pasaporte">Pasaporte</option>
                                </select>
                            </div>
                            <div class="pat-question">
                                <label for="pat-id-number">No. Documento</label>
                                <input type="text" name="pat_id-number" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-name">Nombres</label>
                                <input type="text" name="pat_name" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-email">Correo Electronico</label>
                                <input type="text" name="pat_email" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-age">Edad</label>
                                <input type="text" name="pat_age" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-phone-number">Teléfono</label>
                                <input type="text" name="pat_phone-number" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-sex">Genero</label>
                                <input type="text" name="pat_sex" required>
                            </div>
                            <div class="pat-question">
                                <label for="pat-residence-area">Tipo de Afiliacion</label>
                                <select name="pat-afi" id="pat-afi">
                                    <option value="null"></option>
                                    <option value="contribute">Contributivo</option>
                                    <option value="subsid">Subsidiado</option>
                                </select>
                            </div>
                            <div class="save-patient">
                                <div class="save-pat-button">
                                    <a href="#" id="paciente-nuevo">Guardar</a>
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
 
                            $sql2 = "SELECT * FROM usuario WHERE id_rol='2'";   //paciente
                            $query = mysqli_query( $conn, $sql2 );
                            if(mysqli_num_rows($query)>0){
                                while($row = mysqli_fetch_assoc($query)){

                            ?>
                                <tr id=table_row_<?php echo $row['id_usuario']?>>
                                    <td><?php echo $row['id_usuario'];?></td>
                                    <td><?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['edad'];?></td>
                                    <td><?php echo $row['genero'];?></td>
                                    <td><button data-modal-target="#modal_<?php echo $row['id_usuario'];?>">Detalles</button></td>
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

    <script src="../Js/admin90.js"></script>

</body>

</html>