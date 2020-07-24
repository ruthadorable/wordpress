<div class="wrap">


	<?php
	if(isset($_POST['submit']))
	{

		//enregistrement en base de données 

		update_option('popup_ruth_contenu',$_POST['popup_ruth_contenu']);
		update_option('popup_ruth_actif',$_POST['popup_ruth_actif']);
		update_option('popup_ruth_display',$_POST['popup_ruth_display']);
		update_option('popup_ruth_display_pages',$_POST['popup_ruth_display_pages']);
		echo '<div id="messages" class="updated">Réglages enregistrés</div>';
	}
	?>
	<h1> <span class="dashicons dashicons-admin-appearance"></span> Réglages de la popup</h1>
	<form action =" <?php echo str_replace('%7E','˜',$_SERVER['REQUEST_URI']) ?> " name="ruth_popup" method="post">

<?php

$contenu_popup=get_option('popup_ruth_contenu'); //aller chercher le contenu de l'option en bd
$popup_ruth_actif=get_option('popup_ruth_actif'); //aller chercher le contenu de l'option en bd
$popup_ruth_display=get_option('popup_ruth_display'); //aller chercher le contenu de l'option en bd
$popup_ruth_display_pages=get_option('popup_ruth_display_pages'); //aller chercher le contenu de l'option en bd
wp_editor($contenu_popup,'popup_ruth_contenu');

?>		
	<div class="wrap">
	<label for="popup_ruth_actif">Activez le plugin?</label>
	<select name="popup_ruth_actif" id="popup_ruth_actif">
		<option value="oui" <?php selected($popup_ruth_actif,'oui') ?> >Oui </option>
		<option value="non" <?php selected($popup_ruth_actif,'non')?> >Non</option>
	</select>
	</div>
	<div  class="wrap">
		<label for="popup_ruth_actif">Choisissez la /les pages sur lesquelles vous souhaitez afficher la popup</label>
			<select name="popup_ruth_actif" id="popup_ruth_display">
				<option value="1" <?php selected($popup_ruth_actif,'1') ?> >Sur la page d'accueil</option>
				<option value="2" <?php selected($popup_ruth_actif,'2') ?> >Sur l'ensemble des pages du site</option>
				<option value="3" <?php selected($popup_ruth_actif,'3') ?> >Sur les pages sélectionnées ...</option>
			</select>
	</div>

	<?php
	$args=array('sort_order'=>'asc',
				'sort_column'=>'post_title',
				'post_type'=>'page',
				'post_status'=>'publish');

	$pages=get_pages($args);

	//var_dump($pages);

	?>
	<div class="wrap">
		<select name="popup_ruth_display_pages[]" id="popup_ruth_display_pages" multiple style="display:none">
			<?php
			foreach($pages as $key => $value)
			{
				$id = $value -> ID;
				$post_title = $value -> post_title;
				echo '<option value="'.$id.'"';
				in_array($id, $popup_ruth_display_pages) ? print 'selected' :print '';
				echo '>'.$post_title.'</option>';
			}
			?>
		</select>
	</div>
		<input type="submit" value="Envoyez" name="submit">
	</form>
</div>
