<?php
/*
 * Copyright 2018 Thorwald Donato Madalese
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



$send = urldecode($_POST['send']); 


if($send == 'aggiungi_esame'){
// inserisco i dati nel db schede per il campione
$locus = $_POST['loci'];
$loci = implode(",", $locus);
$sample =$_POST['barcode'];
echo ' <div id="alert-ok" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Registrazione esami  '.$loci.' effettuato correttamente per il campione '.$sample.'!"</h4>              </div>';


//controllo che non esista già nel database
		
			$control =$link->query("SELECT * FROM fogli_lavoro WHERE id_campione like '$sample'");
			$control_num=mysqli_num_rows($control);

			if($control->num_rows == 0){
			
				$s= $link->query("INSERT INTO fogli_lavoro (`id_campione`, `locus`, `metodica`, `estrazione`) values ('".urldecode($_POST['barcode'])."', '$loci','".urldecode($_POST['metodica'])."', '".urldecode($_POST['estrazione'])."') ") or die('1');		

			}elseif($control->num_rows >= 1){
				
				$control_array = mysqli_fetch_array($control);
				$c_locus = $control_array['locus'];
				$c_metodica = $control_array['metodica'];
				$c_estrazione = $control_array['estrazione'];
			
				$c_locus = $c_locus.",".$loci;
				$c_metodica = $c_metodica.",".$_POST['metodica'];
				

				$s= $link->query("UPDATE fogli_lavoro SET `locus`='$c_locus',`metodica`='$c_metodica',`estrazione`='$c_estrazione' WHERE `id_campione` ='$sample'") or die(mysqli_error($link));		

			}
		
			
}elseif($send == 'Inserisci_esami'){

//inserisco i risultati degli esami nella tabella esami	
	$sample = $_POST['barcode'];

echo ' <div id="alert-danger" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Registrazione risultati effettuato correttamente per il campione '.$sample.'!"</h4>              </div>';


			//controllo che non esista già nella tabella esami
		
			$control =$link->query("SELECT * FROM esami WHERE id_campione like '$sample'")or die(mysqli_error($link));
			$control_num=mysqli_num_rows($control);

			if($control->num_rows == 0){
			
				$s= $link->query("INSERT INTO esami (`id_campione`, `data_test`, `operatore`, `DNA`, `locus_A`, `locus_B`, `locus_C`, `locus_DRB`, `locus_DQA`, `locus_DQB`, `locus_DPB`) values ('".urldecode($sample)."', NOW(),'$login', '".urldecode($_POST['estrazione'])."', '".urldecode($_POST['locus_A'])."', '".urldecode($_POST['locus_B'])."', '".urldecode($_POST['locus_C'])."', '".urldecode($_POST['locus_DRB'])."', '".urldecode($_POST['locus_DQA'])."', '".urldecode($_POST['locus_DQB'])."', '".urldecode($_POST['locus_DPB'])."') ") or die(mysqli_error($link));		

			}elseif($control->num_rows >= 1){
				
				
				$control_array = mysqli_fetch_array($control);
				$c_locus_A = $control_array['locus_A'];
				$c_locus_B = $control_array['locus_B'];
				$c_locus_C = $control_array['locus_C'];
				$c_locus_DRB = $control_array['locus_DRB'];
				$c_locus_DQA = $control_array['locus_DQA'];
				$c_locus_DQB = $control_array['locus_DQB'];
				$c_locus_DPB = $control_array['locus_DPB'];
				$c_DNA = $control_array['DNA'];
			
				$c_locus_A = $c_locus_A.",".$_POST['locus_A'];
				$c_locus_B = $c_locus_B.",".$_POST['locus_B'];
				$c_locus_C = $c_locus_C.",".$_POST['locus_C'];
				$c_locus_DRB = $c_locus_DRB.",".$_POST['locus_DRB'];
				$c_locus_DQA = $c_locus_DQA.",".$_POST['locus_DQA'];
				$c_locus_DQB = $c_locus_DQB.",".$_POST['locus_DQB'];
				$c_locus_DPB = $c_locus_DPB.",".$_POST['locus_DPB'];
				

				$s= $link->query("UPDATE esami SET `locus_A`='$c_locus_A', `locus_B`='$c_locus_B', `locus_C`='$c_locus_C', `locus_DRB`='$c_locus_DRB', `locus_DQA`='$c_locus_DQA', `locus_DQB`='$c_locus_DQB', `locus_DPB`='$c_locus_DPB' WHERE `id_campione` ='$sample'") or die(mysqli_error($link));		

			}
			
			
			//deleto la stringa da fogli_lavoro 
			$b = $link->query("DELETE FROM fogli_lavoro WHERE id_campione = '$sample'") or die(mysqli_error($link));


}elseif($send == 'cerca'){

//inserisco i risultati degli esami nella tabella esami	
	$sample = $_POST['barcode'];



			//controllo che esista già nella tabella esami
		
			$control =$link->query("SELECT esami.*, cordoni.* FROM esami INNER JOIN cordoni ON esami.id_campione=cordoni.barcode WHERE esami.id_campione like '$sample'")or die(mysqli_error($link));
			$control_num=mysqli_num_rows($control);
			$r = mysqli_fetch_array($control);

			if($control->num_rows == 0){
			
echo ' <div id="alert-danger" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
				Campione '.$sample.' non trovato nel database!</div>';
				
			}elseif($control->num_rows >= 1){

	echo ' <div id="alert-danger" class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>Ricerca del cordone '.$sample.' conclusa!</br></h4>

                              </div>';
		
			?>
			
              <div id="provola" >
       
	
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
                  <input type="text" class="form-control" name="barcode1" id="barcode1" disabled value="<?= $r['id_campione'] ?>" >
                  <input type="hidden" class="form-control" name="barcode" id="barcode" value="<?= $r['id_campione'] ?>" >
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
					<input id="estrazione" class="form-control" type="text" name="dna" value="<?= $r['DNA'] ?>">
					<p><i>Inserire il valore in ng/&micro;l</i></p>
				</div>
              </div>
			
			<div class="box-body">
				<div class="form-group">
					<label for="locus_A">Locus A</label>
					<input id="locus_A" class="form-control" type="text" name="locus_A" value="<?= $r['locus_A'] ?>">
				</div>
             </div>
             <div class="box-body">
				<div class="form-group">
					<label for="locus_B">Locus B</label>
					<input id="locus_B" class="form-control" type="text" name="locus_B" value="<?= $r['locus_B'] ?>">
				</div>
             </div>
             <div class="box-body">
				<div class="form-group">
					<label for="locus_C">Locus C</label>
					<input id="locus_C" class="form-control" type="text" name="locus_C" value="<?= $r['locus_C'] ?>">
				</div>
             </div>
			<div class="box-body">
				<div class="form-group">
					<label for="locus_DRB">Locus DRB</label>
					<input id="locus_DRB" class="form-control" type="text" name="locus_DRB" value="<?= $r['locus_DRB'] ?>">
				</div>
             </div>			
             <div class="box-body">
				<div class="form-group">
					<label for="locus_DQA">Locus DQA</label>
					<input id="locus_DQA" class="form-control" type="text" name="locus_DQA" value="<?= $r['locus_DQA'] ?>">
				</div>
             </div>			
             <div class="box-body">
				<div class="form-group">
					<label for="locus_DQB">Locus DQB</label>
					<input id="locus_DQB" class="form-control" type="text" name="locus_DQB" value="<?= $r['locus_DQB'] ?>">
				</div>
             </div>			
             <div class="box-body">
				<div class="form-group">
					<label for="locus_DPB">Locus DPB</label>
					<input id="locus_DPB" class="form-control" type="text" name="locus_DPB" value="<?= $r['locus_DPB'] ?>">
				</div>
             </div>             
              <!-- /.box-body -->				
			
			


              <div class="box-footer">
					<input type="hidden" name="send" value="Inserisci_esami">
					<input type="submit" value="Inserisci">              
          </div>
          <!-- /.box -->

</div>

</div>



	</form>
              </div>
			<?php
			}
			
			

}else{
echo ' <div id="alert-danger" class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
Errore, Contatta il gestore del sistema.              </div>';

}

/*
		// decurto i lotti dal db prodotti

		$var_alb = "2";
		$var_DMSO = "1";
		$var_siringhe = "3";
		$var_rubinetti = "1";
		$var_sacche = "";
		$var_antigamma="";
		$var_cd34 ="";


		$albumina = mysqli_query("update prodotti set quota = quota - '".$var_alb."' where lotto = '".$_POST['lotto_albumina']."' ") or die (mysqli_error());
		$DMSO = mysqli_query("update prodotti set quota = quota - '".$var_DMSO."' where lotto = '".$_POST['lotto_DMSO']."' ") or die (mysqli_error());
		$siringhe = mysqli_query("update prodotti set quota = quota - '".$var_siringhe."' where lotto = '".$_POST['lotto_siringhe']."' ") or die (mysqli_error());
		$rubinetti = mysqli_query("update prodotti set quota = quota - '".$var_rubinetti."' where lotto = '".$_POST['lotto_rubinetti']."' ") or die (mysqli_error());
		$sacche = mysqli_query("update prodotti set quota = quota - '".$var_sacche."' where lotto = '".$_POST['lotto_sacche']."' ") or die (mysqli_error());
		$antigamma = mysqli_query("update prodotti set quota = quota - '".$var_antigamma."' where lotto = '".$_POST['lotto_antigamma']."' ") or die (mysqli_error());
		$cd34 = mysqli_query("update prodotti set quota = quota - '".$var_cd34."' where lotto = '".$_POST['lotto_cd34']."' ") or die (mysqli_error());



		// inserisco in log_prodotti

		$f_albumina= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_albumina']."','$var_alb','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_DMSO= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_DMSO']."','$var_DMSO','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_rubinetti= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_siringhe']."','$var_siringhe','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_siringhe= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_rubinetti']."','$var_rubinetti','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_sacche= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_sacche']."','$var_sacche','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_antigamma= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_antigamma']."','$var_antigamma','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());
		$f_cd34= mysqli_query("insert INTO log_prodotti (lotto, quota, data, valore) VALUES ('".$_POST['lotto_cd34']."','$var_cd34','".$_POST['data_congelamento']."','Scarico Congelamento Sacca')") or die(mysqli_error());

		


		
*/



	?>
				
