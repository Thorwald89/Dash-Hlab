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
include('setup/setup.php');
session_start();

	$admin=$_SESSION['admin'];
	$login=$_SESSION['login'];
	
$navigazione_http="";


$login = $_SESSION['login'];

$id = $_GET['id'];

$pos=$_GET['pos'];

$send = $_POST['send'];



include($navigazione_http.'head.php');
include($navigazione_http.'sidebar.php');


switch($pos)
{

case 'paziente':
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accettazione
        <small>Inserisci i dati del probando o del familiare</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Accettazione</a></li>
        <li class="active">Inserimento Campioni</li>
      </ol>
    </section>

	 <div id="alert" >
              </div>
	<!-- Main content -->
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
               
                              <div class="form-group">
  
               	<select class="form-control" name="grado" id="grado">
		<option value="probando">Probando</option>
		<option value="madre">Madre</option>
		<option value="padre">Padre</option>
		<option value="f1">Fratello 1</option>
		<option value="f2">Fratello 2</option>
		<option value="f3">Fratello 3</option>
		<option value="f4">Fratello 4</option>
		<option value="f5">Fratello 5</option>
		<option value="f6">Fratello 6</option>
		<option value="f7">Fratello 7</option>
		<option value="f8">Fratello 8</option>

		</select>
              </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
				<div class="form-group ">
					<input type="radio" name="tipo" value="INT" id="tipo">INT - <input type="radio" name="tipo" value="DEP" id="tipo">DEP - <input type="radio" name="tipo" value="EST" id="tipo">EST - <input type="radio" name="tipo" value="CQ" id="tipo">CQ			
			</div>              </div>
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
					<input type="text" class="form-control" name="nome_d" id="nome_d" placeholder="Nome">
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
	
case 'cordone':
?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accettazione
        <small>Inserisci i dati del cordone</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Accettazione</a></li>
        <li class="active">Inserimento Campioni</li>
      </ol>
    </section>

	 <div id="alert" >
              </div>
	<!-- Main content -->
    <form role="form" >
		<section class="content">
      <div class="row">
        <!-- left column -->
      <div class="col-md-6">
  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anagrafica Cordone</h3>
            </div>
		
              <div class="box-body">
                <div class="form-group">
                  <label for="nome_d">Nome</label>
					<input type="text" class="form-control" name="nome_d" id="nome_d" placeholder="Nome">
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
					<label for="barcode">barcode</label>
					<input id="barcode" class="form-control" type="text" name="barcode" placeholder="Barcode">
				</div>				
				<div class="form-group">
					<label for="arrivo">Data arrivo</label>
					<input id="arrivo" class="form-control" type="date" name="arrivo" >
				</div>

              </div>

              <!-- /.box-body -->

			
			
			
          <!-- /.box -->

</div>
</div>

 
 <!-- right column -->
        <div class="col-md-6">
  <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Anagrafica Madre</h3>
            </div>
		
              <div class="box-body">
                <div class="form-group">
                  <label for="nome_mom">Nome Madre</label>
					<input type="text" class="form-control" name="nome_mom" id="nome_mom" placeholder="Nome">
				</div>
                 <div class="form-group">
					<label for="cognome_mom">Cognome Madre</label>
					<input type="text" class="form-control" name="cognome_mom" id="cognome_mom" placeholder="Cognome">
				</div>
                <div class="form-group">
					<label for="nascita_mom">Nascita Madre</label>
					<input type="date" class="form-control" name="nascita_mom" id="nascita_mom">
				</div>
                 <div class="form-group">
					<label for="ospedale">Ospedale</label>
					<input id="ospedale" class="form-control" type="text" name="ospedale" placeholder="DH, Sala donatori, etc">
				</div>


              </div>

              <!-- /.box-body -->

             
          <!-- /.box -->

</div></div></div>

				<div class="box-body">
					<div class="form-group">
						<input type="hidden" name="send" value="Inserisci_cordone">
						<input type="submit" value="Inserisci"> 
					</div>
				</div>

	</form>
	<?php
	break;
	}


include('footer.php');

?>
