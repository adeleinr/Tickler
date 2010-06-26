<?php

$events = Array();
$events["Food_SERVICE_0"] = Array();
$events["Food_SERVICE_0"][0] = Array();
$events["Food_SERVICE_0"][0]['ID'] = rand(0, time());
$events["Food_SERVICE_0"][0]['EVENT'] = "Orlando";
$events["Food_SERVICE_0"][1] = Array();
$events["Food_SERVICE_0"][1]['ID'] = rand(0, time());
$events["Food_SERVICE_0"][1]['EVENT'] = "Adelein";
$events["Food_SERVICE_1"] = Array();
$events["Food_SERVICE_1"][0] = Array();
$events["Food_SERVICE_1"][0]['ID'] = rand(0, time());
$events["Food_SERVICE_1"][0]['EVENT'] = "Oscar";
$events["Food_SERVICE_1"][1] = Array();
$events["Food_SERVICE_1"][1]['ID'] = rand(0, time());
$events["Food_SERVICE_1"][1]['EVENT'] = "Reti";
$events["Food_SERVICE_2"] = Array();
$events["Food_SERVICE_2"][0] = Array();
$events["Food_SERVICE_2"][0]['ID'] = rand(0, time());
$events["Food_SERVICE_2"][0]['EVENT'] = "Sale for this service, 50 % Discount";

echo json_encode($events);

?>