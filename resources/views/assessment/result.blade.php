@extends('layouts.frame')
@section('content')
<div class="cont">


  <div align="center">

 <h2 >ASSESSMENT</h2>
  <hr />
  <p>
<form  name="myFormAssess">
    <label for="criteria">BY:</label>
    <select id="criteria" name="criteria">
      <option>class</option>
	  <option>subject</option>
	  <option>individual</option>
      </select>
	<input type="button" value="Submit"/></td>
	     </form>
	 </p>
  </div>
  <!--end content -->
</div>
<!--end pagecell1-->
@endsection
