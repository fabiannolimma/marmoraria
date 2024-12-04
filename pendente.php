<?php
session_start(); // checando sessão
include('setting/config.php');
echo'
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
';
$checkEmpresa = mysqli_query($con, "select * from empresas where id='".$_SESSION['empresa_id']."'"); 
while($empresa = mysqli_fetch_assoc($checkEmpresa)){
	$id = $empresa['id'];
    $statusEmpresa = $empresa['status'];
    }

if($statusEmpresa == "ativo"){
header('location: index.php?id=$id');
}else{
?>
<style>
/*======================
    Pendente page
=======================*/
.page_Pendente{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
}

.page_Pendente  img{ width:100%;}

.four_zero_four_bg{
 
 background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
    height: 400px;
    background-position: center;
 }
 
 
 .four_zero_four_bg h1{
 font-size:80px;
 }
 
  .four_zero_four_bg h3{
font-size:80px;
 }
			 
.link_Pendente{			 
	color: #fff!important;
    padding: 10px 20px;
    background: #39ac31;
    margin: 20px 0;
    display: inline-block;}
.contant_box_Pendente{ margin-top:-50px;}

</style>
<section class="page_Pendente">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center">Pendente</h1>
		
		
		</div>
		
		<div class="contant_box_Pendente">
		
		<p>Essa empresa encontra-se em débito! Por favor, entre em contato com suporte para regularizar sua situação e tente novamente mais tarde.</p>
		
		<a href="https://api.whatsapp.com/send?phone=27998061932&text=Preciso de ajuda para desbloquear meu acesso ao painel do gerenciador SFL." target="_blank" class="link_Pendente">Abrir Chat via Whatsapp</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
<?php
}
?>

