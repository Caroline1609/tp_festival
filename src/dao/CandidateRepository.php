<?php 

class CandidatRepository 
{
    private ?PDO $dbConnect=null;
    private int $nbCol;
    private array $tabColName = [];

    public function __construct()
    {
        $this->dbConnect=DbConnection::getInstance();
        $query="SELECT *  FROM candidats";
        $stmt= $this->dbConnect->query($query);            //l'une est une varible et l'autre une fonction
        $this->nbCol=$stmt->rowCount();                    //renvoie le nombre de colonne qu'il y a dans le jeu de résultats

    }

    public function searchAll():array
    {
        $query="SELECT * FROM candidats";    //* backtik : évite que le nom soit pris autrmeent
        $stmt=$this->dbConnect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    

}

?>