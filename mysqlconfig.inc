<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'controlegeral';

$con = mysqli_connect(
	$host,
	$user,
	$password,
	$db
);

// Checa conexão
if (mysqli_connect_errno()) {
	echo "Falha na conexão com o servido MySQL:  " . mysqli_connect_error();
} else {
	echo 'Conexão Ok!';
}
