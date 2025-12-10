<?php 
namespace src\dao;

use PDO;

class DepartmentRepository 
{
    private PDO $dbConnect;

    public function __construct()
    {
        $this->dbConnect = DbConnection::getInstance();
    }

    public function searchAll(): array
    {
        $query = "SELECT id_dep, `Name` FROM departements"; 
        
        $stmt = $this->dbConnect->prepare($query);

        $stmt->execute();
        return $stmt->fetchAll();
    }
}