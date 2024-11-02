<html>

<body>
    <div class="navbar">
        <a href="<?= ROOTURL ?>">INICIO</a>

        <div class="menu">
            <button class="menubtn">
                USER
            </button>

            <div class="menu-content">
                <a href="<?= ROOTURL ?>?q=administradores&limit=0">ADMINISTRADORES</a>
                <a href="<?= ROOTURL ?>?q=usuarios&limit=0">USUARIOS</a>
            </div>
        </div>

        <div class="menu">
            <button class="menubtn">
                ELEMENTOS
            </button>

            <div class="menu-content">
                <a href="<?= ROOTURL ?>?q=elementos&limit=0">ATOMOS</a>
                <a href="<?= ROOTURL ?>?q=oxidacion&limit=0">OXIDACION</a>
                <a href="<?= ROOTURL ?>?q=isotopos&limit=0">ISOTOPOS</a>
            </div>
        </div>

        <div class="menu">
            <button class="menubtn">
                COMMUNITY
            </button>

            <div class="menu-content">
                <a href="<?= ROOTURL ?>?q=logbook&limit=0">LOGBOOK</a>
                <a href="<?= ROOTURL ?>?q=sugerencias&limit=0">SUGERENCIAS</a>
                <a href="<?= ROOTURL ?>?q=votes&limit=0">VOTOS</a>
            </div>
        </div>

        <a id="left" href="<?= ROOTURL ?>?q=logout"><i class="fa-solid fa-right-from-bracket"></i> LOGOUT</a>
    </div>

    </div>