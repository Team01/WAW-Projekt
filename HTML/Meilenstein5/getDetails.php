<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 01 Jan 1996 00:00:00 GMT');

header('Content-type: application/json');

$data = file_get_contents("/Messedaten.json")

echo json_encode($data);

?>