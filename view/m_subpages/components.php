<?php



function getSubpageById($id)
{
    global $conn;
    $query = "SELECT * FROM `m_subpages` WHERE id=$id";

    $sql = $conn->prepare($query);
    $sql->execute();

    $data = $sql->fetch();
    return $data;
}
