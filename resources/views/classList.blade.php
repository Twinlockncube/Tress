<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- DW6 -->
<head>
<!-- Copyright 2005 Macromedia, Inc. All rights reserved. -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>HWS Management</title>
<link rel="stylesheet" href="emx_nav_right.css" type="text/css" />
<script type="text/javascript">
<!--
<!--
var time = 3000;
var numofitems = 7;

//menu constructor
function menu(allitems,thisitem,startstate){ 
  callname= "gl"+thisitem;
  divname="subglobal"+thisitem;  
	this.numberofmenuitems = allitems;
	this.caller = document.getElementById(callname);
	this.thediv = document.getElementById(divname);
	this.thediv.style.visibility = startstate;
}
				 
//menu methods
function ehandler(event,theobj){
  for (var i=1; i<= theobj.numberofmenuitems; i++){
	  var shutdiv =eval( "menuitem"+i+".thediv");
    shutdiv.style.visibility="hidden";
	}
	theobj.thediv.style.visibility="visible";
}
				
function closesubnav(event){
  if ((event.clientY <48)||(event.clientY > 107)){
    for (var i=1; i<= numofitems; i++){
      var shutdiv =eval('menuitem'+i+'.thediv');
			shutdiv.style.visibility='hidden';
		}  
	}
}
// -->

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
  } if (errors) alert('The following error(s) occurred:\n'+errors);
  document.MM_returnValue = (errors == '');
}
//-->
</script>
</head>
<body onmousemove="closesubnav(event);">
<div class="skipLinks">skip to: <a href="#content">page content</a> | <a href="#pageNav">links on this page</a> | <a href="#globalNav">site navigation</a> | <a href="#siteInfo">footer (site information)</a> </div>
<div id="masthead">
  <h1 id="siteName">Hyphen World Systems </h1>
  <div id="utility"> <a href="#">News</a> | <a href="#">Office Chat </a> | <a href="#">Log out </a> </div>
  <div id="globalNav"> <img alt="" src="gblnav_left.gif" height="32" width="4" id="gnl" /> <img alt="" src="glbnav_right.gif" height="32" width="4" id="gnr" />
    <div id="globalLink"> <a href="#" id="gl1" class="glink" onmouseover="ehandler(event,menuitem1);">Home</a><a href="#" id="gl2" class="glink" onmouseover="ehandler(event,menuitem2);">Banking</a><a href="#" id="gl3" class="glink" onmouseover="ehandler(event,menuitem3);">Accounts</a><a href="#" id="gl4" class="glink" onmouseover="ehandler(event,menuitem4);">Student Records </a><a href="#" id="gl5" class="glink" onmouseover="ehandler(event,menuitem5);">Books</a><a href="#" id="gl6" class="glink" onmouseover="ehandler(event,menuitem6);">Marks</a><a href="#" id="gl7" class="glink" onmouseover="ehandler(event,menuitem7);">Schemes</a> </div>
    <!--end globalLinks-->
	<form id="search" action="">
      <input name="searchFor" type="text" onblur="MM_validateForm('searchFor','','R');return document.MM_returnValue" size="10" />
      <a href="">search</a>
    </form>  
  </div>
  <!-- end globalNav -->
  <div id="subglobal1" class="subglobalNav"> <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> | <a href="#">subglobal1 link</a> </div>
  <div id="subglobal2" class="subglobalNav"> <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> | <a href="#">subglobal2 link</a> </div>
  <div id="subglobal3" class="subglobalNav"> <a href="#">Debtors</a> | <a href="#">Creditors</a> | <a href="#">Balance Sheet</a> | <a href="#">Statements</a> </div>
  <div id="subglobal4" class="subglobalNav"> <a href="#">Registration</a> | <a href="#">Assesment</a> | <a href="#">Details</a> | <a href="#">Guardian</a> | <a href="trial.html">Statement</a> | <a href="#">Discipline</a> </div>
  <div id="subglobal5" class="subglobalNav"> <a href="#">Form1</a> | <a href="#">Form2</a> | <a href="#">Form3</a> | <a href="#">Form4</a> | <a href="#">Form5</a> | <a href="#">Form6</a> </div>
	  <div id="subglobal6" class="subglobalNav"> <a href="#">Form1</a> | <a href="#">Form2</a> | <a href="#">Form3</a> | <a href="#">Form4</a> | <a href="#">Form5</a> | <a href="#">Form6</a> </div>
  <div id="subglobal7" class="subglobalNav"> <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">subglobal7 link</a> | <a href="#">Form1</a> | <a href="#">Form2</a> | <a href="#">Form3</a> | <a href="#">Form4</a> </div>
  <div id="subglobal8" class="subglobalNav"> <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> | <a href="#">subglobal8 link</a> </div>
</div>
<!-- end masthead -->
<div id="pagecell1">
  <!--pagecell1-->
  <img alt="" src="tl_curve_white.gif" height="6" width="6" id="tl" /> <img alt="" src="tr_curve_white.gif" height="6" width="6" id="tr" />
  <div id="pageName">
    <h2>School Management System </h2>
    <a href="file:///C|/Users/accer/Pictures/Camera Roll/Picture1.png"></a> </div>
  <div id="pageNav">
    <div id="sectionLinks"> <a href="#">Staff</a> <a href="#">Inventory</a> <a href="file:///C|/Users/accer/Downloads/practice/trial.html">Registers</a> <a href="#">Sports</a> <a href="#">Prefects</a> <a href="#">Examinations</a> </div>
    <div class="relatedLinks">
      <h3>Related Link Category</h3>
      <a href="#">Related Link</a> <a href="#">Related Link</a></div>
    <div id="advert"> 
      <p><img src="file:///C|/Users/accer/Pictures/Camera Roll/Ncubes.jpg" width="164" height="160" alt="Happy Students" /></p>
    </div>
  </div>
 
    <div class="story"> <h3 align="center">Tress College</h3>
    <form name="form1" enctype="multipart/form-data" method="post" action="">
  <p>
    <!-- #BeginDate format:Br1 -->21.07.15<!-- #EndDate -->
<table border="1" bgcolor="#66CCFF">
<th width="104">Students</th>
<th width="788">Profile</th>
<tr>
<td><textarea name="Students" cols="14" rows="35" readonly="true">          
Mahlangu
Nyoni
Moyo
Mhike
Chimone
Chiposiwa
Hove
Mahlangu
Nyoni
Moyo
Mhike
Chimone
Chiposiwa
Hove
Mahlangu
Nyoni
Moyo
Mhike
Chimone
Chiposiwa
Hove
Ndlovu
Mabhena
Ncube
Mahlangu
Nyoni
Moyo
Mhike
Chimone
Chiposiwa
Hove
Ndlovu
Mabhena
Ncube
Mahlangu
Nyoni
Moyo
Mhike
Chimone
Chiposiwa
Hove
Ndlovu
Mabhena
Moyo
Mhike
Chimone
Chiposiwa
Hove
Ndlovu
Mabhena
Dlamini</textarea>
  </p>  </td>
  <td bgcolor="#66CCFF"></td>
  </tr>
   </table>
</form>
  </div>
  <!--end content -->
  <div id="siteInfo">&copy;2015 Tress College </div>
</div>
<!--end pagecell1-->
<br />
<script type="text/javascript">
    <!--
      var menuitem1 = new menu(7,1,"hidden");
			var menuitem2 = new menu(7,2,"hidden");
			var menuitem3 = new menu(7,3,"hidden");
			var menuitem4 = new menu(7,4,"hidden");
			var menuitem5 = new menu(7,5,"hidden");
			var menuitem6 = new menu(7,6,"hidden");
			var menuitem7 = new menu(7,7,"hidden");
    // -->
    </script>
</body>
</html>
