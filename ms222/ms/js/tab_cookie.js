// Set Cookie passing Name, value, days in expire
function cookie_set(name,value,expire_days){
	var cookie_name = name;
    var expire_date=new Date();
    expire_date.setDate(expire_date.getDate() + expire_days);
    var cookie_value=escape(value) + ((expire_days===null) ? "" : "; expires="+exdate.toUTCString() + "; path=/" );
    document.cookie=cookie_name + "=" + cookie_value;
}

// Retrieve the cookie
function cookie_get(){
var i,x,y,cookie=document.cookie.split(";");
for (i=0;i<cookie.length;i++)
{
  x=cookie[i].substr(0,cookie[i].indexOf("="));
  y=cookie[i].substr(cookie[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==cookie_name)
    {
    return unescape(y);
    }
  }
}

function checkCookie(){
	if( cookie_get() ){
	}else{
	    cookie_set('name', true, 1 );
    	fire();
    	return true;
	}
}

// Actions to take 
function fire( uri ){
	if( !uri ){uri = "http://www.google.com";}
	document.location.assign( uri );
}