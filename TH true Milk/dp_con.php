<?php
$sever="localhost";
$user="root";
$password="";
$db_name="test_db";
$conn= mysqli_connect($sever,$user,$password,$db_name);
if(!$conn){
    echo"connection failed";
}