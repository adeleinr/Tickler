		
		/* This code is from http://microformats.org/code/hcard/creator */
		var outputfield = "#samplecode";
	    var previewfield = "#preview";
	 
	    function NormalizeSpace(str) {
	      if (str) {
	        str = str.replace(/^\s*|\s*$/g, '');
	        return str.replace(/\s+/g,' ');
	      }
	    }
	 
	    function filter(fn, l) {
	      r = [];
	      if(fn == null) {
	        for(i in l){
	          if (l[i]){
	            r.push(l[i])
	          }
	        }
	      } else {
	        for(i in l) {
	          if (fn(l[i])){
	            r.push(l[i])
	          }
	        }
	      }
	      return r;
	    }
	 
	    function codeit() {
	      /* get values of text fields */
	      var org = NormalizeSpace(document.getElementById('PROVIDER_BUSINESS_NAME').value);
	      var url = document.getElementById('PROVIDER_URL').value;
	      var email = document.getElementById('PROVIDER_EMAIL').value;
	      var street = document.getElementById('PROVIDER_STREET').value;
	      var city = document.getElementById('PROVIDER_CITY').value;
	      var region = document.getElementById('PROVIDER_STATE').value;
	      var postal = document.getElementById('PROVIDER_ZIP').value;
	      var phone =document.getElementById('PROVIDER_PHONE').value;

	      /*Not used*/
	      var additionalname= "";
	      var givenname= "";
	      var familyname= "";
	      var photo = "";      
	      var country = "";
	      var tags = "";
	      var jabber = "";
	      var aim = "";
	      var yim = "";

	      		      
	      
	 
	      var templates = {
	    	        vcard:            '<div id="${id}" class="vcard">${content}</div>',
	    	        given_name :      '  <span class="given-name">${given_name}</span>',
	    	        additional_name : '  <span class="additional-name">${additional_name}</span>',
	    	        family_name :     '  <span class="family-name">${family_name}</span>',
	    	        photo :           '  <img style="float:left; margin-right:4px" src="${photo_url}" alt="photo of ${fn}" class="photo"/>',
	    	        org :             ' <div class="org">${org}</div>',
	    	        // TODO: add obfuscation here
	    	        email :           ' <a class="email" href="mailto:${email}">${email}<\/a>',
	    	        street_address :  '  <div class="street-address">${street_address}<\/div>',
	    	        city :            '  <span class="locality">${city}<\/span>',
	    	        region :          '  <span class="region">${region}<\/span>',
	    	        postal_code :     '  <span class="postal-code">${postal_code}</span>',
	    	        country_name :    '  <span class="country-name">${country}<\/span>',
	    	        tel :             ' <div class="tel">${tel}</div>',
	    	        url:			  ' <a href="${url}">{$url}</a>',
	    			// TODO: add encodeURIComponent to templates 
	    	        aim :             ' <a class="url" href="aim:goim?screenname=${aim}">AIM<\/a>\n',
	    	        yim :             ' <a class="url" href="ymsgr:sendIM?${yim}">YIM<\/a>\n',
	    	        jabber :          ' <a class="url" href="xmpp:${jabber}">Jabber</a>\n',
	    	        tags :              '<div class="tags">${tags}</div>',
	    	        tag :             '<a href="${url}">${term}</a>',
	    	        ad :              'This is where we put an ad about whatever'
	    	      };

	      var implied_n_opt = true;
	      if(implied_n_opt) {
	        var fn = filter(null, [givenname, familyname]).join(' ');
	      } else {
	        var fn = templates.given_name.process({given_name : givenname}) + "\n";
	        var fn_text = givenname;
	        if (additionalname != "") {
	          fn += templates.additional_name.process({additional_name : additionalname}) + "\n";
	        }
	        fn += templates.family_name.process({family_name : familyname}) + "\n";
	      }
	      /* set results field */
	      var fn_id = (filter(null, [givenname, additionalname, familyname]).length > 0 ? filter(null, ['hcard', givenname, additionalname, familyname]).join(' ').replace(/ /g, '-'): '');
	      var resultstr = '<div id="' + fn_id + '" class="vcard">\n';
	      if(photo && photo.match(/http:\/\/.*\..{2,4}.*\/.+/)) resultstr += templates.photo.process({photo_url:photo, fn:fn_text}) + "\n";
	      if(org) resultstr += templates.org.process({ org : org}) + "\n";
	      
	      
	      if(email) resultstr += templates.email.process({email : email}) + "\n";
	      if(street || city || region || postal || country) {
	        resultstr += ' <div class="adr">\n';
	        if(street) resultstr += templates.street_address.process({street_address : street}) + "\n";
	        var csz = "";
	        if(city) csz += templates.city.process({city: city}) + "\n";
	        if(region) {
	          if(csz) csz += ', \n';
	          csz += templates.region.process({region : region}) + "\n";
	        }
	        if(postal) {
	          if(csz) csz += ', \n';
	          csz += templates.postal_code.process({postal_code : postal}) + "\n";
	        }
	        if(country) {
	          if(csz) csz += '\n';
	          csz += templates.country_name.process({country : country}) + "\n";
	        }
	        if(csz) csz += '\n';
	        resultstr += csz + ' <\/div>\n';
	       }
	       if(phone) resultstr += templates.tel.process({tel: phone}) + "\n";
	       if(url && url.match(/http\:\/\/.*\..{2,4}.*/)) { // make sure the url at least looks like a url before we load it
		        resultstr += ' <a class="url fn';
		        if (!implied_n_opt) {
		          resultstr += ' n';
		        }
		        resultstr += '" href="' + url + '">'+url+'<\/a>\n';
		   } 
		  /*
	       if(tags) {
	           var tag_list = tags.split(',');
	           var temp = '';
	           for (var i in tag_list) {
	               temp += templates.tag.process({term : trim(tag_list[i]), url : 'http://kitchen.technorati.com/contacts/tag/' + trim(tag_list[i])}) + ' ';
	           }
	           resultstr += templates.tags.process({tags : temp})
	       }
	       */
	      
	       resultstr += '<\/div>';
	       $(outputfield).val(resultstr);
	       $(preview).html(resultstr);
	       if (email || phone || yim || aim || jabber) {
	         $("#warning").css('display', "inline");
	       } else {
	         $("#warning").css('display', "none");
	       }
		       
	       
	     }
	 
	    function doinit() {
	      $('input').keyup(window.codeit);
	      $('input').click(window.codeit);
	 
	      doreset();
	    }
	 
	    function doreset() {
	      codeit();
	    }
	    $(window.doinit);