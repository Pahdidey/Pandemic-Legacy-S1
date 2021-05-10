<h1>Lancer une nouvelle partie</h1>

<form action="index.php?page=action-nouvelle-partie" method="POST">

	<p>Participants&nbsp;: </p>

	<div class="flex">
		<?php
			$recSQL = "SELECT * FROM pandemiclegacys1_joueurs";
			$result = mysqli_query($link , $recSQL);
			while ($ligne = mysqli_fetch_array($result)) {
		?>
			<div class="flex50">
				<label for="perso-<?php echo $ligne['id']; ?>"><strong><?php echo $ligne['nom']; ?></strong></label>
				<select id='perso-<?php echo $ligne['id']; ?>' name='perso-<?php echo $ligne['id']; ?>'>
					<option value=""></option>
					<?php
						$recSQL2 = "SELECT * FROM pandemiclegacys1_roles";
						$result2 = mysqli_query($link , $recSQL2);
						while ($ligne2 = mysqli_fetch_array($result2)) {
					?>
						<option value="<?php echo $ligne2['id']; ?>"><?php echo $ligne2['nom']; ?></option>
					<?php
						}
						mysqli_free_result($result2);
					?>
				</select>
			</div>
		<?php } ?>
		<?php mysqli_free_result($result); ?>
	</div>


	<div class="checkbox">
		<p>Cartes événement&nbsp;: </p>

		<div class="flex">
			<?php
				$recSQL = "SELECT * FROM pandemiclegacys1_cartes WHERE type = 'Evenement'";
				$result = mysqli_query($link , $recSQL);
				while ($ligne = mysqli_fetch_array($result)) {
			?>
				<div class="flex33">
				  	<input type="checkbox" id="<?php echo $ligne['id']; ?>" name="event[]" value="<?php echo $ligne['nom']; ?>" />
					<label for="<?php echo $ligne['id']; ?>"> <?php echo $ligne['nom']; ?></label>
				</div>
			<?php 
			} 
			mysqli_free_result($result); 
			?>
		</div>
	</div>

    <button type="submit" id="button">Lancer la partie</button>
</form>