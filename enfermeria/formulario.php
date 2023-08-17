<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stilo.css">
    <link rel="stylesheet" href="css/styles.css">
    
</head>
<body>
   



    ?>


    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-register">
    <h4>Registro</h4>
    <div>
    <label for="">Nombre:</label>
    <input class="controls" type="text" name="nombre" required value="<?php if(isset($nombre)) echo $nombre ?>" class="">
    </div>
    <div>
    <label for="">Teléfono:</label>
    <input class="controls" type="text" name="telefono" required value="<?php if(isset($telefono)) echo $telefono ?>">
    </div>
    <div>
    <label for="">Correo:</label>
    <input class="controls" type="text" name="correo" required value="<?php if(isset($correo)) echo $correo ?>">
    </div>
    <div>
    <label for="">Tipo de Documento:</label>
    <select class="controls" name="tipoId">
        <option value="CI">T.I</option>
        <option value="CE">C.C</option>
        <option value="CE">pasaporte</option>
    </select>
    </div>
    <div>
    <label for="">Número de Documento:</label>
    <input class="controls" type="number" name="numeroDoc" required value="<?php if(isset($numeroDoc)) echo $numeroDoc ?>">
    </div>
    <div>
    <label for="">Consulta:</label>
    <textarea name="consulta" rows="10" cols="48.5" required value="<?php if(isset($consulta)) echo $consulta ?>"> </textarea>
    </div>
    <input class="controls" type="submit"  >
    <?php
    include ("validar.php");
    ?>

    </form>
    <script>
        function elpepe(){
                            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Consulta Enviada',
                showConfirmButton: false,
                timer: 1500
})
        }
    </script>
    <script>
        function elpepe2(){
                            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
                })
        }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


    
</body>
</html>