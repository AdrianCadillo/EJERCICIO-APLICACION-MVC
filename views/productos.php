<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
     <table border="3" style="width: 560px;">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>

        <tbody>
            <?php if(isset($productos) && count($productos) > 0): ?>
                  <?php foreach($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto->nombre_producto ?></td>
                        <td><?php echo $producto->precio?></td>
                        <td><?php echo $producto->stock?></td>
                    </tr>
                  <?php endforeach;?>  
            <?php endif; ?>    
        </tbody>
     </table>
</body>
</html>