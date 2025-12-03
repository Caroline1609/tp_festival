<?php 

class DepartmentRepository 
{
    private ?PDO $dbConnect=null;
    private int $nbCol;
    private array $tabColName = [];

    public function __construct()
    {
        $this->dbConnect=DbConnection::getInstance();
        $query="SELECT *  FROM departements";
        $stmt= $this->dbConnect->query($query);            //l'une est une varible et l'autre une fonction
        $this->nbCol=$stmt->rowCount();                    //renvoie le nombre de colonne qu'il y a dans le jeu de résultats

    }

    public function searchAll():array
    {
        $query="SELECT `id_dep`, `Name` FROM departements";     //`` backtik : évite que le nom soit pris autrmeent 
        $stmt=$this->dbConnect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }


}
