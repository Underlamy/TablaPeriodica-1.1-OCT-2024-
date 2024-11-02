<html>

<head>
    <link rel="stylesheet" href="<?= CSS ?>/header.css">
    <link rel="stylesheet" href="<?= JS ?>/sugerencias.js">
</head>

<body>
    <div class="navbar">
        <a href="<?= HOMEURL ?>" class="img"><img src="resources/navbar-logo.gif"></a>
        <a href="<?= ROOTURL ?>">HOME</a>

        <a href="<?= ROOTURL ?>?q=logbook">LOGBOOK</a>
        <a href="<?= ROOTURL ?>?q=sugerencias">SUGERENCIAS</a>

        <?php if ($sesion) { ?>
            <a id="left" onclick="loadLogout()"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
        <?php }else{ ?>
            <a id="left" onclick="loadLogin()"><i class="fa-solid fa-right-from-bracket"></i> LOGIN</a>
        <?php } ?>
    </div>