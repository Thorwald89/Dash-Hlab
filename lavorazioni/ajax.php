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


$sample= $_POST['sample'];
?>


									<option disabled selected><i>Locus</i></option>

				<?php
	$s= $link->query("select fogli_lavoro.* from fogli_lavoro where id_campione ='$sample' order by id") or die('1');
	while($r =mysqli_fetch_array($s)){
		


		?>
			
					<option value="<?=ucfirst($r['locus'])?>"><?=ucfirst($r['locus'])?></option>

		<?php
	}
	?>
				
