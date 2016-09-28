<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">Element 119</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout">Logout</a></li>
        </ul>
        <p class="navbar-text navbar-right">Bienvenido: <a href="#" class="navbar-link"><?php echo (isset($_SESSION['name']) && isset($_SESSION['last_name'])) ? $_SESSION['name'] . ' ' . $_SESSION['last_name'] :  ''; ?></a></p>
    </div>
</nav>