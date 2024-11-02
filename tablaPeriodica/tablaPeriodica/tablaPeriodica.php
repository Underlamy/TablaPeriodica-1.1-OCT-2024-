<html>
<head>
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" href="css/settings.css">
    <title>TABLA PERIODICA</title>
</head>

<body>
    <video muted autoplay loop>
    <source src="resources\video\Zebra_Background_Black-grey.mp4" type="video/mp4">
    </video>
    <div class="capa"></div>

    <a href="<?= ROOTURL ?>" id="menu" class="fa-sharp fa-solid fa-house cba"></a>
    
    <?php include('tablaPeriodica/clasificaciones.php'); ?>

    <div id="tabla-periodica">
        <div>
            <a href="<?= ROOTURL ?>?accion=1">
            <div class="grupo1 periodo1 no-metales hoverBloque bloque">
                <div class="num-atomico">1</div>
                <div class="simbolo">H</div>
                <div class="nombre">HIDROGENO</div>
            </div>
            </a>
            
            <a href="<?= ROOTURL ?>?accion=3">
            <div class="grupo1 periodo2 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">3</div>
                <div class="simbolo">Li</div>
                <div class="nombre">LITIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=11">
            <div class="grupo1 periodo3 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">11</div>
                <div class="simbolo">Na</div>
                <div class="nombre">SODIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=19">
            <div class="grupo1 periodo4 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">19</div>
                <div class="simbolo">K</div>
                <div class="nombre">Potasio</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=37">
            <div class="grupo1 periodo5 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">37</div>
                <div class="simbolo">Rb</div>
                <div class="nombre">RUBIDIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=55">
            <div class="grupo1 periodo6 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">55</div>
                <div class="simbolo">Cs</div>
                <div class="nombre">Cesio</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=87">
            <div class="grupo1 periodo7 metales-alcalinos hoverBloque bloque">
                <div class="num-atomico">87</div>
                <div class="simbolo">Fr</div>
                <div class="nombre">FRANCIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=4">
            <div class="grupo2 periodo2 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">4</div>
                <div class="simbolo">Be</div>
                <div class="nombre">BERILIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=12">
            <div class="grupo2 periodo3 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">12</div>
                <div class="simbolo">Mg</div>
                <div class="nombre">MAGNESIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=20">
            <div class="grupo2 periodo4 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">20</div>
                <div class="simbolo">Ca</div>
                <div class="nombre">CALCIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=38">
            <div class="grupo2 periodo5 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">38</div>
                <div class="simbolo">Sr</div>
                <div class="nombre">Estroncio</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=56">
            <div class="grupo2 periodo6 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">56</div>
                <div class="simbolo">Ba</div>
                <div class="nombre">BARIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=88">
            <div class="grupo2 periodo7 alcalinoterreos hoverBloque bloque">
                <div class="num-atomico">88</div>
                <div class="simbolo">Ra</div>
                <div class="nombre">Radio</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=21">
            <div class="grupo3 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">21</div>
                <div class="simbolo">Sc</div>
                <div class="nombre">ESCANDIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=39">
            <div class="grupo3 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">39</div>
                <div class="simbolo">Y</div>
                <div class="nombre">YTRIO</div>
            </div>
            </a>

            <div class="grupo3 periodo6 lantanidos hoverBloque bloque"></div>
            <div class="grupo3 periodo7 actinidos hoverBloque bloque"></div>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=22">
            <div class="grupo4 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">22</div>
                <div class="simbolo">Ti</div>
                <div class="nombre">TITANIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=40">
            <div class="grupo4 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">40</div>
                <div class="simbolo">Zr</div>
                <div class="nombre">CIRCONIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=72">
            <div class="grupo4 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">72</div>
                <div class="simbolo">Hf</div>
                <div class="nombre">HAFNIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=104">
            <div class="grupo4 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">104</div>
                <div class="simbolo">Rf</div>
                <div class="nombre">RUTHERFORDIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=23">
            <div class="grupo5 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">23</div>
                <div class="simbolo">V</div>
                <div class="nombre">VANADIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=41">
            <div class="grupo5 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">41</div>
                <div class="simbolo">Nb</div>
                <div class="nombre">NIOBIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=73">
            <div class="grupo5 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">73</div>
                <div class="simbolo">Ta</div>
                <div class="nombre">TANTALO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=105">
            <div class="grupo5 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">105</div>
                <div class="simbolo">Db</div>
                <div class="nombre">DUBNIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=24">
            <div class="grupo6 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">24</div>
                <div class="simbolo">Cr</div>
                <div class="nombre">Cromo</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=42">
            <div class="grupo6 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">42</div>
                <div class="simbolo">Mo</div>
                <div class="nombre">MOLIBDENO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=74">
            <div class="grupo6 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">74</div>
                <div class="simbolo">W</div>
                <div class="nombre">WOLFRAMIO</div>
            </div>
            </a>


            <a href="<?= ROOTURL ?>?accion=106">
            <div class="grupo6 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">106</div>
                <div class="simbolo">Sg</div>
                <div class="nombre">SEABORGIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=25">
            <div class="grupo7 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">25</div>
                <div class="simbolo">Mn</div>
                <div class="nombre">MANGANESO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=43">
            <div class="grupo7 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">43</div>
                <div class="simbolo">Tc</div>
                <div class="nombre">TECNECIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=75">
            <div class="grupo7 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">75</div>
                <div class="simbolo">Re</div>
                <div class="nombre">RENIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=107">
            <div class="grupo7 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">107</div>
                <div class="simbolo">Bh</div>
                <div class="nombre">BOHRIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=26">
            <div class="grupo8 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">26</div>
                <div class="simbolo">Fe</div>
                <div class="nombre">HIERRO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=44">
            <div class="grupo8 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">44</div>
                <div class="simbolo">Ru</div>
                <div class="nombre">RUTENIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=76">
            <div class="grupo8 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">76</div>
                <div class="simbolo">Os</div>
                <div class="nombre">OSMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=108">
            <div class="grupo8 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">108</div>
                <div class="simbolo">Hs</div>
                <div class="nombre">HASSIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=27">
            <div class="grupo9 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">27</div>
                <div class="simbolo">Co</div>
                <div class="nombre">COBALTO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=45">
            <div class="grupo9 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">45</div>
                <div class="simbolo">Rh</div>
                <div class="nombre">RODIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=77">
            <div class="grupo9 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">77</div>
                <div class="simbolo">Ir</div>
                <div class="nombre">IRIDIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=109">
            <div class="grupo9 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">109</div>
                <div class="simbolo">Mt</div>
                <div class="nombre">MEITNERIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=28">
            <div class="grupo10 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">28</div>
                <div class="simbolo">Ni</div>
                <div class="nombre">NIQUEL</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=46">
            <div class="grupo10 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">46</div>
                <div class="simbolo">Pd</div>
                <div class="nombre">PALADIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=78">
            <div class="grupo10 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">78</div>
                <div class="simbolo">Pt</div>
                <div class="nombre">PLATINO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=110">
            <div class="grupo10 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">110</div>
                <div class="simbolo">Ds</div>
                <div class="nombre">DARMSTADTIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=29">
            <div class="grupo11 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">29</div>
                <div class="simbolo">Cu</div>
                <div class="nombre">COBRE</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=47">
            <div class="grupo11 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">47</div>
                <div class="simbolo">Ag</div>
                <div class="nombre">PLATA</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=79">
            <div class="grupo11 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">79</div>
                <div class="simbolo">Au</div>
                <div class="nombre">ORO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=111">
            <div class="grupo11 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">111</div>
                <div class="simbolo">Rg</div>
                <div class="nombre">ROENTGENIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=30">
            <div class="grupo12 periodo4 metales-transicion hoverBloque bloque">
                <div class="num-atomico">30</div>
                <div class="simbolo">Zn</div>
                <div class="nombre">ZINC</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=48">
            <div class="grupo12 periodo5 metales-transicion hoverBloque bloque">
                <div class="num-atomico">48</div>
                <div class="simbolo">Cd</div>
                <div class="nombre">CADMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=80">
            <div class="grupo12 periodo6 metales-transicion hoverBloque bloque">
                <div class="num-atomico">80</div>
                <div class="simbolo">Hg</div>
                <div class="nombre">MERCURIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=112">
            <div class="grupo12 periodo7 metales-transicion hoverBloque bloque">
                <div class="num-atomico">112</div>
                <div class="simbolo">Cn</div>
                <div class="nombre">COPERNICIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=5">
            <div class="grupo13 periodo2 metaloides hoverBloque bloque">
                <div class="num-atomico">5</div>
                <div class="simbolo">B</div>
                <div class="nombre">BORO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=13">
            <div class="grupo13 periodo3 otros-metales hoverBloque bloque">
                <div class="num-atomico">13</div>
                <div class="simbolo">Al</div>
                <div class="nombre">ALUMINIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=31">
            <div class="grupo13 periodo4 otros-metales hoverBloque bloque">
                <div class="num-atomico">31</div>
                <div class="simbolo">Ga</div>
                <div class="nombre">GALIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=49">
            <div class="grupo13 periodo5 otros-metales hoverBloque bloque">
                <div class="num-atomico">49</div>
                <div class="simbolo">In</div>
                <div class="nombre">INDIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=81">
            <div class="grupo13 periodo6 otros-metales hoverBloque bloque">
                <div class="num-atomico">81</div>
                <div class="simbolo">Tl</div>
                <div class="nombre">TALIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=113">
            <div class="grupo13 periodo7 otros-metales hoverBloque bloque">
                <div class="num-atomico">113</div>
                <div class="simbolo">Nh</div>
                <div class="nombre">NIHONIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=6">
            <div class="grupo14 periodo2 no-metales hoverBloque bloque">
                <div class="num-atomico">6</div>
                <div class="simbolo">C</div>
                <div class="nombre">Carbono</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=14">
            <div class="grupo14 periodo3 metaloides hoverBloque bloque">
                <div class="num-atomico">14</div>
                <div class="simbolo">Si</div>
                <div class="nombre">SILICIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=32">
            <div class="grupo14 periodo4 metaloides hoverBloque bloque">
                <div class="num-atomico">32</div>
                <div class="simbolo">Ge</div>
                <div class="nombre">GERMANIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=50">
            <div class="grupo14 periodo5 otros-metales hoverBloque bloque">
                <div class="num-atomico">50</div>
                <div class="simbolo">Sn</div>
                <div class="nombre">ESTAÑO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=82">
            <div class="grupo14 periodo6 otros-metales hoverBloque bloque">
                <div class="num-atomico">82</div>
                <div class="simbolo">Pb</div>
                <div class="nombre">PLOMO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=114">
            <div class="grupo14 periodo7 otros-metales hoverBloque bloque">
                <div class="num-atomico">114</div>
                <div class="simbolo">Fl</div>
                <div class="nombre">FLEROVIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=7">
            <div class="grupo15 periodo2 no-metales hoverBloque bloque">
                <div class="num-atomico">7</div>
                <div class="simbolo">N</div>
                <div class="nombre">NITROGENO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=15">
            <div class="grupo15 periodo3 no-metales hoverBloque bloque">
                <div class="num-atomico">15</div>
                <div class="simbolo">P</div>
                <div class="nombre">FOSFORO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=33">
            <div class="grupo15 periodo4 metaloides hoverBloque bloque">
                <div class="num-atomico">33</div>
                <div class="simbolo">As</div>
                <div class="nombre">ARSENICO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=51">
            <div class="grupo15 periodo5 metaloides hoverBloque bloque">
                <div class="num-atomico">51</div>
                <div class="simbolo">Sb</div>
                <div class="nombre">ANTIMONIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=83">
            <div class="grupo15 periodo6 otros-metales hoverBloque bloque">
                <div class="num-atomico">83</div>
                <div class="simbolo">Bi</div>
                <div class="nombre">BISMUTO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=115">
            <div class="grupo15 periodo7 otros-metales hoverBloque bloque">
                <div class="num-atomico">115</div>
                <div class="simbolo">Mc</div>
                <div class="nombre">MOSCOVIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=8">
            <div class="grupo16 periodo2 no-metales hoverBloque bloque">
                <div class="num-atomico">8</div>
                <div class="simbolo">O</div>
                <div class="nombre">OXIGENO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=16">
            <div class="grupo16 periodo3 no-metales hoverBloque bloque">
                <div class="num-atomico">16</div>
                <div class="simbolo">S</div>
                <div class="nombre">AZUFRE</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=34">
            <div class="grupo16 periodo4 no-metales hoverBloque bloque">
                <div class="num-atomico">34</div>
                <div class="simbolo">Se</div>
                <div class="nombre">SELENIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=52">
            <div class="grupo16 periodo5 metaloides hoverBloque bloque">
                <div class="num-atomico">52</div>
                <div class="simbolo">Te</div>
                <div class="nombre">TELURIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=84">
            <div class="grupo16 periodo6 metaloides hoverBloque bloque">
                <div class="num-atomico">84</div>
                <div class="simbolo">Po</div>
                <div class="nombre">POLONIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=116">
            <div class="grupo16 periodo7 otros-metales hoverBloque bloque">
                <div class="num-atomico">116</div>
                <div class="simbolo">Lv</div>
                <div class="nombre">LIVERMORIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=9">
            <div class="grupo17 periodo2 halogenos hoverBloque bloque">
                <div class="num-atomico">9</div>
                <div class="simbolo">F</div>
                <div class="nombre">FLUOR</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=17">
            <div class="grupo17 periodo3 halogenos hoverBloque bloque">
                <div class="num-atomico">17</div>
                <div class="simbolo">Cl</div>
                <div class="nombre">CLORO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=35">
            <div class="grupo17 periodo4 halogenos hoverBloque bloque">
                <div class="num-atomico">35</div>
                <div class="simbolo">Br</div>
                <div class="nombre">BROMO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=53">
            <div class="grupo17 periodo5 halogenos hoverBloque bloque">
                <div class="num-atomico">53</div>
                <div class="simbolo">I</div>
                <div class="nombre">YODO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=85">
            <div class="grupo17 periodo6 halogenos hoverBloque bloque">
                <div class="num-atomico">85</div>
                <div class="simbolo">At</div>
                <div class="nombre">ASTATO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=117">
            <div class="grupo17 periodo7 halogenos hoverBloque bloque">
                <div class="num-atomico">117</div>
                <div class="simbolo">Ts</div>
                <div class="nombre">TENESO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=2">
            <div class="grupo18 periodo1 gases-nobles hoverBloque bloque">
                <div class="num-atomico">2</div>
                <div class="simbolo">He</div>
                <div class="nombre">HELIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=10">
            <div class="grupo18 periodo2 gases-nobles hoverBloque bloque">
                <div class="num-atomico">10</div>
                <div class="simbolo">Ne</div>
                <div class="nombre">NEON</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=18">
            <div class="grupo18 periodo3 gases-nobles hoverBloque bloque">
                <div class="num-atomico">18</div>
                <div class="simbolo">Ar</div>
                <div class="nombre">ARGON</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=36">
            <div class="grupo18 periodo4 gases-nobles hoverBloque bloque">
                <div class="num-atomico">36</div>
                <div class="simbolo">Kr</div>
                <div class="nombre">KRIPTON</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=54">
            <div class="grupo18 periodo5 gases-nobles hoverBloque bloque">
                <div class="num-atomico">54</div>
                <div class="simbolo">Xe</div>
                <div class="nombre">XENON</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=86">
            <div class="grupo18 periodo6 gases-nobles hoverBloque bloque">
                <div class="num-atomico">86</div>
                <div class="simbolo">Rn</div>
                <div class="nombre">RADON</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=118">
            <div class="grupo18 periodo7 gases-nobles hoverBloque bloque">
                <div class="num-atomico">118</div>
                <div class="simbolo">Og</div>
                <div class="nombre">OGANESON</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=57">
            <div class="grupo3 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">57</div>
                <div class="simbolo">La</div>
                <div class="nombre">LANTANO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=58">
            <div class="grupo4 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">58</div>
                <div class="simbolo">Ce</div>
                <div class="nombre">CERIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=59">
            <div class="grupo5 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">59</div>
                <div class="simbolo">Pr</div>
                <div class="nombre">PRASEODIMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=60">
            <div class="grupo6 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">60</div>
                <div class="simbolo">Nd</div>
                <div class="nombre">NEODIMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=61">
            <div class="grupo7 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">61</div>
                <div class="simbolo">Pm</div>
                <div class="nombre">PROMETIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=62">
            <div class="grupo8 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">62</div>
                <div class="simbolo">Sm</div>
                <div class="nombre">SAMARIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=63">
            <div class="grupo9 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">63</div>
                <div class="simbolo">Eu</div>
                <div class="nombre">EUROPIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=64">
            <div class="grupo10 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">64</div>
                <div class="simbolo">Gd</div>
                <div class="nombre">GADOLINIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=65">
            <div class="grupo11 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">65</div>
                <div class="simbolo">Tb</div>
                <div class="nombre">TERBIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=66">
            <div class="grupo12 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">66</div>
                <div class="simbolo">Dy</div>
                <div class="nombre">DISPROSIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=67">
            <div class="grupo13 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">67</div>
                <div class="simbolo">Ho</div>
                <div class="nombre">HOLMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=68">
            <div class="grupo14 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">68</div>
                <div class="simbolo">Er</div>
                <div class="nombre">ERBIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=69">
            <div class="grupo15 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">69</div>
                <div class="simbolo">Tm</div>
                <div class="nombre">TULIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=70">
            <div class="grupo16 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">70</div>
                <div class="simbolo">Yb</div>
                <div class="nombre">ITERBIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=71">
            <div class="grupo17 periodo8 lantanidos hoverBloque bloque">
                <div class="num-atomico">71</div>
                <div class="simbolo">Lu</div>
                <div class="nombre">LUTECIO</div>
            </div>
            </a>
        </div>

        <div>
            <a href="<?= ROOTURL ?>?accion=89">
            <div class="grupo3 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">89</div>
                <div class="simbolo">Ac</div>
                <div class="nombre">ACTINIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=90">
            <div class="grupo4 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">90</div>
                <div class="simbolo">Th</div>
                <div class="nombre">TORIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=91">
            <div class="grupo5 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">91</div>
                <div class="simbolo">Pa</div>
                <div class="nombre">PROTACTINIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=92">
            <div class="grupo6 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">92</div>
                <div class="simbolo">U</div>
                <div class="nombre">URANIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=93">
            <div class="grupo7 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">93</div>
                <div class="simbolo">Np</div>
                <div class="nombre">NEPTUNIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=94">
            <div class="grupo8 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">94</div>
                <div class="simbolo">Pu</div>
                <div class="nombre">PLUTONIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=95">
            <div class="grupo9 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">95</div>
                <div class="simbolo">Am</div>
                <div class="nombre">AMERICIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=96">
            <div class="grupo10 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">96</div>
                <div class="simbolo">Cm</div>
                <div class="nombre">CURIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=97">
            <div class="grupo11 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">97</div>
                <div class="simbolo">Bk</div>
                <div class="nombre">BERKELIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=98">
            <div class="grupo12 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">98</div>
                <div class="simbolo">Cf</div>
                <div class="nombre">CALIFORNIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=99">
            <div class="grupo13 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">99</div>
                <div class="simbolo">Es</div>
                <div class="nombre">EINSTENIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=100">
            <div class="grupo14 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">100</div>
                <div class="simbolo">Fm</div>
                <div class="nombre">FERMIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=101">
            <div class="grupo15 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">101</div>
                <div class="simbolo">Md</div>
                <div class="nombre">MENDELEVIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=102">
            <div class="grupo16 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">102</div>
                <div class="simbolo">No</div>
                <div class="nombre">NOBELIO</div>
            </div>
            </a>

            <a href="<?= ROOTURL ?>?accion=103">
            <div class="grupo17 periodo9 actinidos hoverBloque bloque">
                <div class="num-atomico">103</div>
                <div class="simbolo">Lr</div>
                <div class="nombre">LAWRENCIO</div>
            </div>
            </a>
        </div>
    </div>
</body>
</html>