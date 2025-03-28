<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crear productos</title>
    <link rel="stylesheet" href="assets/css/output.css">
</head>

<body class="bg-blue-950">

    <form action="<?php echo URL_BASE ?>index.php?accion=save" method="post"
        class="border-2 border-red-600 w-80 px-3 py-4 mx-auto mt-4 rounded-md
   shadow-md">

        <?php if (isset($_SESSION["errors"])): ?>
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <?php foreach ($_SESSION["errors"] as $error): ?>
                    <ul class="list-disc ml-[30px]">
                        <li><?php echo $error ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
        <?php endif;
        unset($_SESSION["errors"]) ?>

        <?php if (isset($_SESSION["existe"])): ?>
            <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <span class="font-medium">Mensaje del sistema!</span> <?php echo $_SESSION["existe"] ?>
            </div>
        <?php endif;
        unset($_SESSION["existe"]) ?>

        <h1 class="text-white font-extrabold text-3xl mb-[20px] text-center">Crear producto</h1>
        <input type="text" class="border border-blue-400 w-full mb-2 px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600" name="nombre_producto" placeholder="Nombre del producto..."
         value="<?php echo old("nombre_producto") ?>">
        <input type="text" class="border border-blue-400 w-full mb-2 px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600" name="precio_producto" placeholder="Precio del producto..."
         value="<?php echo old("precio_producto") ?>">
        <input type="text" class="border border-blue-400 w-full px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600 mb-3" name="stock_producto" placeholder="Stock del producto..."
         value="<?php echo old("stock_producto") ?>">
        <button class="px-2 py-3 text-white bg-lime-500 font-semibold hover:bg-lime-800
        rounded-md w-[120px] mx-auto block">Guardar</button>
    </form>
</body>

</html>