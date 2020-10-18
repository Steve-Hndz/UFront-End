<main>
    <table border="1">
        <thead>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellido</strong></td>
            <td><strong>telefono</strong></td>
            <td><strong>Estado</strong></td>
        </thead>
        <?php foreach ($list as $donante) : ?>
        <tbody>
            <td><?php echo $donante->nombre_donante ?></td>
            <td><?php echo $donante->apellido_donante ?></td>
            <td><?php echo $donante->telefono_donante ?></td>
            <td><?php echo $donante->estado_donante ?></td>
        </tbody>
        <?php endforeach; ?>    
    </table>
</main>