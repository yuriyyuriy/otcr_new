<?php
function removeElem_PHP($divname) {
	echo 'Helllo';
  echo '<script type="text/javascript"> removeElement("'.$divname.'");</script>';
}
?>

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

  <title>Yash Technologies</title><!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">
  <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
  <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

  <script src="js/ie-emulation-modes-warning.js"></script>
  <style type="text/css">
</style>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style id="holderjs-style" type="text/css">
</style>
<script type="text/javascript">
		function removeElement(childDiv){
			document.write("Hello");
			if (document.getElementById(childDiv)){   
			  	var child = document.getElementById(childDiv);
			  	child.parentNode.removeChild(child);
				return true;
			}
			return false;
		}
		</script>
</head>

<body>
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target=
        ".navbar-collapse" data-toggle="collapse" type=
        "button"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span></button> <a class="navbar-brand"
        href=
        "./Dashboard%20Template%20for%20Bootstrap_files/Dashboard%20Template%20for%20Bootstrap.html">
        Yash Technologies</a>
      </div>


      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href=
            "./Dashboard%20Template%20for%20Bootstrap_files/Dashboard%20Template%20for%20Bootstrap.html">
            Add new Source</a>
          </li>
        </ul>


        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input class="form-control" placeholder=
            "Write a name or month" name="search_info" type="text">
          </div>
          <button class ="btn btn-default" name="search_go" type=
          "submit">Search</button>
        </form>
      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <h2>Filter Sources</h2>


        <form>
          <h5>Industry</h5>
          <input name="industry" type="checkbox" value="healthcare">
          Healthcare<br>
          <input name="industry" type="checkbox" value="finance">
          Finance<br>
          <input name="industry" type="checkbox" value="retail">
          Retail<br>
          <input name="industry" type="checkbox" value="agriculture">
          Agriculture<br>
          <br>


          <h5>Status</h5>
          <input name="status" type="checkbox" value="free"> Free<br>
          <input name="status" type="checkbox" value="paid"> Paid<br>
          <br>
          <button class="btn btn-default" type=
          "submit">Filter</button>
        </form>
      </div>


      <div class=
      "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Open Data Sources</h1>


        <div class="row placeholders">

		<?php
		$dom = new DOMDocument('1.0', 'iso-8859-1');
		$con = mysqli_connect("localhost","root","");
		$database="testdb";
		mysqli_select_db($con,$database);
		$result = mysqli_query($con,"SELECT * FROM testtable");
		$total_divs=0;
		//echo "<p>".$div_0_name."</p>";
		//$attr_array= array( 'class' => 'item', 'width' => '200px', 'height' => '200px');
		//$stream=streamWrapper::__construct();
		if (!$result)
		{
			echo "Whaaat";
		}
		while($row=mysqli_fetch_array($result))
		{
			$FirstName  =$row['Name'];	
			$Month      =$row['Month'];

			$n="div_{$total_divs}_name";
			$n_child="html_child_{$total_divs}";
			$n_child_name="html_child_{$total_divs}_name";
			$n_child_month="html_child_{$total_divs}_month";

			${$n}= $dom->appendChild($dom->createElement('div'));
			${$n_child}= ${$n}->appendChild($dom->createElement('div'));
			${$n_child_name}= ${$n_child}->appendChild($dom->createElement('div',"Name :".$FirstName));
			${$n_child_month}= ${$n_child}->appendChild($dom->createElement('div', "Month :".$Month));
		
		

			$$n->setAttribute('id', $n);
			$$n->setAttribute('class','col-xs-6 col-sm-4 col-md-3 column');
			${$n_child}->setAttribute('class','box');
			${$n_child_name}->setAttribute('class','attributes');
			${$n_child_month}->setAttribute('class','attributes');
		

			$total_divs= $total_divs+1;
	  	}
		$dom->formatOutput = true;
		echo $dom->saveHTML();
		$total_divs= $total_divs -1;
		if(isset($_POST['search_info']))
		{
	  		if(isset($_GET['search_go']))
			{
	  			if(preg_match("/^[  a-zA-Z]+/", $_POST['search_info']))
				{
	  				$name=$_POST['search_info'];
	  				//connect  to the database
	 				//$db=mysql_connect  ("servername", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error());
	  				//-select  the database to use
	  				//$mydb=mysql_select_db("yourDatabase");
	  				//-query  the database table
	  				$sql="SELECT * FROM testtable WHERE Name LIKE '%" . $name .  "%' OR Month LIKE '%" . $name ."%'";
	  				//-run  the query against the mysql query function1
	 				$result=mysqli_query($con,$sql);	
					//-create  while loop and loop through result set
					while($total_divs!=-1)
					{
						removeElem_PHP($n);
						$dom->removeChild(${$n});
						if ($total_divs==0)
						{
							break;
						}
						$total_divs=$total_divs -1;
						$n="div_{$total_divs}_name";
					}
					//echo $dom->saveHTML();
					//$total_divs=0;			
					while($row=mysqli_fetch_array($result))
					{
						$FirstName  =$row['Name'];	
						$Month      =$row['Month'];

						$n="div_{$total_divs}_name";
						$n_child="html_child_{$total_divs}";
						$n_child_name="html_child_{$total_divs}_name";
						$n_child_month="html_child_{$total_divs}_month";

						${$n}= $dom->appendChild($dom->createElement('div'));
						${$n_child}= ${$n}->appendChild($dom->createElement('div'));
						${$n_child_name}= ${$n_child}->appendChild($dom->createElement('div',"Name :".$FirstName));
						${$n_child_month}= ${$n_child}->appendChild($dom->createElement('div', "Month :".$Month));
		
		

						$$n->setAttribute('id', $n);
						$$n->setAttribute('class','col-xs-6 col-sm-4 col-md-3 column');
						${$n_child}->setAttribute('class','box');
						${$n_child_name}->setAttribute('class','attributes');
						${$n_child_month}->setAttribute('class','attributes');
				  	}
					if ($total_divs==0)
					{
						echo '<p id= "no_results"> No results were found for this search query </p>';
					}
					
					echo $dom->saveHTML();
				}
			}
		}
		?>
		</div>
        <h2 class="sub-header">Section title</h2>


        <div class="table-responsive">
          <!-- <table><OLD TABLE HERE/table>-->
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery.min.js"></script> <script src="js/bootstrap.min.js"></script> <script src="js/docs.min.js"></script> <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
   <script src="js/ie10-viewport-bug-workaround.js"></script>

  <div class="global-zeroclipboard-container" data-original-title=
  "Copy to clipboard" id="global-zeroclipboard-html-bridge" style=
  "position: absolute; left: 0px; top: -9999px; width: 15px; height: 15px; z-index: 999999999;"
  title="">
    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" height=
    "100%" id="global-zeroclipboard-flash-bridge" width="100%">
      <param name="movie" value=
      "/assets/flash/ZeroClipboard.swf?noCache=1414347817655">
      <param name="allowScriptAccess" value="sameDomain">
      <param name="scale" value="exactfit">
      <param name="loop" value="false">
      <param name="menu" value="false">
      <param name="quality" value="best">
      <param name="bgcolor" value="#ffffff">
      <param name="wmode" value="transparent">
      <param name="flashvars" value=
      "trustedOrigins=getbootstrap.com%2C%2F%2Fgetbootstrap.com%2Chttp%3A%2F%2Fgetbootstrap.com">
      <embed height="100%" src=
      "/assets/flash/ZeroClipboard.swf?noCache=1414347817655" type=
      "application/x-shockwave-flash" width="100%">
    </object>
  </div>
</body>
</html>
