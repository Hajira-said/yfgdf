<?php
include 'Transaction.php';
 
class TransactionController{
    private $trans;



    public  function __construct(){
      $this->trans=new Transactions ();
    }
    public function Add($donnees){
        $this->trans->Add($donnees);
    }

    public function update($id,$donnees){
        $this->trans->Update($id,$donnees);
    }

    public function delete($id){
        $this->trans->delete($id);
    }

    public function all(){
      return $this->trans->all();
    }

    public function gettransaction(){
        return $this->trans->gettransaction($id);
    }

}