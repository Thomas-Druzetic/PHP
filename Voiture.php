<?php
   
class Voiture {
   
    private $marque;
    private $couleur;
    private $immatriculation;
   
    // un getter      
    public function getMarque() {
        return $$this->marque;
    }
   
    // un setter 
    public function setMarque($m) {
        $$this->marque = $m;
    }
   
	//constructeur   
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
  	if (!is_null($m) && !is_null($c) && !is_null($i)) {
    // Si aucun de $m, $c et $i sont nuls,
    // c'est forcement qu'on les a fournis
    // donc on retombe sur le constructeur à 3 arguments
    	$$this->marque = $m;
    	$$this->couleur = $c;
    	$$this->immatriculation = $i;
  		}
	}
              
    // une methode d'affichage.
    public function afficher() {
		echo "Couleur = " . $this->getcouleur()  . "<br> Marque = " . $this->getMarque() . "<br> Immatriculation = " . $this->getimm();
    }
	
	public function getcouleur(){
		return $$this->couleur;
	}

	public function setcouleur($c){
		$$this->couleur = $c;
	}
	
	public function getimm(){
		return $$this->immatriculation;
	}
	
	public function setimmr($c){
		if(strlen($c) <= 8){
		$$this->couleur = $c;
	}
}

	public static function getVoitureByImmat($immat) {
    $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::getPDO()->prepare($sql);

    $values = array(
        "nom_tag" => $immat,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
}



}
?>