<?php
require_once __DIR__ . '/Dbconnexion.php';

class CandidateRepository
{
    private PDO $pdo;
    private string $table = "candidats";

    public function __construct()
    {
        $this->pdo = Dbconnexion::getInstance();
    }

    public function searchAll(): array
    {
        $sql = "SELECT lastname_user, firstname, mail_user, pass_user, departement_user, age_user FROM {$this->table}";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    private function encryptPassword(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function createCandidate(string $lastname, string $firstname, int $age, string $email, string $password): bool {


        $hashedPassword = $this->encryptPassword($password);

        $sql = "INSERT INTO {$this->table} (lastname_user, firstname, age_user, mail_user, pass_user, departement_user) 
                VALUES (:lastname, :firstname, :age, :email, :pass, :departement)";

        try {
            $stmt = $this->pdo->prepare($sql);
            

            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':age', $age, PDO::PARAM_INT);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $hashedPassword);
            $stmt->bindParam(':departement', $departement);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion : " . $e->getMessage();
            return false;
        }
    }

    function verifyPassword(string $password, string $hash): bool {
    return password_verify($password, $hash);
}

}