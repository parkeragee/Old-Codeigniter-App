<div class="container">
<div class="row" id="loc_row">
	<div class="span6" id="left_info">
		<h2 class="bold-title"><? echo $location->location_name; ?></h2>
		<p class="loc-info">
		<? echo $location->address; ?><br>
		<? echo $location->city; ?>, <? echo $location->state; ?> <? echo $location->zip; ?>  <span id="update_number"><a data-toggle="modal" href="#editAddress">Edit</a></span>
		</p>
		<p class="loc-info"><? echo $location->location_phone; ?>  <span id="update_number"><a data-toggle="modal" href="#editNumber">Edit</a></span></p>
	
		<h2 class="bold-title">Audiebox Number</h2>
		<p class="loc-info"><? echo $location->twilio_number; ?></p>	
		
		<!-- editNumber MODAL -->
			<div id="editNumber" class="modal hide fade in" style="display: none; ">  
					<div class="modal-header">  
						<a class="close" data-dismiss="modal">×</a>  
						<h3>Update your phone number</h3>  
					</div>  
					<div class="modal-body">  
						<form action="/beta/dashboard/main/locations_phone_prefs/" method="post">
						<input type="hidden" name="location_id" value="<? echo $location->id; ?>">
						 <div class="row" id="noShadow">
						   <div class="span3">
  							<p><strong>Current phone number:</strong><br> <? echo $location->location_phone; ?></p>
  							</div><!-- end span3 -->
  							<div class="span3">
  							<label><strong>Please enter your new number:</strong></label>
  							<input type="text" name="location_phone" value="">
  							</div><!-- end span3 -->
  						</div><!-- end row -->
    						                
					</div>  
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Update Number</button>  
						<a href="#" class="btn" data-dismiss="modal">Close</a> 
						</form> 
					</div>  
					</div> 
					
			<!--END editNumber MODAL-->
			<!-- LOCATION MODAL -->
			<div id="editAddress" class="modal hide fade in" style="display: none; ">  
					<div class="modal-header">  
						<a class="close" data-dismiss="modal">×</a>  
						<h3>Update your address</h3>  
					</div>  
					<div class="modal-body"> 
					<div class="row" id="noShadow"> 
						<form action="/beta/dashboard/main/locations_info_prefs/" method="post">
						<input type="hidden" name="location_id" value="<? echo $location->id; ?>">
  							<div class="span3"><p><strong>Current Location:</strong><br><? echo $location->location_name; ?><br> <? echo $location->address; ?><br>
		<? echo $location->city; ?>, <? echo $location->state; ?> <? echo $location->zip; ?></p></div><!-- end span3 -->
  							
  							<div class="span3"><label><strong>Please enter your new location information:</strong></label>
  							<label>Name</label>
	<input type="text" name="location_name" value="">
	<label>Address</label>
	<input type="text" name="address" value="">
	<label>City</label>
	<input type="text" name="city" value="">
	<label>State</label>
	<select name="state">
<option value="AL">Alabama</option>
<option value="AK">Alaska</option>
<option value="AZ">Arizona</option>
<option value="AR">Arkansas</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DE">Delaware</option>
<option value="DC">District Of Columbia</option>
<option value="FL">Florida</option>
<option value="GA">Georgia</option>
<option value="HI">Hawaii</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="IA">Iowa</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="ME">Maine</option>
<option value="MD">Maryland</option>
<option value="MA">Massachusetts</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MS">Mississippi</option>
<option value="MO">Missouri</option>
<option value="MT">Montana</option>
<option value="NE">Nebraska</option>
<option value="NV">Nevada</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NY">New York</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VT">Vermont</option>
<option value="VA">Virginia</option>
<option value="WA">Washington</option>
<option value="WV">West Virginia</option>
<option value="WI">Wisconsin</option>
<option value="WY">Wyoming</option>
</select>	<label>Zip</label>
	<input type="text" name="zip" maxlength="5" value=""></div><!-- end span3 --></div><!-- end row -->
    						                
					</div>  
					<div class="modal-footer">  
						<button type="submit" class="btn btn-success">Update Location</button>  
						<a href="#" class="btn" data-dismiss="modal">Close</a> 
						</form> 
					</div>  
					</div> 
					
			<!--END LOCATION MODAL-->
	</div>
	<div class="span6 pull-right" id="right-info">
		<h2 class="bold-title">Message Options</h2>
		<form action="/beta/dashboard/main/locations_update_prefs/" method="post">
		<input type="hidden" name="location_id" value="<? echo $location->id; ?>">
		<p class="loc-info">I would like to receive my Audiebox messages by:</p>
		<select name="message_pref">
			<option value="1"<? if ($location->message_pref == 1) { ?> selected<? } ?>>Text & Email</option>
			<option value="2"<? if ($location->message_pref == 2) { ?> selected<? } ?>>Text Only</option>
			<option value="3"<? if ($location->message_pref == 3) { ?> selected<? } ?>>Email Only</option>
			<option value="4"<? if ($location->message_pref == 4) { ?> selected<? } ?>>Off</option>
		</select>
		<p class="loc-info">Auto-reply to text messages:</p>
		<p>(Limit 160 characters)</p>
		<textarea name="auto_reply" id="auto_reply" class="input-xlarge" rows="6" onKeyDown="limitText(this.form.auto_reply,this.form.countdown,160);" 
onKeyUp="limitText(this.form.auto_reply,this.form.countdown,160);"><? echo $location->auto_reply; ?></textarea>
		<p>You have <input readonly type="text" id="countdown" name="countdown" size="3" value="160"> characters left.</p>
		<p><button class="btn btn-large btn-info" type="submit">Update</button></p>
		</form>
	</div>
</div>