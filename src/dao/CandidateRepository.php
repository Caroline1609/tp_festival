<?php 

class CandidateRepository 
{
    private ?PDO $dbConnect = null;
    private int $nbCol;
    private array $tabColName = [];

    public function __construct()
    {
        $this->dbConnect = DbConnection::getInstance();
        $query = "SELECT * FROM candidats";
        $stmt = $this->dbConnect->query($query);
        $this->nbCol = $stmt->rowCount();
    }

    public function searchAll(): array
    {
        $query = "SELECT * FROM candidats";
        $stmt = $this->dbConnect->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function emailExists(string $email): bool
    {
        $query = "SELECT COUNT(*) FROM candidats WHERE mail_user = :email";
        $stmt = $this->dbConnect->prepare($query);
        $stmt->execute([':email' => trim($email)]);
        return $stmt->fetchColumn() > 0;
    }

    public function insert(string $_lastname, string $_firstname, string $_mail, string $_pass, int $_department, int $_age, int $_archive_user = 0): bool
    {     
        $lastname = trim($_lastname);
        $firstname = trim($_firstname);
        $mail = trim($_mail); // ✅ Ne pas utiliser filter_var ici, déjà validé dans le contrôleur
        $pass = password_hash(trim($_pass), PASSWORD_ARGON2ID);
        $department = (int)$_department;
        $age = (int)$_age;

        $query = "INSERT INTO candidats (lastname_user, firstname_user, mail_user, pass_user, departement_user, age_user, archive_user) 
                  VALUES (:lastname, :firstname, :mail, :pass, :department, :age, :archive)";
        
        $stmt = $this->dbConnect->prepare($query);
        
        return $stmt->execute([
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':mail' => $mail,
            ':pass' => $pass,
            ':department' => $department,
            ':age' => $age,
            ':archive' => $_archive_user
        ]);
    }
}

?>