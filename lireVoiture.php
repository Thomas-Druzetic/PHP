<?php
	require_once 'Model.php';
	require_once 'Voiture.php';
	$input = 'SELECT * FROM voiture WHERE marque="JEEP"';
	getVoitureByImmat($immat) {
	$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);
}
	try{
		$rep = Model::getPDO()->query($input);
}
	catch(PDOException $e) {
  		echo $e->getMessage(); // affiche un message d'erreur
  		die();
  	}
  	$rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
	$tab_voit = $rep->fetchAll();
	foreach($tab_voit as $v){
		$v::afficher();
	}
?>