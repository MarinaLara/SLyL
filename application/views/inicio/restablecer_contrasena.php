<link href="<?= base_url(); ?>template/login/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="<?= base_url(); ?>template/login/jquery.min.js"></script>
<!-- Sweet alert -->
    <script src="<?= base_url(); ?>template/bower_components/sweetalert/sweetalert.min.js"></script>
    <!-- Sweet alert -->
    <link href="<?= base_url(); ?>template/bower_components/sweetalert/sweetalert.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    
    <title>Letras y logos</title>
    <link href="<?=base_url()?>/images/fondo_chico.png" rel="shortcut icon">
   <!--Made with love by Mutiullah Samim -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <style type="text/css">

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
        background-image: url('<?= base_url(); ?>template/login/fondo_chico.png');
        background-size: 60% 100%;
        background-repeat: no-repeat;
        background-position: center;
        height: 100%;
        font-family: 'Numans', sans-serif;

        }        

        .container{
            height: 100%;
            align-content: center;
        }

        .card{
        height: 400px;
        margin-top: auto;
        margin-bottom: auto;
        width: 450px;
        background-color: rgba(0,0,0,0.5) !important;
        }

        .social_icon span{
        font-size: 60px;
        margin-left: 10px;
        color: #FFFFFF;
        }

        .social_icon span:hover{
        color: white;
        cursor: pointer;
        }

        .card-header h3{
        color: white;
        }

        .social_icon{
        position: absolute;
        right: 20px;
        top: -45px;
        }

        .input-group-prepend span{
        width: 50px;
        background-color: #FFFFFF;
        color: black;
        border:0 !important;
        }

        input:focus{
        outline: 0 0 0 0  !important;
        box-shadow: 0 0 0 0 !important;

        }

        .remember{
        color: white;
        }

        .remember input
        {
        width: 20px;
        height: 20px;
        margin-left: 15px;
        margin-right: 5px;
        }

        .login_btn{
        color: black;
        background-color: #FFFFFF;
        width: 150px;
        }

        .login_btn:hover{
        color: black;
        background-color: white;
        }

        .links{
        color: white;
        }

        .links a{
        margin-left: 4px;
        }
    </style>
</head>
    <body>        
        <div class="container">            
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h3>Recordar Contraseña</h3>
                        <div class="d-flex justify-content-end social_icon">
                            <span><i class="fab fa-facebook-square"></i></span>
                            <span><i class="fab fa-google-plus-square"></i></span>
                            <span><i class="fab fa-twitter-square"></i></span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="login" name="login" action="<?=base_url()?>main/enviarContrasena" method="post">
                            <div class="form-group">
                            	 <input class="form-control" type="text" id="email" name="email" placeholder="ESCRIBA SU USUARIO AQUI">
                            </div>
                            <div class="form-group">
                            	<button type="submit" class="btn login_btn">Enviar</button>
                            </div>
                           
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            <?php 
                if(isset($mensajes_swal))
                { 
                    echo  $mensajes_swal;
                }
            ?>
        </script>
    </body>
</html>