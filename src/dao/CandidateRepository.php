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

    public function insert(string $_lastname,string $_firtsname,string $_mail,string $_pass, int $_department, int $_age, int $_archive_user=0):bool
{     
    $lastname = trim($_lastname);
    $firstname=trim($_firtsname);
    $mail =filter_var($_mail,FILTER_VALIDATE_EMAIL);
    $pass=password_hash(trim($_pass),PASSWORD_ARGON2ID);
    $department=filter_var($_department,FILTER_VALIDATE_INT);
    $age=filter_var($_age,FILTER_VALIDATE_INT);

    $query="INSERT INTO candidats VALUES (id_user,:lastname,:firstname,:mail,:pass, :department, :age,:archive)";
    $stmt= $this->dbConnect->prepare($query);
    return $stmt->execute([
        ':lastname'=>$lastname,
        ':firstname'=>$firstname,
        ':mail'=>$mail,
        ':pass'=>$pass,
        ':department'=>$department,
        ':age'=>$age,
        ':archive'=>$_archive_user
    ]);
}

    public function update(array $data):bool
{
    $query="UPDATE candidates SET username=:username, password=:password, department=:department, age=:age WHERE email=:email";
    $stmt= $this->dbConnect->prepare($query);
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