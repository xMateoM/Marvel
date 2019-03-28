<?php 
require 'index.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>API</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 header text-center">
				<img src="img/MarvelLogo.svg" class="img-fluid logo">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php foreach ($comics as $comic => $valor){
				$path = $valor['thumbnail']['path'];
				$extension = $valor['thumbnail']['extension'];
				$portada = $path.'.'.$extension;
				$titulo = $valor['title'];
				$fecha_publicacion =  date_create($valor['dates'][0]['date']); 
				?>

				<div class="col-sm-4 col-md-3 col-lg-3 col-xl-3 mt-5 text-center">
					<img src="<?php echo $portada; ?>" alt="Portada" class="img-fluid portada">
					<h6 class="mt-2"><?php echo $titulo; ?></h6>
					<p><?php echo date_format($fecha_publicacion, 'F d, Y'); ?></p>
					
					<div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
						<button type="submit" class="btn-primary" name="like"><i class="fa fa-thumbs-up"></i></button>
						<label for="like">(<?php echo $like; ?>)</label>&nbsp;
						<button type="submit" class="btn-danger" name="dislike"><i class="fa fa-thumbs-down"></i></button>
						<label for="dislike">(<?php echo $dislike; ?>)</label>
					</div><br>
				</div>
			<?php }?>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>