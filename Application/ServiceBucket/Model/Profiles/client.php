<?php

// Common
$client = Array();
$client['PROFILE_NAME'] = 'CLIENT';
$client['PRIMARY_KEY'] = 'CLIENT_ID';
$client['FORMS'] = Array();
$client['FORMS']['REGISTER_FORM']['ACTION'] = '/client_save';
$client['FORMS']['LOGIN_FORM']['ACTION'] = '/client_login';

$client['CSS_INCLUDES'] = Array();
$client['CSS_INCLUDES'][0] = '<link rel="stylesheet" href="http://uranus/View/ClientPresentation/CSS/Blueprint/screen.min.css" type="text/css" media="screen, projection" />';
$client['CSS_INCLUDES'][1] = '<link rel="stylesheet" href="http://uranus/View/ClientPresentation/CSS/Blueprint/print.min.css" type="text/css" media="print" />';
$client['CSS_INCLUDES'][2] = '<!--[if IE]><link rel="stylesheet" href="http://uranus/View/ClientPresentation/CSS/Blueprint/ie.min.css" type="text/css" media="screen, projection" /><![endif]-->'; 
$client['CSS_INCLUDES'][3] = '<link rel="stylesheet" href="/View/ClientPresentation/CSS/Global/global.lib.css" type="text/css"/>';
$client['CSS_INCLUDES'][4] = '<link rel="stylesheet" href="/View/ClientPresentation/CSS/Client/client.css" type="text/css"/>';

$client['JS_INCLUDES'] = Array();
$client['JS_INCLUDES'][0] = '<script src="http://uranus/View/ClientPresentation/JS/jQuery/jquery-1.3.2.js"></script>';
$client['JS_INCLUDES'][1] = '<script src="/View/ClientPresentation/JS/Client/client.js"></script>';

// Register Specific
$client['LOCALIZED_LABELS'] = Array();
$client['LOCALIZED_LABELS'][0] = 'REGISTER_FORM_TITLE';
$client['LOCALIZED_LABELS'][1] = 'NAME_TITLE';
$client['LOCALIZED_LABELS'][2] = 'STREET_TITLE';
$client['LOCALIZED_LABELS'][3] = 'CITY_TITLE';
$client['LOCALIZED_LABELS'][4] = 'STATE_TITLE';
$client['LOCALIZED_LABELS'][5] = 'ZIP_TITLE';
$client['LOCALIZED_LABELS'][6] = 'EMAIL_TITLE';
$client['LOCALIZED_LABELS'][7] = 'USERNAME_TITLE';
$client['LOCALIZED_LABELS'][8] = 'PASSWORD_TITLE';

$client['DISPLAY_FIELDS'] = Array();

$client['DISPLAY_FIELDS']['CLIENT_NAME'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_NAME']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['CLIENT_STREET'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_STREET']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['CLIENT_CITY'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_CITY']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['CLIENT_STATE'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_STATE']['TYPE'] = 'DROPDOWN';
$client['DISPLAY_FIELDS']['CLIENT_STATE']['DROPDOWN_PRIMARY_KEY'] = 'STATE_ABBR';
$client['DISPLAY_FIELDS']['CLIENT_STATE']['DROPDOWN_TEXT'] = 'STATE_NAME';
$client['DISPLAY_FIELDS']['CLIENT_STATE']['DROPDOWN_TABLE'] = 'STATE';

$client['DISPLAY_FIELDS']['CLIENT_ZIP'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_ZIP']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['CLIENT_EMAIL'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_EMAIL']['TYPE'] = 'TEXT';

$client['DISPLAY_BUTTONS']['BUTTON_SUBMIT'] = Array();
$client['DISPLAY_BUTTONS']['BUTTON_SUBMIT']['TYPE'] = 'SUBMIT'; 
$client['DISPLAY_BUTTONS']['BUTTON_SUBMIT']['VALUE'] = 'Register';

$client['DISPLAY_BUTTONS']['BUTTON_RESET'] = Array();
$client['DISPLAY_BUTTONS']['BUTTON_RESET']['TYPE'] = 'RESET'; 
$client['DISPLAY_BUTTONS']['BUTTON_RESET']['VALUE'] = 'Reset';

// Login Specific
$client['LOCALIZED_LABELS'][9] = 'LOGIN_FORM_TITLE';

$client['DISPLAY_FIELDS']['CLIENT_USERNAME'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_USERNAME']['TYPE'] = 'TEXT';

$client['DISPLAY_FIELDS']['CLIENT_PASSWORD'] = Array();
$client['DISPLAY_FIELDS']['CLIENT_PASSWORD']['TYPE'] = 'PASSWORD';

$client['DISPLAY_BUTTONS']['BUTTON_LOGIN'] = Array();
$client['DISPLAY_BUTTONS']['BUTTON_LOGIN']['TYPE'] = 'SUBMIT'; 
$client['DISPLAY_BUTTONS']['BUTTON_LOGIN']['VALUE'] = 'Login';

// Profile Specific
$client['LOCALIZED_LABELS'][10] = 'PROFILE_PAGE_TITLE';

$profiles = Array();
$profiles['CLIENT'] = $client;

?>