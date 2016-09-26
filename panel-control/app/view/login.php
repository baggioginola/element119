<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Element119 | Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo CSS; ?>bootstrap.css" rel="stylesheet">
    <link href="<?php echo CSS; ?>dashboard.css" rel="stylesheet">
    <link href="<?php echo CSS; ?>datatable.css" rel="stylesheet">
    <link href="<?php echo DATATABLE; ?>Select/css/select.bootstrap.css" rel="stylesheet">
    <link href="<?php echo FILEINPUT; ?>css/fileinput.css" rel="stylesheet">

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">Nasiol</a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-9 col-md-12 main">
            <!-- CONTENT !-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-offset-4">
                        <h1 class="text-center login-title">Login</h1>
                        <div class="account-wall">
                            <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                                 alt="">
                            <form class="form-signin" id="auth">
                                <input type="email" class="form-control" placeholder="Email" required autofocus name="email" value="mario.cuevas@gameloft.com">
                                <input type="password" class="form-control" placeholder="Password" required id="id_password" value="12345">
                                <button class="btn btn-lg btn-primary btn-block" type="submit">
                                    Aceptar
                                </button>

                                <span class="clearfix"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CONTENT !-->
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo JS; ?>jquery.cookie.js"></script>
<script src="<?php echo JS; ?>jquery-ui.js"></script>
<script src="<?php echo JS; ?>bootstrap.js"></script>
<script src="<?php echo JS; ?>custom/baseFunctions.js"></script>
<script src="<?php echo JS; ?>bootbox.min.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>md5.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>custom/config.js" ></script>
<script type="text/javascript" src="<?php echo JS; ?>custom/auth.js" ></script>
<script type="text/javascript" src="<?php echo JS; ?>validator.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>functions.js" ></script>
<script type="text/javascript" src="<?php echo DATATABLE; ?>datatable.js"></script>
<script type="text/javascript" src="<?php echo DATATABLE; ?>Select/js/dataTables.select.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/fileinput.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/plugins/sortable.min.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/plugins/purify.min.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/locales/es.js"></script>
<script type="text/javascript" src="<?php echo FILEINPUT; ?>js/plugins/canvas-to-blob.js"></script>

</body>
</html>