var Uranus = Uranus || {};
Uranus.String = {};

/**
 * Check is a string is empty
 *
 * @param string text
 * @return string
 * 
 */
Uranus.String.isEmptyString = function(text) {
	var emptyString = true;
	
	if (text) {
		for (var c = 0; c < text.length; c++) {
			if ((text.charAt(c) == " ")) {
				emptyString = true
			} else {
				emptyString = false
				break;
			}
		}
	}
	
	return emptyString;
}

/**
 * Replaces parts of a string
 *
 * @param   string  search
 * @param   string  replace
 * @param   string  str
 * @return  string
 *
 */
Uranus.String.str_replace = function(search, replace, str) {
	if (!str) {
		var new_string	= '';
	} else {
		var tmp_arr = str.split(search);
		var new_string = tmp_arr.join(replace);
	}
	
	return new_string;
}

/** 
 *
 * Check if the characters of the string is string
 *
 * @param   string string_reference
 * @return  boolean
 *
 */
Uranus.String.is_string = function(string_reference) {
	var valid_chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	var is_string = true;
	var ch = "";
  
	for (i = 0; i < string_reference.length && is_string == true; i++)  {
		ch = string_reference.charAt(i);
		if (valid_chars.indexOf(ch) == -1) {
			is_string = false;
		}
	}
	
	return is_string;
}