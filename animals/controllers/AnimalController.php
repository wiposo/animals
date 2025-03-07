<?php
require_once './models/Animal.php';
require_once './config/database.php';

class AnimalController {
    private $animal;
    private $db;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->animal = new Animal($db);
    }

    public function index() {
        $result = $this->animal->read();
        require_once './views/list.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->animal->name = $_POST['name'];
            $this->animal->species = $_POST['species'];
            $this->animal->age = $_POST['age'];
            $this->animal->description = $_POST['description'];

            if ($this->animal->create()) {
                header("Location: index.php");
            }
        }
        require_once './views/create.php';
    }

    public function edit($id) {
        $this->animal->id = $id;
        $result = $this->animal->readOne();
        $animal = $result->fetch(PDO::FETCH_ASSOC);
        require_once './views/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->animal->id = $id;
            $this->animal->name = $_POST['name'];
            $this->animal->species = $_POST['species'];
            $this->animal->age = $_POST['age'];

            if ($this->animal->update()) {
                header("Location: index.php");
            }
        }
    }

    public function delete($id) {
        $this->animal->id = $id;
        if ($this->animal->delete()) {
            header("Location: index.php");
        }
    }
}
?>