<?php
// Initialize the session
session_start();

require_once('./config.php');


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

if (isset($_POST["email"]) && isset($_POST["password"])) {
  $email_txt = $_POST["email"];
  $hashed_password = hash("md5",$_POST["password"]);
  $stmt = $conn->prepare("SELECT id, email, password FROM users WHERE email=? AND password=?");
  if(!$stmt->execute(array($email_txt,$hashed_password))){
    $conn = null;
    exit();
  }
  $_SESSION['logged_in'] = true;
  $_SESSION['email'] = $email_txt;
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
  header("location: index.php");
}
