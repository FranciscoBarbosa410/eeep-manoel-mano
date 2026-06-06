<!-- <header id="header">
    <nav class="navbar">
        <a href="index_adm.php" class="home-link">
            <img src="../src/images/logo.png" alt="Logo EEEP">    
            EEEP Manoel Mano
        </a>
        <ul>
            <li><a href="cursos_adm.php">Cursos</a></li>
            <li><a href="noticias_adm.php">Notícias</a></li>
            <li><a href="profissionais_adm.php">Profissionais</a></li>
            <li><a href="sobre_adm.php">Sobre nós</a></li> 
            <li><a href="admins.php">Admins</a></li>
            <li><a href="../../app/logout.php">Logout</a></li>
        </ul>
    </nav>
</header> -->

<header id="header">

    <nav class="navbar">

        <div class="nav-top">

    <div class="nav-left">

        <button class="menu-toggle" id="menu-toggle">
            ☰
        </button>

        <a href="index_adm.php" class="home-link">
            <img src="../src/images/logo.png" alt="Logo EEEP">
            EEEP Manoel Mano
        </a>

    </div>

    <div class="nav-right">
                <a href="../../app/logout.php" class="sair-btn"> Sair</a>
    </div>

</div>

        <aside class="sidebar" id="sidebar">
            <ul>
                <li><a href="cursos_adm.php">Cursos</a></li>
                <li><a href="noticias_adm.php">Notícias</a></li>
                <li><a href="profissionais_adm.php">Profissionais</a></li>
                <li><a href="sobre_adm.php">Sobre nós</a></li>
                <li><a href="admins.php">Admins</a></li>
                <li>
                    <a href="../../app/logout.php"> Sair</a>
                </li>
            </ul>
        </aside>

    </nav>

</header>

<script>

const toggle = document.getElementById("menu-toggle");
const sidebar = document.getElementById("sidebar");


toggle.addEventListener("click", () => {

    sidebar.classList.toggle("active");

    if(sidebar.classList.contains("active")){
        toggle.innerHTML = "✖";
    }else{
        toggle.innerHTML = "☰";
    }

});

document.addEventListener("click", (e) => {

    const clicouDentroSidebar = sidebar.contains(e.target);
    const clicouNoBotao = toggle.contains(e.target);

    if(
        !clicouDentroSidebar &&
        !clicouNoBotao &&
        sidebar.classList.contains("active")
    ){
        sidebar.classList.remove("active");
        toggle.innerHTML = "☰";
    }

});

</script>