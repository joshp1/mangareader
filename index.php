<?php
	/****************************************
	 * The main index for the manga reader	*
	 * Use load into cookies				*
	 ****************************************/
?>
<!DOCTYPE html>
<script src="cookielib.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://joshlucy.info/jquery/jquery.cycle2.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
/*
 * begining of slider script
 */

	jQuery("document").ready(function(){
		jQuery("#slider > img:gt(0)").hide();
		jQuery("#button-next").click(function() { 
			jQuery("#slider > img:first")
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.appendTo("#slider");
		});
	});
	
	jQuery("document").ready(function(){
		jQuery("#slider > img:gt(0)").hide();
		jQuery("#button-previous").click(function() { 
			jQuery("#slider > img:last")
			.fadeOut(1000)
			.next()
			.fadeIn(1000)
			.appendTo("#slider");
		});
	});
/*
 * end of slider script
 */
 // for the upload popup layer
 		$("#upscr").draggable ();
// for the search query
			function jat(abc)
		{	document.getElementById("sq").innerHTML=abc;
		}function jqt (a){
		$.post ('test.php',
		{	q:a
		},
		function(data,status){
			//document.getElementById ("bigim").src=data;
			 $("#sq").html (data);
		});
	}
	// manga reader viewer ajax
	function ban (a,b){
		$.post ('vweier.php',
		{	nmae:a,
			mnea:b
		},
		function(data,status){
			//document.getElementById ("bigim").src=data;
			 $(".lsts").html (data);
		});
	}
	function btn (a,b)
	{    $.post("viewer.php",
	    { name:a,
	      loco:b
	    },
	    function(data,status){
	      $('.lsts').html(data);
	    });
	}
	function imgpn (c)
	{	document.getElementById("bigim").src=c;
	}
	function clkcde (e) 
	{	document.getElementById (e).style.visibility="hidden";
	}
	function showvid(d)
	{	$.post ('vew.php',
		{nmae:d
		},
		function (dtaa,staus)
		{	$('#cnt').html (dtaa);
		});
		document.getElementById ("mngav").style.visibility="visible";
	}
	function shload ()
	{	document.getElementById ('upscr').style.visibility="visible";
	}
</script>
<style>/*
        * begining of slider css
        */
       #slider-wrapper {background-color:#F00;
display: block;
max-width: 1500px;
margin: 0 auto;
max-height: 750px;
height: 100%; height:590px;}
#slider {
display: block;
position: relative;
max-width: 3000px;
width: 100%;
margin: 0 100 ; }
#serch
{	display:block;position:relative;left:100px;
}
#tops
{	display:block;position:absolute;top:10;
}
#button-previous {
position: relative;
left: 0;top:284px;
margin-top:0;
/*width: 40px;
height: 60px;*/ }
 
#button-next {
position: relative;
margin-top:25%;
float: right; }

.sp {
position: absolute; }

#slider .sp {
max-width: 3000px;
width: 100%;
max-height: 588px; }
       /*
        * end of slider css
        */
       /*.zdex {z-index:3;}*/
       #mngav{background-color:#eee;top: 0px;left:0px;position:absolute;
		visibility:hidden;
	}
	#nav{	width:20px;
	}
	#scrl{	overflow:auto;
		height:590px;width:100px;}
	#ttb{	background-color:#555;}
	#cls{	margin:0px 0 0 995px;
		background-color:#555;
	}
	#cls:hover
	{	background-color:#777;cursor:default;
	}#s{	position:absolute;display:block;
	}#abc{	position:absolute;display:block;}
	#cla {	background-color:#555;color:#FFF;
		float:right;}
	#cla:hover
	{	background-color:#777;cursor:default;
	}#upscr{background-color:#eee;color:#fff;
		position:absolute;visibility:hidden;
		top :0px;
		width :244px;}
	#mngt{ height:590px;}
	#uplt{	height:200px;width:2px;border:1px solid #EEE;}
	.imin{	position:absolute;top:50px;left:111px;width:44px;
	}
	.lsts{}
	.txtbx{ width :184px; background-color:#EEE;}
	</style>
	<div id="tops">
		<!-- upload button -->
		<button onclick="shload ();">Upload</button>
		<!-- --- search engine for manga's --- -->
	</div>
	<div id='serch'>
		<form method="post">
			<label>Manga Search</label>
			<input type="text" onkeyup="jqt (this.value)" />
		</form>
	</div>
	<!-- --- Gallery for manga --- -->
<?php		   //Variables for connecting to your database.
		  //These variable values come from your hosting account.
		 $hostname = "SMFReader.db.7684787.hostedresource.com";
		$username = "SMFReader";
		$dbname = "SMFReader";
	
		 //These variable values need to be changed by you before deploying
		$password = "M01@rtinfan";
		$usertable = "Reader";  
		$yourfield = "your_field";

		 //Connecting to your database
		mysql_connect($hostname, $username, $password) OR DIE ("Unable to 
		connect to database! Please try again later.");
		mysql_select_db($dbname);

		 //Fetching from your database table.
		$query = "SELECT DISTINCT series From Reader order by ID";
		$result = mysql_query($query);
		if ($result) {
			while($row = mysql_fetch_assoc($result)) {
				echo '<div onclick="showvid ('."'".$row['series']."'".')" id="sq">'.$row['series']."</div>";
			}
		}?>
<!-- --- upload script --- -->

<div id="upscr">
	
	<table id='uplt'>
		<tr>	<td colspan=2 id='ttb'>	
				<div id='cla' onclick="clkcde ('upscr');">X</div>
			</td>
		</tr>
		<tr>	<td colspan=2>	<form action='upload.php' method='POST' enctype="multipart/form-data">
						<input type='file' name='file' id ='file' /><br />
			</td>
		</tr>
		<tr>	<td>	<label>Name</label>
			</td>
			<td>	<input type='text' name='loco' id ='loco' class='txtbx' />
			</td>
		</tr>
		<tr>	<td>	<label>Tags</label>
			</td>
			<td>	<input type='text' name='tags' id ='tags' class='txtbx' /></br>
			</td>
		</tr>
		<tr>	<td>	<label>Genres</label>
			</td>
			<td>	<input type='text' name='genre' id ='genre' class='txtbx' /><br />
			</td>
		</tr>
		<tr>	<td>	<label>Series</label>
			</td>
			<td>	<input type='text' name='sers' id ='sers' class='txtbx' /><br/>
			</td>
		</tr>
		<tr>	<td colspan=2 align='right'>
				<input type='submit' name='submit' value="Submit" /></form></div>
			</td>
		</tr>
	</table>
</div>

<!-- --- popup window to display manga reader --- -->
<div id="mngav">
	<div id='ttb'>
		<div id="abc" style="color:#FFF;">LHH's Manga Reader</div>
		<div id="cls" onclick="clkcde ('mngav');">
			X
		</div>
	</div>
	<!-- --- This is the manga reader --- -->
	<table border id='mngt'>
		<tr>	<td rowspan="2" id="nav">
				<div id="scrl">
					<!-- - - fills the scrollable div tag n the table division (td) also shows the chapter view --- -->
					<div id='cnt'></div>
				</div>
			</td>
			<!-- --- shows the images in chapter.  Opens the chapter --- -->
		</tr>
		<tr><td id="slider-wrapper" width="900px"><div>
					<div id="slider" class="lsts"></div>
					<div id="button-previous">
						<img src="http://joshlucy.info/photoalbum/playboy/icon/ltaro.png" />
 
					</div>
					<div id="button-next">
						<img src="http://joshlucy.info/photoalbum/playboy/icon/rtaro.png" />
					</div>
		</div></tr>

	</table>
</div>