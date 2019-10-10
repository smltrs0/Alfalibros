<?php 
    require(TEMPLATES.'head.php');
 ?>
<body>
<?php
    require(TEMPLATES.'menu.php');
?>
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <?php 
        require(TEMPLATES.'header.php');
    ?>

    <!-- Content -->
    <div class="content">
        <?php 
            require(TEMPLATES.'breadcrumb.php');
        ?>
        <!-- Animated test -->
        <div class="card animated bounceInDown">
            <div class="card-header">
                Agregar libro
            </div>
            <div class="card-body">
                <form method="POST" action="controller/nuevo_libro.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input class="form-control" type="text" name="titulo">
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control" name="autor">
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="">Seleccione un autor</option>
                            <?php foreach ($autores as $key): ?>
                                <option value="<?php echo $key['id_autor']; ?>"><?php echo $key['autor']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                            <option value="nuevo_autor">Otro autor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria">
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="">Seleccione una categoria</option>
                            <?php foreach ($categorias as $key): ?>
                                <option value="<?php echo $key['id_categoria']; ?>"><?php echo $key['categoria']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                            <option value="nuevo_autor">Otra categoria</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Lanzamiento</label>
                        <input class="form-control" type="date" name="fecha_lanzamiento">
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input class="form-control" type="number" name="cantidad">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" type="text" name="precio">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Sinopsis" name="sinopsis"></textarea>

                            <div class="form-group">
                                <label class="form-text" >Foto</label>
                                <input class="form-control-file" type="file" name="img">
                            </div>
                    <input type="submit">
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
 require(TEMPLATES.'scripts.php');
?>

</body>
</html>