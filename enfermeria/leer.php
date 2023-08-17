<?php

$hostDB = 'localhost';
$nombreDB = 'formulario';
$usuarioDB = 'root';
$contrasenyaDB = '';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM trabajo;');
// Ejecuta consulta
$miConsulta->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de registro</title>

    <link rel="stylesheet" href="css/stilos2.css">

    </style>
</head>
<body>
    <p><a class="button" href="nuevo.php">Crear</a></p>
    <table>
        <tr>
            <th>Nombre_completo</th>
            <th>Telefono</th>
            <th>Correo_electronico</th>
            <th>Tipo_de_documento</th>
            <th>documento</th>
            <th>Consulta</th>
            <td></td>
            <td></td>
        </tr>
    <?php foreach ($miConsulta as $clave => $valor): ?> 
        <tr>
        <td><?= $valor['Nombre_completo']; ?></td>
        <td><?= $valor['Telefono']; ?></td>
        <td><?= $valor['Correo_electronico']; ?></td>
        <td><?= $valor['Tipo_de_documento']; ?></td>
        <td><?= $valor['Numero_de_documento']; ?></td>
        <td><?= $valor['Consulta']; ?></td>
        <!-- Se utilizará más adelante para indicar si se quiere modificar o eliminar el registro -->
        <td><a class="button" href="modificar.php?Nombre_completo=<?= $valor['Nombre_completo'] ?>">Modificar</a></td>
        <td><a class="button" href="borrar.php?Nombre_completo=<?= $valor['Nombre_completo'] ?>">Borrar</a></td>
        </tr>
    <?php endforeach; ?>
    </table>
</body>
</html>

?>
