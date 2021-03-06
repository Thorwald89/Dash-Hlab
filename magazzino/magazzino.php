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



?>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Magazzino
        <small>Elenco dei prodotti presenti in magazzino</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> Gestione Laboratorio</a></li>
        <li class="active">Magazzino</li>
      </ol>
    </section>

	 <div id="alert" >
              </div>
	<!-- Main content -->
    <form role="form" >
		<section class="content">
			
			
			 <!-- Inserimento form elements -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Inserisci Prodotto</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
            </div>
		
              <div class="box-body">
					<div class="form-group">
						<label for="barcode">ID Campione</label>
						<i class="fa fa-barcode"></i><input type="text" class="form-control" name="barcode" id="barcode" placeholder="ID Campione" >
						<p class="help-block">Cerca il campione usando il barcode.</p>
					</div>
              </div>
              <!-- /.inserimento -->
			
			
			
		</div>	
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
	
	


include($navigazione_http.'footer.php');

?>
