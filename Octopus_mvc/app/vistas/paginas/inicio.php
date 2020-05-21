<p><?php echo $datos['titulo']; ?></p>
<ul>
	<?php foreach($datos['articulos'] as $articulo):?>
		<li><?php echo $articulo->titulo;?></li>
	<?php endforeach;?>
</ul>


