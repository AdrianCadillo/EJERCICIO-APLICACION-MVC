<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar productos</title>
    <link rel="stylesheet" href="assets/css/output.css">
</head>

<body class="bg-blue-950">

    <form action="<?php echo URL_BASE ?>index.php?accion=update&&id=<?php echo $producto_[0]->id_producto ?>" method="post"
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
 

        <h1 class="text-white font-extrabold text-3xl mb-[20px] text-center">Editar producto</h1>
        <input type="text" class="border border-blue-400 w-full mb-2 px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600" name="nombre_producto" placeholder="Nombre del producto..."
         value="<?php echo $producto_[0]->nombre_producto ?>">
        <input type="text" class="border border-blue-400 w-full mb-2 px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600" name="precio_producto" placeholder="Precio del producto..."
         value="<?php echo $producto_[0]->precio ?>">
        <input type="text" class="border border-blue-400 w-full px-2
         py-3 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500
         placeholder:italic placeholder:text-green-600 mb-3" name="stock_producto" placeholder="Stock del producto..."
         value="<?php echo $producto_[0]->stock ?>">
        <button class="px-2 py-3 text-white bg-lime-500 font-semibold hover:bg-lime-800
        rounded-md w-[150px] mx-auto block">Guardar cambios</button>
    </form>
</body>

</html>