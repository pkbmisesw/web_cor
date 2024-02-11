<?php

function getPostById($id)
{
    global $conn;
    $query = "SELECT * FROM `m_post` WHERE id=$id";

    $sql = $conn->prepare($query);
    $sql->execute();

    $data = $sql->fetch();
    return $data;
}
