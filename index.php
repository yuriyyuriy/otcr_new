<?php
class queryString
{
	private $query_base="SELECT * FROM testtable";
	private $query_init = array(
		"Industry" => array(),
		"Status" => array(),
	);
	public function buildQuery(){
		if(allAvail)
		{
			return $query_base;
		}
		$multfilter=0;
		foreach ($query_init as $area=>$filter) {
			if (!empty($filter))
			{
				if ($multfilter){
					$query_base=$query_base." AND ";

				}
				$query_base=$query_base." WHERE ".$area." LIKE ";
				$multelems=0;
    			foreach($filter as $queryadd) {
					if ($multelems)
					{
						$query_base=$query_base." OR";
					}
					$query_base=$query_base." ".$queryadd;
					$multelems=1;
				}
				$multfilter=1;
			}
		}
	}
	public function allAvail(){
		if((empty ($query_init["Industry"]))&&(empty ($query_init["Status"]))){
			return true;
		}
		return false;
	}
	public function addFilter($domain, $newFilter){
		$query_init[$domain][] = $newFilter;
	}
	public function removeFilter($domain, $oldFilter){
		array_diff( $query_init[$domain], $oldFilter);
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
			var myNode = document.getElementById(childDiv);
			while (myNode.firstChild) {
    			myNode.removeChild(myNode.firstChild);
			}
		//	if (document.getElementById(childDiv)){
		//		document.write("Removing div "+childDiv);   
		//	  	var child = document.getElementById(childDiv);
		//	  	child.parentNode.removeChild(child);
			//	return true;
		//	}
		//	return false;
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
			<form class="navbar-form navbar-right" method="post" action="index.php?go" id="searchform">
          <div class="form-group">
            <input class="form-control" placeholder=
            "Enter a search term" name="search_info" type="text">
          </div>
          <button class ="btn btn-default" name="search_go" type= "submit" value="">Search</button>
        </form>
          

      </div>
    </div>
  </div>


  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 col-md-2 sidebar">
        <h2><b>Filter Sources</b></h2>

		<form name="filter_go_test" action="index.php?filter_go_test" method="post" >
		  <br>
          <h4><b>Industry</b></h4>
		  <input type="checkbox" value="healthcare" id="industry1" name="industry1">
		  <label for="industry1"><span style="font-weight:normal;">Healthcare</span></label>

          <br>
		  <input type="checkbox" value="finance" id="industry2" name="industry2">
		  <label for="industry2"><span style="font-weight:normal;">Finance</span></label>
          
          <br>
		  <input type="checkbox" value="retail" id="industry3" name="industry3">
		  <label for="industry3"><span style="font-weight:normal;">Retail</span></label>
          
          <br>
		  <input type="checkbox" value="agriculture" id="industry4" name="industry4">
		  <label for="industry4"><span style="font-weight:normal;">Agriculture</span></label>
          
          <br>
          <br>


          <h4>Status</h4>
		  <input type="checkbox" value="free" id="avail1" name="avail1"><br>
		  <label for="avail1"><span style="font-weight:normal;">Free</span></label>
          
		  <input type="checkbox" value="paid" id="avail2" name="avail2"><br>
	      <label for="avail2"><span style="font-weight:normal;">Paid</span></label>
          
          <br>
          <button class="btn btn-default" name="filter_go" type="submit" value="">Filter</button>
					
        </form>


		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script>
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
		$total_query="SELECT * FROM testtable";
		$result = mysqli_query($con,$total_query);
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
						$Link          =$row['Website'];	
						$Industry      =$row['Industry'];
						$Availability  =$row['Location'];
						$Location      =$row['Availability'];

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
		$total_divs= $total_divs -1;

	  		//if(isset($_GET['filter_go']))
			//{
			//$cake= "data_elems";
			//removeElem_PHP($cake);
			//echo "<p> Yay! </p>";
			
	//	}
	
		if(isset($_POST['search_go']))
		{
	//  		if(isset($_GET['go']))
		//	{
	  			if(preg_match("/^[  a-zA-Z]+/", $_POST['search_info']))
				{
					echo $dom->saveHTML();
	  				$name=$_POST['search_info'];
	  				//connect  to the database
	 				//$db=mysql_connect  ("servername", "username",  "password") or die ('I cannot connect to the database  because: ' . mysql_error());
	  				//-select  the database to use
	  				//$mydb=mysql_select_db("yourDatabase");
	  				//-query  the database table
	  				$sql="SELECT * FROM testtable WHERE Website LIKE '%" . $name .  "%' OR Industry LIKE '%" . $name ."%' OR Availability LIKE '%" . $name ."%'OR Location LIKE '%" . $name ."%'";
	  				//-run  the query against the mysql query function1
	 				$result=mysqli_query($con,$sql);	
					//-create  while loop and loop through result set
					while($total_divs!=-1)
					{
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
					//echo $dom->saveHTML();
					$total_divs=0;			
					while($row=mysqli_fetch_array($result))
					{
						$Link          =$row['Website'];	
						$Industry      =$row['Industry'];
						$Availability  =$row['Location'];
						$Location      =$row['Availability'];

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
					if ($total_divs==0)
					{
						echo '<p id= "no_results"> No results were found for this search query </p>';
					}
					
					echo $dom->saveHTML();
				}
			//}
		}
		?>
		</div>
        <h2 class="sub-header">Section title</h2>


        <div class="table-responsive">
          <!-- <table><OLD TABLE HERE/table>-->
        </div>
      </div>
		<?php
			if(isset($_POST['filter_go']))
			{
				for ($i=4; $i<5; $i++)
				{
					if (isset($_POST["industry".$i])) {
					echo '<script type="text/javascript"> InputQueries(); </script>';

					} else {


					} 
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
