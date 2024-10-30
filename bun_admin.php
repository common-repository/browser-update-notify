<?php 
		if($_POST['bun_hidden'] == 'Y') {
			//Form data sent
			$dbie = $_POST['bun_dbie'];
			update_option('bun_dbie', $dbie);
		  
		  $dbff = $_POST['bun_dbff'];
			update_option('bun_dbff', $dbff);
		  
		  $dbs = $_POST['bun_dbs'];
			update_option('bun_dbs', $dbs);
			
		  $db_showalways = $_POST['bun_showalways'];
			update_option('bun_showalways', $db_showalways);
			
		  $db_position = $_POST['bun_position'];
			update_option('bun_position', $db_position);			
			 
		?> 
		
			<div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
			<?php
		} else {
			//Normal page display
		  $dbie = get_option('bun_dbie');
		  $dbff = get_option('bun_dbff');
		  $dbs = get_option('bun_dbs');
		  $db_showalways = get_option('bun_showalways');
		  if ($db_showalways=="")
			  $db_showalways="0";
		  $db_position = get_option('bun_position');
		  if ($db_position=="")
			$dbposition="0";
		}
	?>
	

<div class="wrap">

			<?php    echo "<h2>" . __( 'Options', 'bun_trdom' ) . "</h2>"; ?>
			
			<form name="bun_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
				<input type="hidden" name="bun_hidden" value="Y">
				<?php    echo "<h4>" . __( 'Browser update notify settings', 'bun_trdom' ) . "</h4>"; ?>
				<table>
				
				 <tr>
				  <td>
				    <?php _e("IE version: " ); ?>
				  </td>
				  <td>
				  <input type="text" name="bun_dbie" value="<?php echo $dbie; ?>" size="20">
					<?php _e(" And Older" ); ?>
				  </td>
				 </tr> 
			
				<tr>
				  <td>
					<?php _e("FireFox version: " ); ?>
				  </td>
				  <td>
					<input type="text" name="bun_dbff" value="<?php echo $dbff; ?>" size="20">
					<?php _e(" And Older" ); ?>
				  </td>
				</tr>

				<tr>
					<td>
					  <?php _e("Safari version: " ); ?>
					 </td>
					 <td>
					  <input type="text" name="bun_dbs" value="<?php echo $dbs; ?>" size="20">
					  <?php _e(" And Older" ); ?>
					 </td>
				</tr>
						
				<tr>
					<td>
					  <?php _e("Show on all pages: " ); ?>
					</td>
					<td>
						<select name="bun_showalways">
							<option value="0" <?echo  $db_showalways=="0" ? "selected" : ""?>>No</option>
							<option value="1" <? echo $db_showalways=="1" ? "selected" : ""?>>Yes</option>
						</select>						
					</td>
				</tr>
				<tr><td>
				 <?php _e("Position: " ); ?>
				</td>
				<td>
					<select name="bun_position">
							<option value="0" <?echo  $db_position=="0" ? "selected" : ""?>>Bottom</option>
							<option value="1" <? echo $db_position=="1" ? "selected" : ""?>>Top</option>
						</select>						
				</td>
				</tr>
				
				</table>
				<p class="submit">
				<input type="submit" name="Submit" value="<?php _e('Update Options', 'bun_trdom' ) ?>" />
				</p>
				
			</form>

		</div>
	
	