<?php 

class CandidateRepository 
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

    public function update(array $data):bool
{
    $query="UPDATE candidates SET username=:username, password=:password, department=:department, age=:age WHERE email=:email";
    $stmt= $this->dbconnect->prepare($query);
    return $stmt->execute([
        ':username'=>$data['username'],
        ':email'=>$data['email'],
        ':password'=>$data['password'],
        ':department'=>$data['department'],
        ':age'=>$data['age']
    ]);
}

    

}

?>