<?php 
include "../../../conn.php";
$login = $_POST['r'];
// É feita uma verificação via AJAX se o usuario ja existe ou não
$sql = "SELECT userLogin FROM login WHERE userLogin = BINARY '$login'";
$query = $mysqli->query($sql);
$row = $query->fetch_array();

$sql = "SELECT admLogin FROM loginadm WHERE admlogin = BINARY '$login'";
$query = $mysqli->query($sql);
$row2 = $query->fetch_array();

if(empty(ltrim($login))){
    echo "";
} elseif($row['userLogin'] || $row2['admLogin']){
    echo "<span class='error'>Usuario ja existente!</span>";
} else{
    echo "<span class='sucess'>Usuario disponivel!</span>";
}
?>