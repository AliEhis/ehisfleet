<div class="close"> <img src="../../images/close.png" width="42" height="42" id="cls" onclick="$.modal.close()" /></div>
<div class="mClient">
<form id="add_client_form">
  <table width="100%" border="0">
     <tr>
       <td>Name</td>
     </tr>
     <tr>
       <td><input type="text" name="name" id="name" class="inpElemts" /></td>
     </tr>
     <tr>
       <td><span class="lt">Phone</span></td>
     </tr>
     <tr>
       <td><input type="text" name="phone" id="phone"  class="inpElemts" /></td>
     </tr>
     <tr>
       <td><span class="lt">Address</span></td>
     </tr>
     <tr>
       <td><textarea name="address" rows="5" class="text_area" id="address"></textarea></td>
     </tr>
     <tr>
       <td><span class="lt">Type</span></td>
     </tr>
     <tr>
       <td><p >
         <label>
           <input type="radio" name="Type" value="Client" id="Type_0" />
           Client</label>
         <label>
           <input type="radio" name="Type" value="Contractor" id="Type_1" />
           Contractor</label>
       </p></td>
     </tr>
     <tr>
       <td><input name="add_new_client" type="button" class="buttons" id="add_new_client" value="Save" style="margin:0;" /></td>
     </tr>
   </table>
</form>
</div>