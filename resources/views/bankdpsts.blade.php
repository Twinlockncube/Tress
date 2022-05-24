<html><head><title>Individual Payments</title>
<script type="text/JavaScript">
<!--
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

function changeIt()
{
var row=document.getElementById("table");
row.innerHTML = table.innerHTML +
"<tr><td> Name <input type='text' name='Name[]' size='20' /></td>"+
"<td> Surname <input type='text' name='Surname[]' size='20' /></td>"+
"<td> Std ID <input type='text' name='Std[]' size[]='20' /> </td>"+
"<td> Amount($) <input type='text' name='Amount[]' size='20' /></td></tr> ";
}
//-->
</script>
<h1 align="center">Bank Deposits</h1>
<h4 align="center">Hyphen World Systems.Inc</h4>
</head>
<body bgcolor="#CCCCCC">
<form name="paysheet" action="tuitioncapture.php" method="POST" onSubmit="MM_validateForm('0','','R');return document.MM_returnValue" >
    <p>&nbsp;</p>	
<table align="center" cellspacing="15" cellpadding="2" id="table">
<tr>
<td>Name <input type="text" name="Name[]" id="Name[]" size="20" /> </td>
<td>Surname <input type="text" name="Surname[]" id="Surname[]" size="20" /></td>
<td>Std ID <input type="text" name="Std[]" id="Std[]" size="20" /> </td>
<td>Amount($) <input type="text" name="Amount[]" id="Amount[]" size="20" /></td>
</tr>
</table>
<table align="center" cellspacing="15">
<tr>
<td align="center" onfocus="MM_validateForm('1','','R');return document.MM_returnValue"> <input type="submit" name="submit" value="submit" id="submit"></td>
<td align="center"> <input type="button" value="Add Another" id="Post" onClick="changeIt()"></td>
</tr>
</table>
</form>
</body>
</html>