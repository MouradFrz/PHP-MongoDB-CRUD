<?php

namespace App\Controllers;

use App\Database\Connection;
use App\Database\NoSql;
use App\Models\User;
use Exception;
use MongoDB\Client;
use MongoDB\BSON\ObjectID;
use PDO;

class HomeController
{
    public static function test()
    {
        try {
            $pdo = Connection::getConnection();
            $stmt = $pdo->prepare('select * from carsales');
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public static function home()
    {
        $nsql = new NoSql();
        $collection = $nsql->usersCollection();
        $data = $collection->find([], [])->toArray();
        $data = json_decode(json_encode($data));
        require_once '../src/Views/home.php';
    }
    public static function showOne()
    {
        if (!isset($_GET['id'])) {
            require_once '../src/Views/403.php';
            die;
        }
        $id = $_GET["id"];
        $nsql = new NoSql();
        $collection = $nsql->usersCollection();
        $data = $collection->find([
            "_id" => new ObjectID($id),
        ])->toArray();
        $data = json_decode(json_encode($data[0]));
        require_once '../src/Views/showOne.php';
    }
    public static function addPage()
    {
        require_once '../src/Views/add.php';
    }
    public static function add()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $_SESSION["error"] = "Accessible by POST only";
            header("Location: /");
            die;
        }
        $name = $_POST['name'];
        $age = $_POST['age'];
        $nsql = new NoSql();
        $collection = $nsql->usersCollection();
        try {
            $collection->insertOne([
                "name" => $name,
                "age" => $age,
            ]);
        } catch (Exception $e) {
            $error = "Something Went Wrong";
            header("Location: /");
        }
        $_SESSION["success"] = "User added successfully";
        header("Location: /");
    }
    public static function delete()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $_SESSION["error"] = "Accessible by POST only";
            header("Location: /");
            die;
        }

        $id = $_POST['id'];

        $nsql = new NoSql();
        $collection = $nsql->usersCollection();
        try {
            $collection->deleteOne(['_id' => new ObjectID($id)]);
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        $_SESSION['success'] = "User deleted successfully";
        header("Location: /");
    }
    public static function update()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $_SESSION["error"] = "Accessible by POST only";
            header("Location: /");
            die;
        }

        $id = $_POST["id"];
        $name = $_POST["name"];
        $age = $_POST["age"];

        $nsql = new NoSql();
        $collection = $nsql->usersCollection();
        try {
            $collection->updateOne(
                ["_id" => new ObjectID($id)],
                ['$set' => [
                    "name" => $name,
                    "age" => $age
                ]]
            );
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
        $_SESSION['success'] = "User updated successfully";
        header("Location: /");
    }
}
