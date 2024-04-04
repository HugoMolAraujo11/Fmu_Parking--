<?php
class Banco
{

    function conectar()
    {
        $conexão = mysqli_connect("localhost", "root", "admin1234", "fmu_parking");
        return $conexão;
    }

    function query($con, $sql)
    {
        mysqli_query($con, $sql);
    }
}
