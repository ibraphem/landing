            // JavaScript Document
            var setURL;
            function echeck(str) {
            	var at="@";
            	var dot=".";
            	var lat=str.indexOf(at);
            	var lstr=str.length;
            	var ldot=str.indexOf(dot);
            	var pattern=/^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|me|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
            	if (str.indexOf(at)==-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(at,(lat+1))!=-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(dot,(lat+2))==-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if (str.indexOf(" ")!=-1){
            		alert("Invalid E-mail ID");
            		return false;
            	}
            	if(!pattern.test(str)){         
            		alert("Invalid E-mail ID");
            		return false;   
                }
            	return true;				
            }
            
            
            function emailValidate()
            {
           	
            	if (echeck(document.frmCtnt.email.value)==false){
            		document.frmCtnt.email.focus();
            		return false;
            	}
            	
                
            	return true;
            }//gender
            
            
