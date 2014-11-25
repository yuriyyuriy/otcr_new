<?php
class queryString
{
	private $query_base="SELECT * FROM testtable";
	private $query_init = array(
		"Industry" => array(),
		"Availability" => array(),
	);
	public function buildQuery(){
		if($this->allAvail())
		{
			return $this->query_base;
		}
		$multfilter=0;
		$this->query_base= $this->query_base." WHERE ";
		foreach ($this->query_init as $area=>$filter) {
			if (!empty($filter))
			{

				if ($multfilter){
					$this->query_base=$this->query_base." AND";

				}
				$this->query_base=$this->query_base."(";
				//$this->query_base=$this->query_base."";
				$this->query_base=$this->query_base.$area." LIKE";
				$multelems=0;
    			foreach($filter as $queryadd) {
					if ($multelems)
					{
						$this->query_base=$this->query_base." OR ";
						$this->query_base=$this->query_base.$area." LIKE";
					}
					$this->query_base=$this->query_base." '".$queryadd."'";
					$multelems=1;
				}
				$multfilter=1;
				$this->query_base=$this->query_base.")";
				//$this->query_base=$this->query_base.")";
			}
		}
		return $this->query_base;
	}
	public function allAvail(){
		if((empty ($this->query_init["Industry"]))&&(empty ($this->query_init["Availability"]))){
			return true;
		}
		return false;
	}
	public function addFilter($domain, $newFilter){
		$this->query_init[$domain][] = $newFilter;
	}
	public function getArrayTemp(){
		return $this->query_init;
	}
	public function returnQuery(){
		return $this->query_base;
	}
}
$overall_query= new queryString;
function removeElem_PHP($divname) {
  echo '<script type="text/javascript"> removeElement("'.$divname.'");</script>';
}
$modified=0;
?>

<!DOCTYPE html>
<!-- saved from url=(0044)http://getbootstrap.com/examples/dashboard/# -->

<html lang="en">
<head>
   <script src="js/jquery.cookie.js"></script>
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
<link href="css/bootstrap_edits.css" rel="stylesheet">
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
	    function InputQueries(){
						removeElement("data_elems");
						var myNode = document.getElementById("IndustryDiv");
						var childNodes= myNode.childNodes;
						if (myNode)
						{
							for (i=0 ; i<childNodes.length ; i++)
							{
								if (childNodes[i].checked)
								{
									//document.write(childNodes[i].name);
									removeElement("data_elems");
								}
											//
							}
						}
						//while (myNode.firstChild) {
							//if (myNode.firstChild.checked) {
							//document.write("FUCK THE PLEDGES");
							//}
							//else{

							//}
						//}
    				}
		function removeElement(childDiv){
			alert("About to remove elements!");
			var myNode = document.getElementById(childDiv);
			while (myNode.firstChild) {
    			myNode.removeChild(myNode.firstChild);
			}

		function form2form(aF1, aF2) {
			alert("Here we are yess copy");
 			var selection = "#" + aF1 + " .copy";
 			$(selection).each(function() {
     		document.forms[aF2].elements[$(this).attr('name')].value = $(this).val();
   		});
}
		</script>
</head>

<body>
	<?php
	$dom = new DOMDocument('1.0', 'iso-8859-1');
	$con = mysqli_connect("localhost","root","");
	$database="testdb2";
	mysqli_select_db($con,$database);
	?>
	<div class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button class="navbar-toggle collapsed" data-target=
        ".navbar-collapse" data-toggle="collapse" type=
        "button"><span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span></button> <a class="navbar-brand"
        href=
        "./index.php">
        Yash Technologies</a>
      </div>


      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href=
            "./add_data_source.php">
            Add new Source</a>
          </li>
        </ul>
			<form class="navbar-form navbar-right" method="post" action="index.php?go" id="searchform">
          <div class="form-group">
            <input class="form-control" placeholder=
            "Enter a search term" name="search_info" type="text">
          </div>
          <button class ="btn btn-default" name="search_go" type= "submit" value="">Search</button>
        </form>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

		<script>
			$( "#searchform" ).submit(function( event ) {
			$.each ( $('#filterform input, #filterform name, #filterform value').serializeArray(), function ( i, obj ) {
  			$('<input type="hidden">').prop( obj ).appendTo( $('#searchform') );
			} );
			});
		</script>


      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <h2><b>Filter Sources</b></h2>

		<form name="filter_go_test" action="index.php?filter_go_test" method="post" id="filterform" >
		  <div>
		  <br>
          <h4><b>Industry</b></h4>
		  <input type="checkbox" value="healthcare" id="industry1" name="industry1">
		  <label for="industry1"><span style="font-weight:normal;">Healthcare</span></label>

          <br>
		  <input type="checkbox" value="Finance" id="industry2" name="industry2">
		  <label for="industry2"><span style="font-weight:normal;">Finance</span></label>

          <br>
		  <input type="checkbox" value="Energy" id="industry3" name="industry3">
		  <label for="industry3"><span style="font-weight:normal;">Energy</span></label>

          <br>
		  <input type="checkbox" value="agriculture" id="industry4" name="industry4">
		  <label for="industry4"><span style="font-weight:normal;">Agriculture</span></label>
          </div>
          <br>
          <br>


          <h4>Status</h4>
		  <input type="checkbox" value="Free" id="avail1" name="avail1">
		  <label for="avail1"><span style="font-weight:normal;">Free</span></label>
          <br>
		  <input type="checkbox" value="Paid" id="avail2" name="avail2">
	      <label for="avail2"><span style="font-weight:normal;">Paid</span></label>
          <br>
          <br>
          <button class="btn btn-default" name="filter_go" onclick="submit" value="">Filter</button>
		  <button class="btn btn-default" name="clearall" type="button" onclick="clearalls();">Clear All</button>
        </form>



		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script>
			function clearalls() {
				document.getElementById("industry1").checked = false;
				document.getElementById("industry2").checked = false;
				document.getElementById("industry3").checked = false;
				document.getElementById("industry4").checked = false;
				document.getElementById("avail1").checked = false;
				document.getElementById("avail2").checked = false;
				 var checkboxValues = {};
		    $(":checkbox").each(function(){
		      checkboxValues[this.id] = this.checked;
		    });
		    $.cookie('checkboxValues', checkboxValues, { expires: 7, path: '/' });
				/*var checkboxValues = $.cookie('checkboxValues');
		    	if(checkboxValues){
		      	Object.keys(checkboxValues).forEach(function(element) {
				alert(element);
		        $("#" + element).prop('checked', false);
		      });

		    }*/
				document.getElementById("filterform").submit();
			}


			$( "#filterform" ).submit(function( event ) {
				//var submittedBy = form.data('submittedBy');
			//alert(submittedBy);
			$.each ( $('#searchform input, #searchform name, #searchform value').serializeArray(), function ( i, obj ) {
  			$('<input type="hidden">').prop( obj ).appendTo( $('#filterform') );
			} );
			});


      		$(":checkbox").on("change", function(){
		    var checkboxValues = {};
		    $(":checkbox").each(function(){
		      checkboxValues[this.id] = this.checked;
		    });
		    $.cookie('checkboxValues', checkboxValues, { expires: 7, path: '/' })
		  });

		  function repopulateCheckboxes(){
			//document.write("Wtf!");
		    var checkboxValues = $.cookie('checkboxValues');
		    if(checkboxValues){
		      Object.keys(checkboxValues).forEach(function(element) {

		        var checked = checkboxValues[element];
		        $("#" + element).prop('checked', checked);
		      });
		    }
		  }

		  $.cookie.json = true;
		  repopulateCheckboxes();

		</script>
      </div>


      <div class=
      "col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Open Data Sources</h1>


        <div class="row placeholders" id="data_elems">
		<?php


		$FILTER_SET=0;
		$SEARCH_SET=0;
		$filter_add="";
		$search_add="";
		if((isset($_POST['filter_go']))||(isset($_POST['search_go'])))
		{
			/*while($total_divs!=-1)
			{
				echo "Removing Elements!";
				$cake= "data_elems";
				removeElem_PHP($cake);
				$dom->removeChild(${$n});
				if ($total_divs==0)
				{
					break;
				}
				$total_divs=$total_divs -1;
				$n="div_{$total_divs}_name";
			}
			$total_divs=0;*/
			for ($i=1; $i<5; $i++)
			{
				if (isset($_POST["industry".$i])) {
				$overall_query->addFilter("Industry",$_POST["industry".$i]);
				$FILTER_SET=1;
				} else {


				}
			}
			for ($i=1; $i<3; $i++)
			{
				if (isset($_POST["avail".$i])) {
				$overall_query->addFilter("Availability",$_POST["avail".$i]);
				$FILTER_SET=1;
				} else {


				}
			}
			$filter_add= $overall_query->buildQuery();
  			if(preg_match("/^[  a-zA-Z]+/", $_POST['search_info']))
			{
				//echo $dom->saveHTML();
  				$name=$_POST['search_info'];
  				//connect  to the database
 				//$db=mysql_connect  ("servername", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error());
  				//-select  the database to use
  				//$mydb=mysql_select_db("yourDatabase");
  				//-query  the database table
				if (empty($_POST['search_info']))
				{
					$SEARCH_SET=0;
				}
				else
				{
					$search_add= "Website LIKE'%" . $name .  "%' OR Industry LIKE '%" . $name ."%' OR Availability LIKE '%" . $name ."%'OR Location LIKE '%" .$name ."%'";
					$SEARCH_SET=1;
				}
			}
		}

		if ($FILTER_SET||$SEARCH_SET)
		{
			$sql="";
			if (($FILTER_SET)&&($SEARCH_SET))
			{
				$sql= $filter_add." AND (".$search_add.")";
			}
			else if ($FILTER_SET)
			{
				$sql= $filter_add;
			}
			else
			{
				$sql= "SELECT * from testtable WHERE ".$search_add;
			}
		}
		else
		{
			$sql="SELECT * FROM testtable";
		}
		$result= mysqli_query($con, $sql);
			$total_divs=0;
			while($row=mysqli_fetch_array($result))
			{
					$Link          =$row['Website'];
					$Industry      =$row['Industry'];
					$Availability  =$row['Availability'];
					$Location      =$row['Location'];

					$n="div_{$total_divs}_name";
					$n_child="html_child_{$total_divs}";
					$n_child_link="html_child_{$total_divs}_link";
					$n_child_industry="html_child_{$total_divs}_industry";
					$n_child_availability="html_child_{$total_divs}_availability";
					$n_child_location="html_child_{$total_divs}_location";
					$child_link= "html_".$Link;

					${$n}= $dom->appendChild($dom->createElement('div'));
					${$n_child}= ${$n}->appendChild($dom->createElement('div'));
					${$child_link}= ${$n_child}->appendChild($dom->createElement('a'));
					${$n_child_link}= ${$child_link}->appendChild($dom->createElement('div',$Link)); /// wut
					${$n_child_industry}= ${$n_child}->appendChild($dom->createElement('div', "Industry : ".$Industry));
					${$n_child_availability}= ${$n_child}->appendChild($dom->createElement('div',"Availability : ".$Availability));
					${$n_child_location}= ${$n_child}->appendChild($dom->createElement('div', "Location : ".$Location));

					$$n->setAttribute('id', $n);
					$$n->setAttribute('class','col-xs-6 col-sm-4 col-md-3 column');
					${$n_child}->setAttribute('class','box');
					${$child_link}->setAttribute('href',$Link);
					${$n_child_link}->setAttribute('class','title h4');
					${$n_child_industry}->setAttribute('class','attributes');
					${$n_child_availability}->setAttribute('class','attributes');
					${$n_child_location}->setAttribute('class','attributes');
					$total_divs= $total_divs+1;
	  		}
			$dom->formatOutput = true;
			echo $dom->saveHTML();
			if ($total_divs==0)
			{
				echo '<p id= "no_results"> No results were found for your query </p>';
			}
		?>
		</div>
        <h2 class="sub-header">Section title</h2>


        <div class="table-responsive">
          <!-- <table><OLD TABLE HERE/table>-->
        </div>
      </div>
		<?php
		/*   if(isset($_POST['filter_go']))
			{
			echo "HELLLO WORLD";
			foreach($_POST as $name => $value) {
				echo $name;

				echo $value;
				echo "<br>";
			}

			}*/
			if(isset($_POST['search_go']))
			{
			echo "HELLLO WORLD";
			foreach($_POST as $name => $value) {
				echo $name;

				echo $value;
				echo "<br>";
			}

			}


		?>
    </div>
  </div>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
   </script> <script src="js/bootstrap.min.js"></script> <script src="js/docs.min.js"></script> <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
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
