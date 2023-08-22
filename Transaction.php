<?php
include 'connexion.php';
class Transaction{

  private $connexion;

        public function s__construct(){
            $this->connexion=new DatabaseConnection();
           
        }
        public function Add($donnees){
            $tab= json_decode($donnees,true);
            $trans_description=$tab['trans_description'];
            $trans_date=$tab['trans_date'];
            $montant=$tab['montant'];
            $trans_type=$tab['trans_type'];
            $destination=$tab['destination'];
            $type_categorie=$tab['type_categorie'];
            $query="INSERT INTO transactions(trans_description,trans_date,montant,trans_type,destination,type_categorie) values('$trans_description','$trans_date','$montant','$trans_type','$destination','$type_categorie')";
            $res=$this->connexion->execute($query);
            if ($res) {
                 echo "Données  inserer avec succès.";
            }
            else {
                 echo "Erreur lors de l'insertion des données : " . $this->connexion->error;
            }
        } 
     
        public function Update($id,$donnees){
            $tab= json_decode($donnees,true);
            $trans_description=$tab['trans_description'];
            $trans_date=$tab['trans_date'];
            $montant=$tab['montant'];
            $trans_type=$tab['trans_type'];
            $destination=$tab['destination'];
            $type_categorie=$tab['type_categorie'];
            $query="UPDATE  transactions set trans_description='$trans_description',montant='$montant',trans_date='$trans_date',trans_type='$trans_type',destination='$destination',type_categorie='$nom_categorie' where id=$id";
            $res=$this->connexion->execute($query);
            if ($res) {
                echo "Données mises à jour avec succès.";
            } 
            else {
                echo "Erreur lors de la mise à jour des données : " . $this->connexion->error;
            }
        } 
      
        public function Delete($id){
            $query="UPDATE  transactions set supprimmer='true' where id=$id";
            $res=$this->connexion->execute($query);
            if($res){
                echo 'le donnée est bien supprimer';
            }else{
                echo "Erreur lors de la suppression des données : " . $this->connexion->error;
            }
        } 
        public function All(){
            $query="SELECT * FROM transactions";
            $res=$this->connexion->execute($query);
            
            $transaction=array();
            while($row = $res->fetch_assoc()){
                $transaction[]= [
                    'id'=> $row['id'],
                    'trans_description'=> $row['trans_description'],
                    'trans_date'=> $row['trans_date'],
                    'montant'=> $row['montant'],
                    'trans_type'=> $row['trans_type'],
                    'destination'=> $row['destination']
                ];
            }
            if($transaction==null){
                echo " il ya pas une ligne pour le numero ".$id;
            }
            else{
                return $transaction;
            }
           
        }
        
        public function GetTransaction($id){
            $query="SELECT * FROM transactions where id=$id";
            $res=$this->connexion->execute($query);
             
            $transaction=array();
            while($row = $res->fetch_assoc()){
                $transaction = [
                    'id'=> $row['id'],
                    'trans_description'=> $row['trans_description'],
                    'trans_date'=> $row['trans_date'],
                    'montant'=> $row['montant'],
                    'trans_type'=> $row['trans_type'],
                    'destination'=> $row['destination']
                ];
            }
            if($transaction==null){
                echo " il ya pas une ligne pour le numero ".$id;
            }
            else{
                return $transaction;
            }
        }
               
            
        
}
?>