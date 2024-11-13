<?php
//require '../DB/db.php';
require $_SERVER['DOCUMENT_ROOT'] . '/Expenses/IEMsystem/DB/db.php';

class MST_Types
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

public function Get_MAST_TYpes(){

    try {
        
        $stmt = $this->pdo->prepare("SELECT * FROM mst_types");
        $stmt->execute();
        $mst_typs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r ($mst_typs);
        return $mst_typs;

    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }

}

public function Get_TransCatgory($user_id){
    try {
        
        $stmt = $this->pdo->prepare("SELECT * FROM mst_catergory where CreatedBy=?");
        $stmt->execute([$user_id]);
        $mst_category =$stmt->fetchAll(PDO::FETCH_ASSOC);

        //print_r($mst_category);
        return $mst_category;
    } catch (\Throwable $th) {
        //throw $th;
    }
}

}

//$cls =new MST_Types($pdo);
//$cls->Get_TransCatgory(9);
?>