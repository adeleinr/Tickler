<?php

$client = Array();
$client['PROFILE_NAME'] = 'CLIENT';
$client['PRIMARY_KEY'] = 'ID';
$client['FORMS']['CLIENT_FORM']['ACTION'] = '/Controllers/Client/main.php?action=save_client';

$client['CSS_INCLUDES'] = Array();
$client['CSS_INCLUDES'][0] = '<link type="text/css" rel="stylesheet" href="/View/ClientPresentation/CSS/Client/client_add.css" />';

$client['LOCALIZED_LABELS'] = Array();
$client['LOCALIZED_LABELS'][0] = 'FORM_TITLE';
$client['LOCALIZED_LABELS'][1] = 'FIRST_NAME_TITLE';
$client['LOCALIZED_LABELS'][2] = 'LAST_NAME_TITLE';
$client['LOCALIZED_LABELS'][3] = 'EMAIL_TITLE';

$client['DISPLAY_FIELDS'] = Array();

$client['DISPLAY_FIELDS']['FIRST_NAME'] = Array();
$client['DISPLAY_FIELDS']['FIRST_NAME']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['LAST_NAME'] = Array();
$client['DISPLAY_FIELDS']['LAST_NAME']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['EMAIL'] = Array();
$client['DISPLAY_FIELDS']['EMAIL']['TYPE'] = 'TEXT';

$client['DISPLAY_BUTTONS']['BUTTON'] = Array();
$client['DISPLAY_BUTTONS']['BUTTON']['TYPE'] = 'SUBMIT'; 
$client['DISPLAY_BUTTONS']['BUTTON']['VALUE'] = 'Save'; 

$profiles = Array();
$profiles['CLIENT'] = $client;

?>