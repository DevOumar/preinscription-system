
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>INTEC SUP | PRE-INSCRIPTION</title>
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1" />
<link rel="icon" href="{{url('template/img/logo1.png')}}" type="image/png" />

<!-- v4.0.0-alpha.6 -->
<link rel="stylesheet" href="{{url('template/bootstrap/css/bootstrap.min.css')}}">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

<!-- Theme style -->
<link rel="stylesheet" href="{{url('template/css/style.css')}}">
<link rel="stylesheet" href="{{url('template/css/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{url('template/css/et-line-font/et-line-font.css')}}">
<link rel="stylesheet" href="{{url('template/css/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{url('template/plugins/hmenu/ace-responsive-menu.css')}}">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-box-body">
    <h3 class="login-box-msg">Etudiant | Pré-Inscription</h3>
    {{flash.output()}}
    <form role="form" action="{{url('preinscription/index')}}" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="nom" class="form-control sty1" placeholder="Saisissez votre nom" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="prenom" class="form-control sty1" placeholder="Saisissez votre prénom" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control sty1" placeholder="Saisissez votre e-mail" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="telephone" class="form-control sty1" placeholder="Saisissez votre numéro de téléphone" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="serie" class="form-control sty1" placeholder=" Votre série du Bac" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="annee" class="form-control sty1" placeholder="Votre année d'obtention du Bac" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="filiere" class="form-control sty1" placeholder="Votre filière souhaitée" required="required">
      </div>
      <div class="form-group has-feedback">
        <input type="text" name="quartier" class="form-control sty1" placeholder="Votre Quartier ou Commune" required="required">
      </div>
      <div class="form-group has-feedback">
        <textarea class="form-control" name="motivation" placeholder="Votre motivation pour cette filière" required="required"></textarea>
      </div>
      <div>
        <!-- /.col -->
        <div class="col-xs-4 m-t-1">
          <button type="submit" class="btn btn-primary btn-block btn-flat">S'inscrire</button>
        </div>
        <!-- /.col --> 
      </div>
    </form>
  <!-- /.login-box-body --> 
</div>
<!-- /.login-box --> 

<!-- jQuery 3 --> 
<script src="{{url('template/js/jquery.min.js')}}"></script> 

<!-- v4.0.0-alpha.6 --> 
<script src="{{url('template/bootstrap/js/bootstrap.min.js')}}"></script> 

<!-- template --> 
<script src="{{url('template/js/niche.js')}}"></script>
</body>
</html>