 <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "paragonik_db";
    $dsn = ("mysql:host=$host; dbname=paragonik_db");



    

    TRY {
    $conn = new PDO( $dsn, $username, $password );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['submit'])) {
        $username1 = $_POST['username1'];
        $password1 = $_POST['password1'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $mail = $_POST['mail'];

if (isset($_POST['UserID'])) {

    $id = $_POST['UserID'];

    $sql = "UPDATE members SET"
        . "login=".$conn->quote($username1)
        . "password=".$conn->quote($password1)
        . "name=".$conn->quote($firstname)
        . "surname".$conn->quote($lastname)
        . "mail".$conn->quote($mail)
        . " WHERE UserID = ".$conn->quote($id);
    $members = $conn->query($sql);
} else {

    $sql = "INSERT INTO members("
        . "UserName, password, FirstName, LastName"
        . " ) VALUES ("
        . $conn->quote($username1).","
        . $conn->quote($password1).","
        . $conn->quote($firstname).","
        . $conn->quote($lastname).")";
        $members = $conn->query($sql);
        }
    } elseif (isset($_GET['ID'])) {
        $userEditDataRows = $conn->query('SELECT * FROM members WHERE UserID ='.$conn->quote($_GET['UserID']));
        if (sizeof($userEditDataRows)>0) {
    $row = $userEditDataRows[0];
    $username1 = $_POST['username1'];
    $password1 = $_POST['password1'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $mail = $_POST['mail'];
    $id = $_GET['UserID'];
        }

    }

$table = '</table>';

    } catch (PDOException $e) {
     exit("Connection failed: " . $e->getMessage());
    }
    ?>