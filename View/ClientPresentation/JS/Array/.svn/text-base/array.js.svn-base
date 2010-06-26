var Uranus = Uranus || {};
Uranus.Array = {};

/**
  * Check if it is an object
  *
  * @param   Array array_element
  * @return  Boolean
  *
  */
Uranus.Array.is_object = function(array_element) {
	return (array_element && typeof array_element == 'object');
}

/**
  * Check if it is an array object
  *
  * @param   Array array_element
  * @return  Boolean
  *
  */
Uranus.Array.is_array = function(array_element) {
	return (is_object(array_element) && array_element.constructor == Array);
}

/**
  * Count elements in an array, or properties in an object
  *
  * @param  Array arr
  * @return Integer
  *
  */
Uranus.Array.count = function(arr) {
	var return_val = 0;
	
	if (typeof(arr) == "object") {
		for (key in arr) {
			return_val++;
		}
	}
	
	return return_val;
}

/**
  * Prints human-readable information about an object
  *
  * @param	Array	obj
  * @return	String
  *
  */
Uranus.Array.print_r = function(obj) {
	var dim = 0;
	var pad_val = '\xA0\xA0\xA0\xA0\xA0';
	
	switch (typeof obj) {
		case 'string':
		case 'number':
			return_val = obj;
		break;
		case 'object':
			return_val = 'Array\n{\n' + output_format(obj, dim) + '}';
		break;
		default:
			return_val = false;
	}
	
	/**
	  * Creates padding
	  *
	  * @param	Integer	dim
	  * @return	String
	  * 
	  */
	function pad(dim) {
		var padding = '';
		
		for (i = 0; i < dim; i++) {
			padding += pad_val;
		}
		
		return padding;
	}
	
	/**
	  * Outputs human-readable format 
	  *
	  * @param	Object	obj
	  * @param	Integer	dim
	  * @return	String
	  *
	  */
	function output_format(obj, dim) {
		try {
			var return_val = '';
			for (var key in obj) {
				if (typeof obj[key] == 'object' && obj[key].constructor == Array) {
					return_val += pad_val + pad(dim) + '[' + key + '] => Array\n' + pad_val + pad(dim) + '{\n' + output_format(obj[key], dim + 1) + pad_val + pad(dim) + '}\n';
				} else if (obj[key].constructor == Function) {
					continue;
				} else {
					return_val = return_val + pad_val + pad(dim) + '[' + key + '] => ' + obj[key] + '\n';
				}
			}
			return return_val;
		}
		catch(e) {
		}
	}
	
	return return_val;
}

/** 
  * Sort an Array by value
  * 
  * @param Array arr
  * @param Boolean numeric_sort
  * @return Array
  * 
  */
Uranus.Array.asort = function(arr, numeric_sort) {
	i = 0;
	arr_tmp = [];
	arr_tmpk = [];
	
	for (key in arr) {
		arr_tmp[i] = arr[key] + '_|_' + key;
		i++;
	}
		
	arr_order = (!numeric_sort) ? arr_tmp.sort() : arr_tmp.sort(ksort_help);
	
	arr_out = [];
	
	for (key in arr_order) {
		ori = arr_order[key].split('_|_');
		arr_out[ori[1]] = ori[0];
	}
	
	/** 
	  * Sort an Array by key (numeric)
	  * 
	  * @param Integer arg1
	  * @param Integer arg2
	  * @return Array
	  * 
	  */	
	function ksort_help(arg1, arg2) {
		if (arg1 == 'undefined') {
			arg1 = 0;
		}
		
		if (arg2 == 'undefined') {
			arg2 = 0;
		}
		
		if (parseInt(arg1) > parseInt(arg2)) {
			return 1;
		}
		
		if (parseInt(arg1) < parseInt(arg2)) {
			return -1;
		}
		
		if (parseInt(arg1) == parseInt(arg2)) {
			return 0;
		}
		
		return 0;
	}	
	
	return arr_out;
}