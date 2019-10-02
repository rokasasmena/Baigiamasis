<?php declare(strict_types=1);
namespace RA\Repository;
use \RA\Entity\Student;
class StudentasRepo

{
    private $conn;
    /**
     * StudentasRepo constructor.
     */
    public function __construct()

$host = "localhost";
$username = "kaunas";
$password = "kaunas123";
$database = "baigiamasis";

try {
    $connect = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Database Connection Done';
}
catch(\PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
}
 public function gautiStudentus(): array
    {
        $stmt = $this->conn->prepare('SELECT * FROM studentas');
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $studentai = $stmt->fetchAll();
        return $studentai;
    }
    public function save(Student $student): void
    {
        $stmt = $this->conn->prepare(
            'INSERT INTO studentas (vardas, pavarde, asmens_kodas, grupe) VALUES (:vrd, :pvd, :ak, :grp);'
        );
        $stmt->bindParam(':vrd', $student->getFirstName());
        $stmt->bindParam(':pvd', $student->getLastName());
        $stmt->bindParam(':ak', $student->getPersonCode());
        $stmt->bindParam(':grp', $student->getGroup());
        $stmt->execute();
    }
    public function close()
    {
        $this->conn = null;
    }
}
?>

