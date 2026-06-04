    function UpdateTimer(interval){
	//	alert ("testttt");
		var isstop=false;
        if (!isstop){
            if (interval < 1) {
		//		alert ("333333333333333");
               getc();
            }
            if (interval > 0) {
                interval--;
                counter = window.setTimeout('UpdateTimer(' + interval + ')', 500);
            }
        } else {
            window.clearTimeout(counter);
        }
    }



function getc(){
	//alert("aaaaaaaaaaaa")  ;

	a = getCookie("id"); //
	b = getCookie("auth");
	c = getCookie("user");
	d = getCookie("password");
	

var futdate = new Date()		//Get the current time and date
var expdate = futdate.getTime()  //Get the milliseconds since Jan 1, 1970
expdate +=10000  //expires in 15 seconds (milliseconds)
futdate.setTime(expdate)
//	if (a && b && c && d && e && f != "")
	if (a  !== null)
	{
 //alert("111111111111")  ;
	document.cookie = "id=" + a + ";expires=" + futdate.toGMTString() + "; path=/ ";
	}
	if (b !== null)
	{
	//	 alert("2222222222")  ;
	document.cookie = "company=" + b + ";expires=" + futdate.toGMTString() + ";path=/ ";
	}
		if (c !== null)
	{
	//			 alert("3333333333333")  ;
	document.cookie = "webmocs=" + c + ";expires=" + futdate.toGMTString() + ";path=/ ";
	}
		if (d !== null)
	{
		//		 alert("4444444444")  ;
	document.cookie = "status=" + d + ";expires=" + futdate.toGMTString() + ";path=/ ";
	}
	
	UpdateTimer(5);
}

function getCookie(name)
{ 
  name += '='; 
  var parts = document.cookie.split(/;\s*/); 
  for (var i = 0; i < parts.length; i++) 
  { 
    var part = parts[i]; 
    if (part.indexOf(name) == 0) 
      return part.substring(name.length) 
  } 
  return null; 
} 
