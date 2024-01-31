<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/tesina/db.php');

    $consulta_info = $conn->prepare("SELECT paciente.nombre AS nombre_paciente, paciente.cedula AS cedula_paciente, medico.nombre AS nombre_medico, tratamiento.nombre AS nombre_tratamiento, tratamiento.precio AS precio_tratamiento
                                    FROM turno
                                    INNER JOIN paciente ON turno.id_paciente = paciente.id
                                    INNER JOIN medico ON turno.id_medico = medico.id
                                    INNER JOIN tratamiento ON turno.id_tratamiento = tratamiento.id
                                    WHERE turno.id = ?");
    $consulta_info->bind_param("i", $nuevoIdTurno);
    $consulta_info->execute();

    $query_insert_factura = "INSERT INTO factura (id_turno, contenido) VALUES (?, ?)";
    $consulta_insert_factura = $conn->prepare($query_insert_factura);
    $consulta_insert_factura->bind_param("is", $nuevoIdTurno, $contenido_factura);
    $consulta_insert_factura->execute();
?>
