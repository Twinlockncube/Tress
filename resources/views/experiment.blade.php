<!DOCTYPE html>
<html>
<head><title>books</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="marks.css" type="text/css" />
<script type="text/JavaScript" src="jquery.js"></script>
</head>
<body>
	<div class="container">
				<h1>Inventory Manager(Text Books)</h1>
		<hr/>
		<span id="borrow">Borrowing:</span>
		<form name="books" id="myForm" method="POST" action="booksCapture.php">
		<div id="header">
		<table cellspacing="10"  width="850" bgcolor="#990000">
			<tr>
				<td><label for="description">Title Of Book:</label><input type="text" name="description" placeholder="Title" id="description"/></td>
				<td><label for="date">Date:</label><input type="date" name="date" id="date" /></td>
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
		 <input type="text" placeholder="Name" id="name" name="name"/> 
		 <input type="text" placeholder="Surname" id="surname" name="surname"/> 
		 </div>
		 </form>
		 <br><br><br><br><br><br><br>
		<hr/>
		<br><br>

		<script type="text/JavaScript">
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
		 
		</script>

		<span id="result"></span>

		<div id="returned">
		<span id="welcome">Welcome To The Inventory Manager</span><br>
		<span id="return">Returning:</span><br>
		<div id="inputs">
		<form method="POST" name="form1" id="form1" action="return.php">
		<input type="text" name="book" placeholder="Book Number" id="book"/>
		<input type="date" name="date" id="date"/><br>
		<button id="rsubmit">Post Record</button>
		</form>
		</div>
		<div id="outputs">
		<h4>Student Details</h4>
		<table>
		<tr>
		<td>Name:</td><td id="bname" class="detail">Stan Chart</td>
		</tr>
		<tr>
		<td>Class:</td><td id="bclass" class="detail">4A1</td>
		</tr>
		<tr>
		<td>Book Title:</td><td id="btitle" class="detail">Hackers</td>
		</tr>
		<tr>
		<td>Subject:</td><td id="bsubject" class="detail">Software Eng</td>
		</tr>
		<tr>
		<td>Borrowed:</td><td id="bdate" class="detail">26-12-16</td>
		</tr>
		</table>
		</div>
		</div>

		<script type="text/JavaScript">
		$("#book").blur(function(){
			var data=$(this).serialize();
			$.post($("#form1").attr("action"),data,function(info){
			$("#btitle").html(info);
			$("#bdate").html(borrower.date);
			$("#btitle").html(borrower.title);	
			$("#bname").html(borrower.name+" "+borrower.surname);
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
		</script>
	</div>
</body>
</html>
