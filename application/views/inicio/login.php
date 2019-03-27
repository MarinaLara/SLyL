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
    
    <title>Letras y Logos</title>
   <!--Made with love by Mutiullah Samim -->
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <style type="text/css">

        @import url('https://fonts.googleapis.com/css?family=Numans');

        html,body{
        
        background-size: 100% 100%;
        background-repeat: no-repeat;
        opacity: 80%;
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
        background-color: #007AFF !important;
        }

        .social_icon span{
        padding: 50px;
        font-size: 30px;
        margin-left: -85px;
        margin-top: 13px;
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
        background-color: white;
        width: 150px;
        }

        .login_btn:hover{
        color: 007AFF;
        background-color: #B7CFDC;
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
        <div class="container " >            
            <div class="d-flex justify-content-center h-100" >
                <div class="card">

                    <div class="card-header p-3 mb-2 bg-primary text-white";>
                        <h3 class="Text-Uppercase" style="font-family: 'Arial';">Iniciar Sesion</h3>
                    </div>
                    <div class="card-body p-3 mb-2 bg-primary text-white">
                        <form id="login" name="login" action="<?=base_url()?>index.php/main/login" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" class="form-control" name="txt_usuario" id="txt_usuario" placeholder="User" required>
                                
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="txt_password" id="txt_password" placeholder="Password" required>
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Recordar Datos
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Iniciar Sesion" class="btn float-right login_btn">
                            </div>
                        </form>
                    </div>
                    <!--<div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            ¿No estas registrado?<a href="#" style="color:#39AAF4;">Registrarse</a>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#" style="color:#39AAF4;">Olvide mi contraseña...</a>
                        </div>
                    </div>-->
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