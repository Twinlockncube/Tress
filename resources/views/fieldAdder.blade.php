<html>
<head>
<link rel="stylesheet" href="payments.css" type="text/css"/>
</head>
<body>
<div id="headerr">
<div id="header">
<h1 align="center">Tuition Deposits</h1>
<h5 align="center">Hyphen World Systems.Inc</h5>
</div>
<div id="nexton">
<form id="source" method="POST" action="tuitioncapture.php" >
<table cellspacing="1" class="input_fields_wrap" id="input_fields_wrap">
<tr>
<td> <input type="text" name="Name[]" placeholder="Name " size="20" id="name'+0+'" /></td>
<td> <input type="text" name="Surname[]" placeholder="Surname" size="20" /></td>
<td> <input type="text" name="Std[]" placeholder="Std ID" size="20" /> </td>
<td> <input type="text" placeholder="Amount($)" name="Amount[]" size=" 20" /></td>
<td> <button class="add_field_button" id="add_field_button">Add Record</button></td>
</tr>
</table>
<input type="button" value="Submit" name="submit" class="submit_button" id="submit"/>
</form>
</div>
</div>
<script type="text/javascript" src="jquery.js" ></script>
<script type="text/javascript">
$(document).ready(function() {
    var max_fields      = 14; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initial text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(
			'<tr><td> <input type="text" name="Name[]" id="name'+x+'" placeholder="Name" size="20" /></td><td><input type="text" name="Surname[]"placeholder="Surname" size="20" /></td><td><input type="text" name="Std[]" placeholder="Std Id" size="20" /> </td><td><input type="text" name="Amount[]" placeholder="Amount" size="20" /></td><td><input type="button" class="remove_field" value="X"/></td></tr>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
		$(this).parents('tr').remove();
		x--;
    });
	
	$("#submit").click(function(){
	var data=$("#source :input").serializeArray();
	$.post($("#source").attr("action"),data,function(info){
	alert(info);	});
	});
	
	
});
	
</script>
</body>
</html>