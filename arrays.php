<?php

$estudiantes = array("Carlos","Jose","Maria", "Luis");
echo "<pre>";
// var_dump($estudiantes);
print_r($estudiantes);
echo "</pre>";

echo $estudiantes[2];

$Instructor = [
  "nombre" => "juan",
  "Apellido" => "Vasquez",
  "deudas" => 3,700.000
];

echo  "<pre>";
print_r($Instructor);
echo "</pre>";

$tutor = [
  "nombre" => "juan",
  "Apellido" => "Vasquez",
  "edad" => "19",
  "direccion" => [
  "Carrera 26 No 18-65",
  "ciudad " => "Giron"
  ],
  "Habilidades " => [
  "git", "python", "css","js", "html", "java"
  ]
];

echo  "<pre>";
print_r($tutor);

echo "</pre>";

$tutor ["Habilidades"][3]=["java script"];

echo count($tutor);







