<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->
<html lang="en">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">
    <link href="http://getbootstrap.com/favicon.ico" rel="icon">
    <title>
      Add Data Source - Yash Technologies
    </title><!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"><!-- Custom styles for this template -->
     <link href="css/bootstrap_edits.css" rel="stylesheet"><!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet"><!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="js/ie-emulation-modes-warning.js"></script>
    <style type="text/css">
</style><!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <style id="holderjs-style" type="text/css">
</style>
	
  </head>
  <body>
	<?php
	
	if (isset($_POST['insert_value']))
	{
		$con = mysqli_connect("localhost","root","");
		$database="testdb2";
		mysqli_select_db($con,$database);
	
		//$sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
		$sql_search="SELECT * FROM testtable WHERE Name LIKE '".$_POST['sourceSelect']."' OR Website LIKE '".$_POST['linkSelect']."'";
		
		$result= mysqli_query($con, $sql_search);
		if ($row=mysqli_fetch_array($result))
		{
			
		}	
		else
		{
			$sql_insert= "INSERT INTO testtable (Name, Website, Availability, Location, Industry) VALUES('".$_POST['sourceSelect']."', '".$_POST['linkSelect']."', '".$_POST['availabilitySelect']."', '".$_POST['locationSelect']."', '".$_POST['industrySelect']."')";
			if($result= mysqli_query($con, $sql_insert))
			{
				
			}
			else
			{
				echo mysqli_errno($con) . ": " . mysqli_error($con). "\n";
			}
		}
		

		//mysqli_query($con, $sql);










	}

	?>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button"><span class="sr-only">Toggle navigation</span> <span class=
          "icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href=
          "./index.php">Yash Technologies</a>
        </div>

        <div class="navbar-collapse collapse">

          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input class="form-control" placeholder="Write a name or month" type="text">
            </div>
            <button class="btn btn-default" type="submit">Search</button>
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">

        </div>
        <form class="form-group" action="add_data_source.php?insert_value" method="post" id="insert_data">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">
            Add Data Source
          </h1>

          <h3>
            Data Source Information
          </h3>

              <div class="row"><!-- OPEN CONTAINER FOR MAIN-->
                <div class="col-xs-12 col-sm-6 col-md-6 column"> <!-- OPEN COLUMN FOR PRIMARY INFO BOOSTRAP GRID-->
                  <h4>Primary Information</h4>
                  <div id="primary-info"><!-- OPEN COLUMN FOR PRIMARY INFO ID PRIMARY-INFO-->
                    <div class="row"><!-- OPEN COLUMN FOR PRIMARY INFO CLASS ROW-->

                      <div class="col-xs-12 col-sm-5 col-md-5 column"><!-- OPEN COLUMN FOR TITLES FOR PRIMARY INFO -->
                        <div class="input-title spacing">Source Name</div>
                        <div class="input-title spacing">Website Link</div>
                        <div class="input-title spacing"> Industry</div>
                        <div class="input-title spacing">Location </div>
                        <div class="input-title spacing">Format</div>
                        <div class="input-title spacing">Availability</div>
                      </div><!-- CLOSE COLUMN FOR TITLES FOR PRIMARY INFO -->

                      <div class="col-xs-12 col-sm-7 col-md-7 column"><!-- OPEN COLUMN FOR INPUT FOR PRIMARY INFO -->

                        <input class="form-control spacing" placeholder="DDDD" size="100%" type="text" id="sourceSelect">
                        <input class="form-control spacing" placeholder="www.website.com" size="100%" type="text" id="linkSelect">
                        <select class="form-control spacing" id="industrySelect" onChange='selectSwitch("industrySelect","locationSelect");'>
                          <option value="Option 1">Option 1</option>
                          <option value="Option 2">Option 2</option>
                          <option value="Option 3">Option 3</option>
                          <option value="Option 3">Option 4</option>
                          <option value="Other">Other </option>
                        </select>
						<select class="form-control spacing" id="locationSelect" onChange='selectSwitch("locationSelect","formatSelect");'>
						  <option value="Free">Free</option>
                          <option value="Paid - Subscription">Paid - Subscrition</option>
                          <option value="No time fee">Paid - No time fee</option>
						  <option value="Other">Other </option>
                        </select>
						<select class="form-control spacing" id="formatSelect" onChange='selectSwitch("formatSelect","availabilitySelect");'>
						  <option value="Free">Free</option>
                          <option value="Paid - Subscription">Paid - Subscrition</option>
                          <option value="Paid - No time fee">Paid - No time fee</option>
						  <option value="Other">Other </option>
                        </select>
                        <select class="form-control spacing" id="availabilitySelect" onChange='selectSwitch("availabilitySelect","firstPlaceHolder");'>
                          <option value="Free">Free</option>
                          <option value="Paid - Subscription">Paid - Subscrition</option>
                          <option value="Paid - No time fee">Paid - No time fee</option>
						  <option value="Other">Other </option>
                        </select>
						<div id="firstPlaceHolder"> </div>
                      </div><!-- CLOSE COLUMN FOR INPUT FOR PRIMARY INFO -->
                    </div><!-- CLOSE COLUMN FOR PRIMARY INFO CLASS ROW -->
                  </div><!-- CLOSE COLUMN FOR PRIMARY INFO ID PRIMARY-INFO-->
                </div><!-- CLOSE COLUMN FOR PRIMARY INFO BOOSTRAP GRID-->

                <div class="col-xs-12 col-sm-6 col-md-6 column"> <!-- OPEN COLUMN FOR SECONDARY INFO BOOSTRAP GRID-->
                  <h4>Secondary Information</h4>
                  <div id="secondary-info"><!-- OPEN COLUMN FOR SECONDARY INFO ID SECONDARY-INFO-->
                    <div class="row"><!-- OPEN COLUMN FOR SECONDARY INFO CLASS ROW-->

                      <div class="col-xs-12 col-sm-5 col-md-5 column"><!-- OPEN COLUMN FOR TITLES FOR SECONDARY INFO -->
                        <div class="input-title spacing">Target Users</div>
                        <div class="input-title spacing">Law and Licensing</div>
                        <div class="input-title spacing">Type of Analytics</div>
                        <div class="input-title spacing">Extraction Process</div>
                        <div class="input-title spacing">Opportunities for Improvement</div>
                        <div class="input-title spacing">Domains that can benefit</div>
                      </div><!-- CLOSE COLUMN FOR TITLES FOR SECONDART INFO -->

                      <div class="col-xs-12 col-sm-7 col-md-7 column" id="secondoptions"><!-- OPEN COLUMN FOR INPUT FOR SECONDARY INFO -->

                        <input class="form-control spacing" placeholder="DDDD" size="100%" type="text" id="targetSelect">
                        <input class="form-control spacing" placeholder="www.website.com" size="100%" type="text" id="lawSelect">
						<input class="form-control spacing" placeholder="www.website.com" size="100%" type="text" id="analyticsSelect">
                        <input class="form-control spacing" placeholder="Username" size="100%" type="text"  id="extractionSelect">
                        <input class="form-control spacing" placeholder="Unstructured, Structured, Layered ..." size="100%" type="text" id="opportunitiesSelect">
						<input class="form-control spacing" placeholder="Unstructured, Structured, Layered ..." size="100%" type="text" id="domainsSelect">
                      </div><!-- CLOSE COLUMN FOR INPUT FOR SECONDARY INFO -->
                    </div><!-- CLOSE COLUMN FOR PRIMARY INFO CLASS ROW -->
                  </div><!-- CLOSE COLUMN FOR PRIMARY INFO ID PRIMARY-INFO-->
              </div> <!-- CLOSE COLUMN FOR SECONDARY INFO BOOSTRAP GRID-->
              <p class="text-center">
                <button class="btn btn-primary btn-lg" type="submit" name="insert_value">Create</button>
              </p>
            </div><!-- CLOSE CONTAINER FOR MAIN-->
          </form>
          <!--<h2 class="sub-header">Section title</h2>-->

          <!--<div class="table-responsive">
            <table><OLD TABLE HERE/table>
          </div>-->
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript">
	var industrySwitch=0;
	var industryElems=[];
	var locationSwitch=0;
	var locationElems=[];
	var formatSwitch=0;
	var formatElems=[];
	var availabilitySwitch=0;
	var availabilityElems=[];
	var industryBefore, locationBefore, formatBefore, availabilityBefore;
	function selectSwitch(curElemName, beforeElemName)
	{


		var curElem = document.getElementById(curElemName);
		var curElemID= curElem.getAttribute('id');
			if ("Other"==curElem.options[curElem.selectedIndex].value)
			{	
			if (curElemName=="industrySelect")
			{
				industryBefore= beforeElemName;
				industrySwitch=1;
				var children = document.getElementById(curElemName).children;
				for (i = 0; i < children.length; i++) {

				  	industryElems[i]=children[i].value;
				}
			}
			else if (curElemName=="locationSelect")
			{
				locationBefore=beforeElemName;
				locationSwitch=1;
				var children = document.getElementById(curElemName).children;
				for (i = 0; i < children.length; i++) {

				  	locationElems[i]=children[i].value;
				}
			}
			else if (curElemName=="formatSelect")
			{
				formatBefore=beforeElemName;
				formatSwitch=1;
				var children = document.getElementById(curElemName).children;
				for (i = 0; i < children.length; i++) {

				  	formatElems[i]=children[i].value;
				}
			}
			else if (curElemName=="availabilitySelect")
			{
				availabilityBefore=beforeElemName;
				availabilitySwitch=1;
				var children = document.getElementById(curElemName).children;
				for (i = 0; i < children.length; i++) {

				  	availabilityElems[i]=children[i].value;
				}
			}
			var beforeElem= document.getElementById(beforeElemName);
		    var newElement = document.createElement('input');
			var parentElem= curElem.parentNode;
			parentElem.removeChild(curElem);
		    newElement.setAttribute('class', 'form-control spacing');
		    newElement.setAttribute('type', 'text');
		    newElement.setAttribute('size', '100%');
			newElement.setAttribute('placeholder', 'Other');
			newElement.setAttribute('id', curElemID);
		    parentElem.insertBefore(newElement, beforeElem ); 
		}
	}
	function formAttachHidden(curName)
	{
		var curElem= document.getElementById(curName);
		var curForm= document.getElementById("insert_data");
		var newElement= document.createElement('input');
		newElement.setAttribute('value', curElem.value);
		newElement.setAttribute('type', 'hidden');
		newElement.setAttribute('name', curName);
		curForm.appendChild(newElement);
		
	}
	function restoreDropBoxes()
	{
		var curElem;
		var parentElem;
		var newElem;
		var newOption;
		if(industrySwitch)
		{
			curElem= document.getElementById("industrySelect");
			parentElem = curElem.parentNode;
			parentElem.removeChild(curElem);
			newElem= document.createElement('select');
			newElem.className= "form-control spacing";
			newElem.setAttribute('onchange','selectSwitch("industrySelect", "'+industryBefore+'");');
			newElem.setAttribute('id', 'industrySelect');
			parentElem.insertBefore(newElem, document.getElementById(industryBefore));
			for (i=0; i< industryElems.length; i++)
			{
				newOption= document.createElement('option');
				newElem.appendChild(newOption);
				newOption.value=industryElems[i];
				newOption.innerHTML=industryElems[i];
			}
			industrySwitch=0;
		}
		if(locationSwitch)
		{
			curElem= document.getElementById("locationSelect");
			parentElem = curElem.parentNode;
			parentElem.removeChild(curElem);
			newElem= document.createElement('select');
			newElem.className= "form-control spacing";
			newElem.setAttribute('onchange','selectSwitch("locationSelect", "'+locationBefore+'");');
			newElem.setAttribute('id', 'locationSelect');
			parentElem.insertBefore(newElem, document.getElementById(locationBefore));
			for (i=0; i< locationElems.length; i++)
			{
				newOption= document.createElement('option');
				newElem.appendChild(newOption);
				newOption.value=locationElems[i];
				newOption.innerHTML=locationElems[i];
			}
			locationSwitch=0
		}
		if(formatSwitch)
		{
			curElem= document.getElementById("formatSelect");
			parentElem = curElem.parentNode;
			parentElem.removeChild(curElem);
			newElem= document.createElement('select');
			newElem.className= "form-control spacing";
			newElem.setAttribute('onchange','selectSwitch("formatSelect", "'+formatBefore+'");');
			newElem.setAttribute('id', 'formatSelect');
			parentElem.insertBefore(newElem, document.getElementById(formatBefore));
			for (i=0; i< formatElems.length; i++)
			{
				newOption= document.createElement('option');
				newElem.appendChild(newOption);
				newOption.value=formatElems[i];
				newOption.innerHTML=formatElems[i];
			}
			formatSwitch=0
		}
		if(availabilitySwitch)
		{
			curElem= document.getElementById("availabilitySelect");
			parentElem = curElem.parentNode;
			parentElem.removeChild(curElem);
			newElem= document.createElement('select');
			newElem.className= "form-control spacing";
			//newElem.onchange= selectSwitch("availabilitySelect", availabilityBefore);
			newElem.setAttribute('onchange','selectSwitch("availabilitySelect", "'+availabilityBefore+'");');
			newElem.setAttribute('id', 'availabilitySelect');
			parentElem.insertBefore(newElem, document.getElementById(availabilityBefore));
			for (i=0; i< availabilityElems.length; i++)
			{
				newOption= document.createElement('option');
				newElem.appendChild(newOption);
				newOption.value=availabilityElems[i];
				newOption.innerHTML=availabilityElems[i];
			}
			availabilitySwitch=0;
		}



	}
	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
	
	$( "#insert_data" ).submit(function( event ) {
			if(document.getElementById('sourceSelect').value=="")
			{
				alert("Please enter a source name");
				return false;
			}
			if (document.getElementById('linkSelect').value=="")
			{
				alert("Please enter a website link");
				return false;
			}
		if ((industrySwitch)|(formatSwitch)|(locationSwitch)|(availabilitySwitch))
		{
			if (confirm("Warning: Please make sure your new primary values are correct before proceeding.")){
				attachAllHidden();
			}
			else{
				restoreDropBoxes();
				return false;
			}
		}
		else
		{	
			attachAllHidden();
		}
		 
	});
	function attachAllHidden(){debugger
			formAttachHidden("targetSelect");
			formAttachHidden("lawSelect");
			formAttachHidden("analyticsSelect");
			formAttachHidden("extractionSelect");
			formAttachHidden("opportunitiesSelect");
			formAttachHidden("domainsSelect");
			formAttachHidden("sourceSelect");
			formAttachHidden( "linkSelect");
			formAttachHidden("industrySelect");
			formAttachHidden("locationSelect");
			formAttachHidden("formatSelect");
			formAttachHidden("availabilitySelect");
}
	</script>
    </script> <script src="js/bootstrap.min.js"></script> <script src="js/docs.min.js"></script> <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
     <script src="js/ie10-viewport-bug-workaround.js"></script>
    <div class="global-zeroclipboard-container" data-original-title="Copy to clipboard" id="global-zeroclipboard-html-bridge" style=
    "position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;" title="">
      <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" height="100%" id="global-zeroclipboard-flash-bridge" width="100%">
        <param name="movie" value="/assets/flash/ZeroClipboard.swf?noCache=1414347817655">
        <param name="allowScriptAccess" value="sameDomain">
        <param name="scale" value="exactfit">
        <param name="loop" value="false">
        <param name="menu" value="false">
        <param name="quality" value="best">
        <param name="bgcolor" value="#ffffff">
        <param name="wmode" value="transparent">
        <param name="flashvars" value="trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">
        <embed height="100%" src="/assets/flash/ZeroClipboard.swf?noCache=1414347817655" type="application/x-shockwave-flash" width="100%">
      </object>
    </div>
  </body>
</html>
