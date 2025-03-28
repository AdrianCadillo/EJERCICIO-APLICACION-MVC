<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="assets/css/output.css">
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
</head>

<body>

    <div class="mx-4 mt-[40px]">
        <div class="relative overflow-x-auto">

            <?php if (isset($_SESSION["success"])): ?>

                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                    <span class="font-medium">Mensaje del sistema!</span> <?php echo $_SESSION["success"] ?>.
                </div>
            <?php endif;
            unset($_SESSION["success"]) ?>

            <a href="<?php echo URL_BASE ?>index.php?accion=create" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Agregar uno nuevo</a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-4">
                <thead class="text-xs font-semibold text-white cursor-pointer uppercase bg-orange-400 hover:bg-orange-600 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Producto
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Precio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($productos) && count($productos) > 0): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo strtoupper($producto->nombre_producto) ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?php echo $producto->precio ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php echo $producto->stock ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?php echo URL_BASE ?>index.php?accion=editar&&id=<?php echo $producto->id_producto  ?>" class="px-2 py-3 bg-yellow-400 hover:bg-yellow-600
                                     text-white font-semibold rounded-md">editar</a>

                                    <button class="px-2 py-3 bg-red-500 hover:bg-red-700 text-white 
                                               font-semibold rounded-md shadow-lg"
                                        onclick="ConfirmarEliminadoProducto('<?php echo $producto->id_producto ?>','<?php echo $producto->nombre_producto ?>')">eliminar</button>

                                    <form action="<?php echo URL_BASE ?>index.php?accion=delete&&id=<?php echo $producto->id_producto ?>" method="post" id="form_delete_producto"></form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>

    <script>
        /// CONFIRMAR ELIMINADO DEL PRODUCTO
        function ConfirmarEliminadoProducto(id, nombreproducto) {
            Swal.fire({
                title: "Estas seguro de eliminar al producto "+nombreproducto+"?",
                text: "Al aceptar, ya no podras recuperar el producto!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, eliminar!"
            }).then((result) => {
                if (result.isConfirmed) {
                   document.getElementById('form_delete_producto').submit();
                }
            });
        }
    </script>
</body>

</html>