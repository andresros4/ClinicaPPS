
<?php if(!empty($this->info)) {

	echo '<div class="alert alert-success" role="alert">
														'.$this->info.'
												</div>';

	} else { ?>



<h3> Atención </h3>
<p>Está cancelando un turno con menos de 24 hs de anticipación, por lo tanto, tendrá que abonarlo. </p>
<p>¿Desea cancelarlo igualmente?</p>
<form action="" method="post">
    <button class="btn  btn-primary" name="cancelar" value="cancelar">Cancelar Turno</button>
    <a href="/clinica/turnosPrestaciones" class="btn btn-primary">Volver atrás</a>
</form>

	<?php } ?>