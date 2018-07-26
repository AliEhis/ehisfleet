    <form action="post.php" method="POST">
		<div class="rowElem">
		  <label>Satff Name:</label><div class="inpElem"><input name="name" type="text" class="inputs" id="name" size="40"/></div></div>
  <div class="rowElem">
    <label>Satff Username:</label><div class="inpElem"><input name="uname" type="text" class="inputs" id="uname" size="40"/></div></div>
		<div class="rowElem"><label> Password:</label><div class="inpElem"><input name="pword" type="password" class="inputs" id="pword" size="40" /></div></div>
	<div class="rowElem">
		  <label>Select Administrative Level:</label>
		<div class="inpElem"><select name="level" id="level" class="inputs">
			<option value="1">1&nbsp;</option>
			<option value="2">2&nbsp;</option>
            <option value="3">3&nbsp;</option>
	    </select></div>
		</div>
    <div class="rowElem"><input name="addStaff" type="submit" id="addStaff" value="Submit"  class="inputs"/></div>
    </form>
