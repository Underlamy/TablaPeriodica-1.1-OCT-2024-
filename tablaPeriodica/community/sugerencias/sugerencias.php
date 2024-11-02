<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= CSS ?>/sugerencias.css">
    <script src="<?= JS ?>/sugerencias.js"></script>
</head>

<body>
    <?php if ($sesion) { ?>
        <h1 class="select">DEJA TU SUGERENCIA!</h1>

        <form class="submit" method="POST" action="sugerencias/agregar.php">
            <span>
                <input type="text" class="titulo" name="titulo" placeholder="Titulo...">
            </span>

            <span class="select">
                <select id="select-type" name="tipo">
                    <option value="General">General</option>
                    <option value="Tabla Periodica">Tabla Periodica</option>
                    <option value="Laboratorio">Laboratorio</option>
                    <option value="Community">Community</option>
                    <option value="Logbook">Logbook</option>
                    <option value="Sugerencias">Sugerencias</option>
                </select>
            </span>

            <div class="text">
                <textarea name="texto" placeholder="Comparte tus ideas..."></textarea>
            </div>

            <input type="hidden" name="usuario" value="<?= $sesion['IDUsuario'] ?>">

            <input type="submit" class="btn" value="ENVIAR">
        </form>
    <?php } else { ?>
        <div>
            <h1 class="block">INICIA SESION PARA <br> MANDAR TUS SUGERENCIAS!</h1>
            <h3 class="block"><a onclick="loadLogin()">Inicia sesion!</a></h3>
        </div>
    <?php } ?>

    <?php
    include("../BD/conexionBD.php");
    $query = "SELECT * FROM sugerencias";
    $resultadoQueryHTML = mysqli_query($miConexion, $query);
    ?>
    <section class="info">
        <div class="grid-container">
            <?php while ($dato = mysqli_fetch_assoc($resultadoQueryHTML)) {
                $usuario = $dato['IDUsuario'];
                $queryAuthor = "SELECT Username, IDUsuario FROM usuarios WHERE IDUsuario = $usuario";
                $resultadoQueryHTMLAuthor = mysqli_query($miConexion, $queryAuthor);
                $datoAuthor = mysqli_fetch_assoc($resultadoQueryHTMLAuthor);

                $sugerencia = $dato['IDSugerencia'];
                $voted = false;
                $up = 0;
                $down = 0;
                $queryVote = "SELECT Tipo, IDUsuario FROM votes WHERE IDSugerencia = $sugerencia";
                $resultadoQueryHTMLVote = mysqli_query($miConexion, $queryVote);
                while ($datoVote = mysqli_fetch_assoc($resultadoQueryHTMLVote)) {
                    switch ($datoVote["Tipo"]) {
                        case "up":
                            $up++;
                            break;

                        case "down":
                            $down++;
                            break;
                    }

                    if ($sesion["IDUsuario"] == $datoVote["IDUsuario"]) {
                        $voted = $datoVote["Tipo"];
                    }
                } ?>
                <div class="grid-item"> <?php
                                        if ($sesion["IDUsuario"] == $dato["IDUsuario"]) { ?>
                        <section class="tipo">
                            <?= $dato['Tipo'] ?>
                            <span class="author"><?= $datoAuthor["Username"] ?>#<?= $datoAuthor["IDUsuario"] ?></span>
                        </section>
                        <section class="titulo">
                            <?= $dato['Titulo'] ?>
                        </section>
                        <hr>
                        <section class="texto">
                            <?= $dato['Texto'] ?>
                        </section>
                        <section class="misc">
                            <i class="fa-solid fa-trash trash"
                                onclick="eliminar(<?= $dato['IDSugerencia'] ?>)"></i>

                        <?php } else { ?>

                            <section class="tipo">
                                <?= $dato['Tipo'] ?>"
                                <span class="author"><?= $datoAuthor["Username"] ?>#<?= $datoAuthor["IDUsuario"] ?></span>
                            </section>
                            <section class="titulo">
                                <?= $dato['Titulo'] ?>
                            </section>
                            <hr>
                            <section class="texto">
                                <?= $dato['Texto'] ?>
                            </section>
                            <section class="misc">

                                <?php switch ($voted) {
                                                case false: ?>
                                        <i class="fa-solid fa-circle-up upvote"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'up', false)"></i>
                                        <span class="up"><?= $up ?></span>

                                        <i class="fa-solid fa-circle-down downvote"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'down', false)"></i>
                                        <span class="down"><?= $down ?></span>
                                    <?php break;

                                                case "up": ?>
                                        <i class="fa-solid fa-circle-up block"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'up', '<?= $voted ?>')"></i>
                                        <span class="up"><?= $up ?></span>

                                        <i class="fa-solid fa-circle-down downvote"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'down', '<?= $voted ?>')"></i>
                                        <span class="down"><?= $down ?></span>
                                    <?php break;

                                                case "down": ?>
                                        <i class="fa-solid fa-circle-up upvote"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'up', '<?= $voted ?>')"></i>
                                        <span class="up"><?= $up ?></span>

                                        <i class="fa-solid fa-circle-down block"
                                            onclick="vote(<?= $sesion['IDUsuario'] ?>, <?= $dato['IDSugerencia'] ?>, 'down', '<?= $voted ?>')"></i>
                                        <span class="down"><?= $down ?></span>
                                <?php break;
                                            }

                                ?>
                            </section>
                        <?php
                                        } ?>
                </div>
            <?php } ?>
        </div>
    </section>
</body>

</html>