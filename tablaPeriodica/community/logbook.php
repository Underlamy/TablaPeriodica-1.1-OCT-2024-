<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= CSS ?>/logbook.css">
    <link rel="stylesheet" href="<?= CSS ?>/info.css">
    <script src="<?= JS ?>/logbook.js"></script>
</head>

<body>
    <div class="select-box">
        <h1 class="select">ELIGE UNA FECHA</h1>

        <span class="select">
            <select id="select-day" onchange="loadInfo()">
                <option value=1>01</option>
                <option value=2>02</option>
                <option value=3 selected>03</option>
                <option value=4>04</option>
                <option value=5>05</option>
                <option value=6>06</option>
                <option value=7>07</option>
                <option value=8>08</option>
                <option value=9>09</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
                <option value=13>13</option>
                <option value=14>14</option>
                <option value=15>15</option>
                <option value=16>16</option>
                <option value=17>17</option>
                <option value=18>18</option>
                <option value=19>19</option>
                <option value=20>20</option>
                <option value=21>21</option>
                <option value=22>22</option>
                <option value=23>23</option>
                <option value=24>24</option>
                <option value=25>25</option>
                <option value=26>26</option>
                <option value=27>27</option>
                <option value=28>28</option>
                <option value=29>29</option>
                <option value=30>30</option>
                <option value=31>31</option>
            </select>
        </span>

        <span class="select">
            <select id="select-month" onchange="loadInfo()">
                <option value=1>ENE</option>
                <option value=2>FEB</option>
                <option value=3>MAR</option>
                <option value=4>ABR</option>
                <option value=5>MAY</option>
                <option value=6>JUN</option>
                <option value=7>JUL</option>
                <option value=8>AGO</option>
                <option value=9>SEP</option>
                <option value=10 selected>OCT</option>
                <option value=11>NOV</option>
                <option value=12>DEC</option>
            </select>
        </span>

        <span class="select">
            <select id="select-year" onchange="loadInfo()">
                <option value=2023>2023</option>
                <option value=2024 selected>2024</option>
            </select>
        </span>
    </div>

    <?php
    $year = array();
    $month = array();
    $day = array();

    $date = isset($_GET['date']) ? $_GET['date'] : null;
    $miConexion = new mysqli("localhost", "root", "", "tablaperiodica");
    ?>
    <section class="info">
        <?php
        if ($date == null) { ?>
            <div class="alert">No hay ningun registro</div>
            <div class="alert"> en esta fecha!</div>
        <?php } else {
            $query = "SELECT * FROM logbook WHERE Fecha = '$date'";
            $resultadoQueryHTML = mysqli_query($miConexion, $query); ?>

            <h3><?= $date ?></h3>
            <?php while ($fecha = mysqli_fetch_assoc($resultadoQueryHTML)) { ?>
                <h1><?= $fecha["Titulo"] ?></h1>
                <h3><?= $fecha["Texto"] ?></h3>
        <?php }
        } ?>
    </section>
</body>