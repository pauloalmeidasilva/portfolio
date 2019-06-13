<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?php if (isset($stylesheets)) {
        foreach ($stylesheets as $stylesheet) {?>
            <link href="<?=CSS.$stylesheet.'.css'?>" rel="stylesheet">
        <?php }
    } ?>

    <style type="text/css">
        
        img[alt="www.000webhost.com"]{
            display: none;
        }
    </style>
</head>
<body class="bg-secondary">
    <div class="container mt-5 p-5">
        <div class="text-center m-3" style="font-size: 30px; color: #fff">
            <b>Login</b>
        </div>
        <div class="card mx-auto p-3" style="width: 350px;">
            <div class="text-center">
                <p>Faça o login para entrar</p>
            </div>
            
            <form id="form-login">
            <!-- <form action="<?=base_url('login/autenticar')?>" method="POST"> -->
                    <div id="aviso" class="text-center m-3"></div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="user" id="user" placeholder="Usuário">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </form>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <?php if (isset($scripts)) {
            foreach ($scripts as $script) {?>
                <script src="<?=JS.$script.'.js'?>"></script>
            <?php }
        } ?>

        <!-- iCheck -->
        <script src="<?=JS.'icheck.min.js'?>"></script>

        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' /* optional */
          });
        });
    </script>
</body>
</html>
