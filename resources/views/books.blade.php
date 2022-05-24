<!DOCTYPE html>
<html>
<head><title>books</title>
<link rel="stylesheet" href="marks.css" type="text/css" />
<script type="text/JavaScript" src="jquery.js"></script>
</head>
<body>
<style>
#display{
position:relative;
top:-20px;
height:50px;
background-color:#000000;
color:#ffffff;
}
#down{
position:absolute;
bottom:0px;
color:#999ccc;

}
</style>
<div id="display"> <h1>Projects Management Wizard</h1></div>
<hr/>
<span id="borrow">Borrowing:</span>
<form name="books" id="myForm" method="POST" action="booksCapture.php">
<div id="header">
<table cellspacing="10"  width="850" bgcolor="#990000">
<tr>
<td><label for="description">Title Of Book:</label><input type="text" name="description" placeholder="Title" id="description"/></td>
<td><label for="date">Date:</label><input type="text" name="bodate" id="bodate" placeholder="YYYY-MM-DD"/></td>
</tr>
 </table>
 <label for="subject">Subject</label>
 <select name="subject" id="subject">
                 <option value="Subject">Subject        </option>
                 <option value="Mathematics">Mathematics</option>
		 <option value="Physics">Physics        </option>
		 <option value="Chemistry">Chemistry    </option>
		 <option value="Biology">Biology        </option>
		 <option value="Ndebele">Ndebele        </option>
		 <option value="History">History        </option>
		 <option value="English">English        </option>
		 <option value="Commerce">Commerce      </option>
 </select>
 <label for="booknumber">Book Number</label><input type="text" name="booknumber" placeholder="Book Number" id="booknumber"/>
 <button  id="bkssubmit" name="bkssubmit">Post Record</button><br><br>
<input type="text" placeholder="Admission Number" id="Admissionnumber" name="admissionnumber"/> 
 </div>
 </form>
 <br><br><br><br><br><br><br>
<hr/>
<br><br>

<script type="text/JavaScript">

  $(document).ajaxStart(function(){
    $("#wait").css("display", "block");
});

$(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
	alert(response);
});


$("#bkssubmit").click(function(){
	var data=$("#myForm :input").serializeArray();
	$.post($("#myForm").attr("action"),data,function(info){$("#result").html(info);	});
    	
	clearInput();
});

$("#myForm").submit(function(){
	return false;
});

function clearInput(){
	$('#myForm :input').each(function(){
		$(this).val('');
	});
}

function clearInput1(){
	$('#myForm :input').each(function(){
		$(this).val('');
	});
}
$("#bodate").focusin(function(){
$(this).val(formatDate());

}); 
</script>

<span id="result"></span>

<div id="returned">
<span id="welcome">Welcome To The Inventory Manager</span><br>
<span id="return">Returning:</span><br>
<div id="inputs">
<form method="POST" name="form1" id="form1" action="returnedbook.php">
<input type="text" name="book" placeholder="Book Number" id="book"/>
<input type="text" name="date" placeholder="YYYY-MM-DD" id="date"/><br>
<input type="hidden" value="in" name="status"  id="status"/><br>
<button id="rsubmit">Post Record</button>
</form>
</div>
<div id="outputs">
<h4>Student Details</h4>
<table>
<tr>
<td>Name:</td><td id="bname" class="detail">---- ----</td>
</tr>
<tr>
<td>Class:</td><td id="bclass" class="detail">--- ---</td>
</tr>
<tr>
<td>Book Title:</td><td id="btitle" class="detail">-------</td>
</tr>
<tr>
<td>Subject:</td><td id="bsubject" class="detail">-------- ---</td>
</tr>
<tr>
<td>Borrowed:</td><td id="bdate" class="detail">00-00-00</td>
</tr>
</table>
</div>
</div>

<script type="text/JavaScript">
$("#book").blur(function(){
	var data=$(this).serialize();
	$.post("return.php",data,function(info){
	$("#btitle").html(info);
    $("#bdate").html(borrower.date);//the borrower object is defined in return.php
    $("#btitle").html(borrower.title);	
	$("#bname").html(borrower.Name+" "+borrower.Surname);
	$("#bsubject").html(borrower.subject);
	});	
	
});

$("#form1").submit(function(){
	return false;
});

function clearInput(){
	$('#form1 :input').each(function(){
		$(this).val('');
	});
}

function formatDate() {
    var d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}
$("#date").focusin(function(){
$(this).val(formatDate());

});

 $("#rsubmit").click(function(){
		var data=$("#form1 :input").serializeArray();
	$.post($("#form1").attr("action"),data	);
    $("#result").html(info);	
	clearInput1();	
	
});

$("#form1").submit(function(){
	return false;
});
</script>
<style>
#wait{display:none;
width:89px;
height:60px;
border:1px solid black;
position:absolute;
bottom:5%;
right:5%;
padding:2px;
background-color:#666;
color:#ffffff;
}
</style>

<div id="wait" ><!--<img src='loading.gif' width="64" height="64" />-->Please Wait<br>Loading..</div>
<div id="down">Copyright Hyphen World Systems &copy 2016</div>
</body>
</html>
