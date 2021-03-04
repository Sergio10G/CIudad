<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudad</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php 
        require_once "./clases.php";
    ?>

    <div class="contenedor">
        <header class="fila">
            <h1><?=Creador::ciudad;?></h1>
        </header>
        <div class="fila porcentajes">
        <?php foreach(Creador::getPorcentajes() as $tipo => $porcentaje):?>
            <div class="porcentaje">
                <div class="tipo"><?=$tipo?></div>
                <div class="numero"><?=$porcentaje * 100?>%</div>
            </div>
        <?php endforeach;?>
        </div>
        <div class="fila formulario">
            <form method="post">
                <div>
                    <label for="cantidad">Población total</label>
                    <input type="number" name="cantidad" min="1">
                </div>
                <div>
                    <input type="submit" value="Crear ciudad">
                </div>
            </form>
        </div>
        <?php 
            if(isset($_POST['cantidad']) && $_POST['cantidad'] > 0){
                $cantidad = $_POST['cantidad'];
                Creador::setCantidad($cantidad);
                Creador::crearCiudad();
            }
            else{
                echo "<div class='fila' style='text-align: center; width: 100%;'><h1>Aquí se generará tu ciudad</h1>";
                echo "<h2>¡Adelante, introduce un valor a la población total!</h2></div>";
            }
        ?>
    </div>
</body>
</html>