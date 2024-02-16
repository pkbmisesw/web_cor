<?php

function getid($id)
{
    global $conn;
    $query = "SELECT * FROM `m_materi_list` WHERE id=$id";

    $sql = $conn->prepare($query);
    $sql->execute();

    $data = $sql->fetch();
    return $data;
}

?>