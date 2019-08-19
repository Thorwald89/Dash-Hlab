<?php
/*
 * Copyright 2014 Thorwald Donato Madalese
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 *
 *
 */
include('../setup/setup.php');
session_start();

	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
$navigazione_http="../";



include($navigazione_http.'head.php');
include($navigazione_http.'sidebar.php');



$login = $_SESSION['login'];

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];


$sample=$_GET['sample'];

if($send =="inserisci"){
	

		$id_campione = $_POST['id_campione'];
	//controllo l'esistenza di un vecchio inserimento
	if($c = $link ->query("select * from esami where id_campione like '$id_campione'") or die(mysqli_error($link)))
	{
		
		//inserisco barcode e risultati in esami
		
			
			$s=$link->query("update esami set locus_a ='".$_POST['locus_a']."', locus_b ='".$_POST['locus_b']."', locus_c = '".$_POST['locus_c']."', locus_dr = '".$_POST['locus_dr']."', locus_dqa = '".$_POST['locus_dqa']."', locus_dqb = '".$_POST['locus_dqb']."', locus_dp = '".$_POST['locus_dp']."', operatore = '".$_POST['operatore']."', data_test = NOW() where id_campione = '$id_campione' ") or die(mysqli_error($link)); 

	}else{
		//inserisco barcode e risultati in esami
		
			
			$s=$link->query("insert into esami (id_campione, locus_a, locus_b, locus_c, locus_dr, locus_dqa, locus_dqb, locus_dp, operatore, data_test) values ('".$_POST['id_campione']."', '".$_POST['locus_a']."', '".$_POST['locus_b']."', '".$_POST['locus_c']."', '".$_POST['locus_dr']."', '".$_POST['locus_dqa']."', '".$_POST['locus_dqb']."', '".$_POST['locus_dp']."', '".$_POST['operatore']."',NOW()) ") or die(mysqli_error($link)); 

	}
	}


?>


<body>
	

	
		<?php
switch($pos){
	
	default:
	
	
	?>	
		<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Refertazione
        <small>Verifica e Valida i dati ottenuti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Campioni</a></li>
        <li class="active">Refertazione</li>
      </ol>
    </section>

	 <div id="alert" >
              </div>
	
	
	<!-- Main content -->
    <form id="form_risultati" role="form">
		<section class="content">
        <!-- left column -->
        <div>
          <!-- general form elements -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Cerca Campione</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
            </div>
		
              <div class="box-body">
					<div class="form-group">
						<label for="barcode">ID Campione</label>
						<i class="fa fa-barcode"></i>
						<input type="text" id="barcode" name="barcode" class="form-control" placeholder="ID Campione" style="width: 100%;">
						<p class="help-block">Cerca il campione usando il barcode.</p>
						<input type="hidden" name="send" value="cerca">
						<input type="submit" value="Cerca">
              
              </div>
              
              <!-- /.box-body -->
		
 
          <!-- /.box -->

 </div>              

 </div>

 <div id="prova"></div>

	</form>




	<?php
	break;
	
	case 'inserisci-cordone':
	
	$q = $link ->query("SELECT cordoni.*, fogli_lavoro.* FROM cordoni LEFT JOIN fogli_lavoro ON cordoni.barcode=fogli_lavoro.id_campione WHERE cordoni.barcode like '$sample'") or die(mysqli_error($link));
			$r = mysqli_fetch_array($q);

		?>
	
		<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inserimento Risultati
        <small>Inserisci i dati ottenuti</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Campioni</a></li>
        <li class="active">Inserisci Risultati</li>
      </ol>
    </section>

	 <div id="alert" >
              </div>
	
	
	<form role="form" >
		<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Informazioni</h3>
            </div>
		
              <div class="box-body">
                 <div class="form-group">
                  <label for="barcode1">ID Campione</label>
                  <i class="fa fa-barcode"></i>
                  <input type="text" class="form-control" name="barcode1" id="barcode1" disabled value="<?= $r['barcode'] ?>" >
                  <input type="hidden" class="form-control" name="barcode" id="barcode" value="<?= $r['barcode'] ?>" >
                </div>                   
				<div class="form-group">
                  <label for="nome_d">Cognome e Nome Cordone</label>
					<input type="text" class="form-control" name="nome_d" id="nome_d" disabled value="<?=$r['cognome_cord']?> <?=$r['nome_cord']?>">
				</div>
                 <div class="form-group">
					<label for="nascita_d">Nascita Cordone</label>
					<input type="date" class="form-control" name="nascita_d" id="nascita_d" disabled value="<?= $r['nascita_cord'] ?>">
				</div>
				<div class="form-group">
					<label for="cognome_d">Cognome e Nome Madre</label>
					<input type="text" class="form-control" name="cognome_d" id="cognome_d" disabled value="<?=$r['cognome_madre']?> <?=$r['nome_madre']?>">
				</div>
                <div class="form-group">
					<label for="nascita_d">Nascita Madre</label>
					<input type="date" class="form-control" name="nascita_d" id="nascita_d" disabled value="<?= $r['nascita_madre'] ?>">
				</div>
                 <div class="form-group">
					<label for="prelievo">Sede Prelievo</label>
					<input id="prelievo" class="form-control" type="text" name="prelievo" disabled value="<?= $r['ospedale'] ?>">
				</div>
				<div class="form-group">
					<label for="arrivo">Data di Arrivo</label>
					<input id="arrivo" class="form-control" type="date" name="arrivo" disabled value="<?= $r['arrivo'] ?>">
				</div>
            
              </div>
              <!-- /.box-body -->

           </div>
          <!-- /.box -->
 
 </div>
 
 
 <!-- right column -->
        <div class="col-md-6">
  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Risultati</h3>
            </div>
		
              <div class="box-body">
				<div class="form-group">
					<label for="estrazione">Estrazione</label>
					<input id="estrazione" class="form-control" type="text" name="arrivo" value="<?= $r['estrazione'] ?>">
					<p><i>Inserire il valore in ng/&micro;l</i></p>
				</div>
              </div>
			
			<?php
			//inizio sessione selezione esami registrati in fogli_lavoro per il cordone 
			
			$array_loci =explode(',', $r['locus']);
			
			foreach($array_loci as $analisi) 
				{
					//cerco la prima lettera es A*L(R), A01
					$locus = substr($analisi, 0,1);
					if($locus == 'D' )
					{
						$locus = substr($analisi, 0,3);

					}

			?>		
			<div class="box-body">
				<div class="form-group">
					<label for="<?=$analisi?>"><?=$analisi?></label>
					<input id="<?=$analisi?>" class="form-control" type="text" name="locus_<?=$locus?>" placeholder="es...01:02">
				</div>
             </div>
              <!-- /.box-body -->				
			<?php	
				}
			?>
			


              <div class="box-footer">
					<input type="hidden" name="send" value="Inserisci_esami">
					<input type="submit" value="Inserisci">              
          </div>
          <!-- /.box -->

</div></div></div>



	</form>
	
	<?php
	break;
	
	case 'inserisci':
	
	$q = $link ->query("SELECT * FROM cordoni WHERE barcode like '$sample'") or die(mysqli_error($link));
			$r = mysqli_fetch_array($q);

		?>
	
	
	<form role="form" >
		<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tipologia</h3>
            </div>
		
              <div class="box-body">
                <div class="form-group">
                  <label for="id_famiglia">ID Famiglia</label>
                  <i class="fa fa-barcode"></i><input type="text" class="form-control" name="id_famiglia" id="id_famiglia" placeholder="ID Famiglia" >
                </div>
                 <div class="form-group">
                  <label for="barcode">ID Campione</label>
                  <i class="fa fa-barcode"></i><input type="text" class="form-control" name="barcode" id="barcode" placeholder="ID Campione" >
                  <p class="help-block">Se il campione &eacute; unico, ID Famiglia ed ID Campione devono corrispondere.</p>
                </div>                   
              </div>
              <!-- /.box-body -->

           </div>
          <!-- /.box -->
 
 </div>
 
 
 <!-- right column -->
        <div class="col-md-6">
  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anagrafica</h3>
            </div>
		
              <div class="box-body">
                <div class="form-group">
                  <label for="nome_d">Nome</label>
					<input type="text" class="form-control" name="nome_d" id="nome_d" disabled="disabled" value="<?=$r['nome_cord']?>">
				</div>
                 <div class="form-group">
					<label for="cognome_d">Cognome</label>
					<input type="text" class="form-control" name="cognome_d" id="cognome_d" placeholder="Cognome">
				</div>
                <div class="form-group">
					<label for="nascita_d">Nascita</label>
					<input type="date" class="form-control" name="nascita_d" id="nascita_d">
				</div>
                 <div class="form-group">
					<label for="prelievo">Sede Prelievo</label>
					<input id="prelievo" class="form-control" type="text" name="prelievo" placeholder="DH, Sala donatori, etc">
				</div>
				<div class="form-group">
					<label for="patologia">Patologia</label>
					<input id="patologia" class="form-control" type="text" name="patologia" placeholder="TINU, Celiachia, etc">
				</div>
				<div class="form-group">
					<label for="arrivo">Data di Arrivo</label>
					<input id="arrivo" class="form-control" type="date" name="arrivo">
				</div>
              </div>

              <!-- /.box-body -->

              <div class="box-footer">
				  <input type="hidden" name="send" value="Inserisci">
<input type="submit" value="Inserisci">              
          </div>
          <!-- /.box -->

</div></div></div>



	</form>
	
	<?php
	break;
}
	include($navigazione_http."footer.php");
?>
