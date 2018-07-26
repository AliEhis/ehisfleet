<div class="close"> <img src="../../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
<div class="make_staff">
 <form id="add_driver_staff">
   <table width="100%" border="0">
     <tr>
       <td width="21%">Surname </td>
       <td width="79%"><input type="text" name="fname" id="fname" class="inpElemts" /></td>
     </tr>
     <tr>
       <td><span class="lt">Other Name</span></td>
       <td><input type="text" name="lname" id="lname"  class="inpElemts" />
        <input name="designation" type="hidden" value="Driver"></td>
     </tr>
     <tr>
       <td><span class="lt">Gender</span></td>
       <td><div class="styled-select">
         <label for="gender"/>       
         </label>
         <select name="gender" id="gender" class="inpElemts" >
           <option value="male">Male</option>
           <option value="female">Female</option>
         </select>
       </div></td>
     </tr>
     <tr>
       <td><span class="lt">Phone</span></td>
       <td><input type="text" name="phone" id="phone"  class="inpElemts" /></td>
     </tr>
     <tr>
       <td><span class="lt">Picture</span></td>
       <td><span class="lt">
         <input type="file" name="pic" id="pic"   class="inpElemt"/>
       </span></td>
     </tr>
     <tr>
       <td valign="top"><span class="lt">Address</span></td>
       <td><textarea name="address" rows="10" class="text_area" id="address"></textarea></td>
     </tr>
     <tr>
       <td>&nbsp;</td>
       <td><span style="margin-left:50px; margin-top:160px;">
         <input name="addStaff" type="button" class="buttons" id="makeDriverStaff" value="Add Staff" style="margin:0;" />
       </span></td>
     </tr>
   </table>
 </form>
</div>