<?php

// Common
$user = Array();
$user['PROFILE_NAME'] = 'USER';
$user['PRIMARY_KEY'] = 'USER_ID';
$user['FORMS'] = Array();
$user['FORMS']['REGISTER_FORM']['ACTION'] = '/user_save';
$user['FORMS']['LOGIN_FORM']['ACTION'] = '/user_login';


$user['CSS_INCLUDES'] = Array();
$user['CSS_INCLUDES'][0] = '<link rel="stylesheet" href="http://uranus/View/ClientPresentation/HTML/CSS/Blueprint/screen.min.css" type="text/css" media="screen, projection" />';
$user['CSS_INCLUDES'][1] = '<link rel="stylesheet" href="http://uranus/View/ClientPresentation/HTML/CSS/Blueprint/print.min.css" type="text/css" media="print" />';
$user['CSS_INCLUDES'][2] = '<link rel="stylesheet" href="http://uranus/View/ClientPresentation/HTML/CSS/Blueprint/Debug/typography.css" type="text/css" media="screen, projection" />';
$user['CSS_INCLUDES'][3] = '<!--[if IE]><link rel="stylesheet" href="http://uranus/View/ClientPresentation/HTML/CSS/Blueprint/ie.min.css" type="text/css" media="screen, projection" /><![endif]-->'; 
$user['CSS_INCLUDES'][4] = '<link rel="stylesheet" href="/View/ClientPresentation/HTML/CSS/Global/global.lib.css" type="text/css"/>';


$user['JS_INCLUDES'] = Array();
$user['JS_INCLUDES'][0] = '<script src="/View/ClientPresentation/JS/User/user.js"></script>';

// Register Specific
$user['LOCALIZED_LABELS'] = Array();
$user['LOCALIZED_LABELS'][0] = 'REGISTER_FORM_TITLE';
$user['LOCALIZED_LABELS'][1] = 'NAME_TITLE';
$user['LOCALIZED_LABELS'][2] = 'STREET_TITLE';
$user['LOCALIZED_LABELS'][3] = 'CITY_TITLE';
$user['LOCALIZED_LABELS'][4] = 'STATE_TITLE';
$user['LOCALIZED_LABELS'][5] = 'ZIP_TITLE';
$user['LOCALIZED_LABELS'][6] = 'PHONE_TITLE';
$user['LOCALIZED_LABELS'][7] = 'EMAIL_TITLE';
$user['LOCALIZED_LABELS'][8] = 'PASSWORD_TITLE';
$user['LOCALIZED_LABELS'][9] = 'URL_TITLE';
$user['LOCALIZED_LABELS'][10] = 'TWITTER_TITLE';
$user['LOCALIZED_LABELS'][11] = 'FACEBOOK_TITLE';
$user['LOCALIZED_LABELS'][12] = 'FRIENDFEED_TITLE';
$user['LOCALIZED_LABELS'][13] = 'FLICKR_TITLE';
$user['LOCALIZED_LABELS'][14] = 'YELP_TITLE';
$user['LOCALIZED_LABELS'][15] = 'CATEGORY_TITLE';

// Profile Specific
$user['LOCALIZED_LABELS'][16] = 'PROFILE_PAGE_TITLE';


$user['DISPLAY_FIELDS'] = Array();

$user['DISPLAY_FIELDS']['USER_NAME'] = Array();
$user['DISPLAY_FIELDS']['USER_NAME']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_STREET'] = Array();
$user['DISPLAY_FIELDS']['USER_STREET']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_CITY'] = Array();
$user['DISPLAY_FIELDS']['USER_CITY']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_STATE'] = Array();
$user['DISPLAY_FIELDS']['USER_STATE']['TYPE'] = 'DROPDOWN';
$user['DISPLAY_FIELDS']['USER_STATE']['DROPDOWN_PRIMARY_KEY'] = 'STATE_ABBR';
$user['DISPLAY_FIELDS']['USER_STATE']['DROPDOWN_TEXT'] = 'STATE_NAME';
$user['DISPLAY_FIELDS']['USER_STATE']['DROPDOWN_TABLE'] = 'STATE';

$user['DISPLAY_FIELDS']['USER_ZIP'] = Array();
$user['DISPLAY_FIELDS']['USER_ZIP']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_PHONE'] = Array();
$user['DISPLAY_FIELDS']['USER_PHONE']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_EMAIL'] = Array();
$user['DISPLAY_FIELDS']['USER_EMAIL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['USER_PASSWORD'] = Array();
$user['DISPLAY_FIELDS']['USER_PASSWORD']['TYPE'] = 'PASSWORD';

$user['DISPLAY_FIELDS']['USER_URL'] = Array();
$user['DISPLAY_FIELDS']['USER_URL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['TWITTER_URL'] = Array();
$user['DISPLAY_FIELDS']['TWITTER_URL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['FACEBOOK_URL'] = Array();
$user['DISPLAY_FIELDS']['FACEBOOK_URL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['FRIENDFEED_URL'] = Array();
$user['DISPLAY_FIELDS']['FRIENDFEED_URL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['FLICKR_URL'] = Array();
$user['DISPLAY_FIELDS']['FLICKR_URL']['TYPE'] = 'TEXT';

$user['DISPLAY_FIELDS']['YELP_URL'] = Array();
$user['DISPLAY_FIELDS']['YELP_URL']['TYPE'] = 'TEXT';


$user['DISPLAY_FIELDS']['CATEGORY'] = Array();
$user['DISPLAY_FIELDS']['CATEGORY']['TYPE'] = 'DROPDOWN';
$user['DISPLAY_FIELDS']['CATEGORY']['DROPDOWN_PRIMARY_KEY'] = 'CATEGORY_ID';
$user['DISPLAY_FIELDS']['CATEGORY']['DROPDOWN_TEXT'] = 'CATEGORY_NAME';
$user['DISPLAY_FIELDS']['CATEGORY']['DROPDOWN_TABLE'] = 'CATEGORY';



$user['DISPLAY_BUTTONS']['BUTTON_SUBMIT'] = Array();
$user['DISPLAY_BUTTONS']['BUTTON_SUBMIT']['TYPE'] = 'SUBMIT'; 
$user['DISPLAY_BUTTONS']['BUTTON_SUBMIT']['VALUE'] = 'Save';

$user['DISPLAY_BUTTONS']['BUTTON_RESET'] = Array();
$user['DISPLAY_BUTTONS']['BUTTON_RESET']['TYPE'] = 'RESET'; 
$user['DISPLAY_BUTTONS']['BUTTON_RESET']['VALUE'] = 'Reset';

// Login Specific

$user['LOCALIZED_LABELS'][17] = 'LOGIN_FORM_TITLE';

$user['DISPLAY_BUTTONS']['BUTTON_LOGIN'] = Array();
$user['DISPLAY_BUTTONS']['BUTTON_LOGIN']['TYPE'] = 'SUBMIT'; 
$user['DISPLAY_BUTTONS']['BUTTON_LOGIN']['VALUE'] = 'Login';



$profiles = Array();
$profiles['USER'] = $user;

?>