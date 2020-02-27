<?php
require("src/functions.php");

task1();

$array = [
    "index" => 0,
    "isActive" => true,
    "eyeColor" => "green",
    "name" => "Nadine Key",
    "about" => "Commodo ex officia ipsum sint voluptate magna adipisicing dolore culpa incididunt et aliqua nisi occaecat.",
    "friends" => [
        [
            "id" => 0,
            "name" => "Mcleod Newman"
        ],
        [
            "id" => 1,
            "name" => "Evelyn Mccullough"
        ],
        [
            "id" => 2,
            "name" => "Kelley Moses"
        ]
    ]
];
task2($array);
task3();

task4();

task5();

task6();