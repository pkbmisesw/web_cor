<?php

function get(){
    global $conn;
    $query = "SELECT * FROM `setting`";

    $sql = $conn->prepare($query);
    $sql->execute();

    $data = $sql->fetch();
    return $data;
}

?>