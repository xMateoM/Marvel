<?php

function listar_html($matriz)
{ ?>
    <div class="container">
        <div class="row">
            <?php
            $cotador = 0;
            foreach ($matriz as $row => $valor) {
                $cotador++;
                $id = $valor['id'];
                $portada = $valor['portada'];
                $titulo = $valor['titulo'];
                $fecha_publicacion = $valor['fecha_publicacion'];
                $like = $valor['like'];
                $dislike = $valor['dislike']; ?>

                <div class="col-sm-4 col-md-3 col-lg-3 col-xl-3 mt-5 text-center">
                    <img src="<?php echo $portada; ?>" alt="Portada" class="img-fluid portada">
                    <h6 class="mt-2"><?php echo $titulo; ?></h6>
                    <p><?php echo date_format($fecha_publicacion, 'F d, Y'); ?></p>

                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <button class="btn-primary" name="like" onclick="like(<?php echo $cotador; ?>)" value="<?php echo $id; ?>">Like 
                            <i class="fa fa-thumbs-up"></i>
                        </button>
                        <label id="like<?php echo $cotador; ?>" for="like"><?php echo $like; ?></label>&nbsp;
                        <button class="btn-danger" name="dislike" onclick="dislike(<?php echo $cotador; ?>)">Dislike 
                            <i class="fa fa-thumbs-down"></i>
                        </button>
                        <label id="dislike<?php echo $cotador; ?>" for="dislike"><?php echo $dislike; ?></label>
                    </div>
                    <br>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

function consumirAPI()
{
    $url = 'https://gateway.marvel.com/v1/public/comics?startYear=2019&limit=100&ts=1&apikey=b5dd158dd0e856443db7fb726fbc6bc9&hash=80182fcb24c6426319114b9e34eafed6';
    $json = file_get_contents($url);
    $datos = json_decode($json, true);
    $comics = $datos['data']['results'];

    $matriz = crearMatriz($comics);
    $matriz = asignar_id_matriz($matriz);
    return $matriz;
}

function crearMatriz($comics)
{
    $likes = array();
    foreach ($comics as $comic => $valor) {
        $id = 0;
        $like = 0;
        $dislike = 0;
        $path = $valor['thumbnail']['path'];
        $extension = $valor['thumbnail']['extension'];
        $portada = $path . '.' . $extension;
        $titulo = $valor['title'];
        $fecha_publicacion = date_create($valor['dates'][0]['date']);

        $array = array('id' => $id, 'portada' => $portada, 'titulo' => $titulo, 'fecha_publicacion' => $fecha_publicacion, 'like' => $like, 'dislike' => $dislike);
        $likes[] = $array;
    }
    return $likes;
}

function asignar_id_matriz($likes)
{
    $cantidad = count($likes) - 1;
    for ($i = 0; $i <= $cantidad; $i++) {
        $likes[$i]['id'] = $i;
    }
    return $likes;
}
?>