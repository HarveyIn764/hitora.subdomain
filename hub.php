<?php
include("header.php");
if (!($user -> hasMembership($odb)))
{
    header('location: ../store.php');
}

$plansql = $odb -> prepare("SELECT `users`.`expire`, `plans`.`name`, `plans`.`concurrents`, `plans`.`mbt` FROM `users`, `plans` WHERE `plans`.`ID` = `users`.`membership` AND `users`.`ID` = :id");
$plansql -> execute(array(":id" => $_SESSION['ID']));
$rowxd = $plansql -> fetch(); 
$date = date("m/d/Y", $rowxd['expire']);
if (!$user->hasMembership($odb))
{
$rowxd['mbt'] = 0;
$rowxd['concurrents'] = 0;
$rowxd['name'] = 'No membership';
$date = '0';
} 
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<script>
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						eval(document.getElementById("FuseThings").innerHTML);
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=attacks",true);
					xmlhttp.send();

					function start()
					{
					launch.disabled = true;
					var host=$('#host').val();
					var port=$('#port').val();
					var time=$('#time').val();
					var method=$('#method').val();
					document.getElementById("div").style.display="none"; 
					document.getElementById("image").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						launch.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="inline";
						if (xmlhttp.responseText.search("success") != -1)
						{
						attacks();
						window.setInterval(ping(host),10000);
						}
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=start" + "&host=" + host + "&port=" + port + "&time=" + time + "&method=" + method,true);
					xmlhttp.send();
					}			

					function renew(id)
					{
					rere.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						rere.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="inline";
						if (xmlhttp.responseText.search("success") != -1)
						{
						attacks();
						window.setInterval(ping(host),10000);
						}
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=renew" + "&id=" + id,true);
					xmlhttp.send();
					}

					function stop(id)
					{
					st.disabled = true;
					document.getElementById("div").style.display="none";
					document.getElementById("image").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						st.disabled = false;
						document.getElementById("div").innerHTML=xmlhttp.responseText;
						document.getElementById("image").style.display="none";
						document.getElementById("div").style.display="inline";
						if (xmlhttp.responseText.search("success") != -1)
						{
						attacks();
						window.setInterval(ping(host),10000);
						}
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=stop" + "&id=" + id,true);
					xmlhttp.send();
					}

					function attacks()
					{
					document.getElementById("attacksdiv").style.display="none";
					document.getElementById("attacksimage").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						document.getElementById("attacksimage").style.display="none";
						document.getElementById("attacksdiv").style.display="inline-block";
						document.getElementById("attacksdiv").style.width="100%";
						eval(document.getElementById("FuseThings").innerHTML);
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=attacks",true);
					xmlhttp.send();
					}

					function adminattacks()
					{
					document.getElementById("attacksdiv").style.display="none";
					document.getElementById("attacksimage").style.display="inline"; 
					var xmlhttp;
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						document.getElementById("attacksdiv").innerHTML=xmlhttp.responseText;
						document.getElementById("attacksimage").style.display="none";
						document.getElementById("attacksdiv").style.display="inline-block";
						document.getElementById("attacksdiv").style.width="100%";
						eval(document.getElementById("FuseThings").innerHTML);
						}
					  }
					xmlhttp.open("GET","Backend/hub.php?type=adminattacks",true);
					xmlhttp.send();
					}
					</script>
 <div class="lime-container">
            <div class="lime-body">
                <div class="container">
                    
			  <nav class="page-breadcrumb">
					 <div class="row">
                       <div class="col-md-12">
						           <div class="alert alert-fill-primary" role="alert">
								          <?php
											if (!$user->hasMembership($odb))
											{
										echo ' <div class="content-body">
										<div class="col-xl-123 col-lg-123 col-md-123 col-sm-123 col-123 "> 
										<div class="alert alert-warning"></i><div class="alert-content"><span class="alert-title">WARNING: It seems like you do not have a current (Plan).</div></div>
					 <div id="attackalert" style="display:none"></div>';
											}									
											?>
											<img id="image" class="spinner-border spinner-border-sm" role="status"style="display:none"/>

											
      </div>
   </div>	
</nav>
    <?php
                     $SQL = $odb -> query("SELECT COUNT(*) FROM `logs` WHERE `user` = '" . $_SESSION['username'] . "'");
                     $total_my_attacks = intval($SQL->fetchColumn(0));
                     
                     $SQL = $odb -> prepare("SELECT COUNT(*) FROM `logs` WHERE `date` > :date AND `user` = :username"); 
                     $SQL -> execute(array(":date" => $onedayago, ":username" => $_SESSION['username'])); 
                     $my_attacks_today = $SQL->fetchColumn(0);	

                     $SQL = $odb -> query("SELECT COUNT(*) FROM `logs` WHERE `time` + `date` > UNIX_TIMESTAMP() AND `stopped` = 0 AND `user` = '" . $_SESSION['username'] . "'");
                     $my_running_attacks = intval($SQL->fetchColumn(0));

                     ?>
                              <div class="row">
                        <div class="col-md-12">
                            <div class="card stat-card">
                                <div class="card-body">
                                    <h5 class="card-title">My Running Attacks</h5>
                                    <h2 class="float-left"><?php echo $my_running_attacks; ?>/<?php echo $rowxd['concurrents']; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
					   						<div id="divall" style="display:inline"></div>
						<div id="div" style="display:inline"></div>
    <div class="row flex-grow">
      <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
									<div class="form-group">
                  <br> </br>
									<label class="col-md-3 control-label">Target</label>
									<div class="col-md-12">
									<input type="text" id="host" placeholder="0.0.0.0" class="form-control">
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label">Port</label>
									<div class="col-md-12">
									<input  id="port" placeholder="80" class="form-control">
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label">Time</label>
									<div class="col-md-12">
									<input type="text" placeholder="30" id="time" class="form-control">
									</div>
									</div>
									<div class="form-group">
									<label class="col-md-3 control-label">Method</label>
									<div class="col-md-12">
									<select class="form-control" id="method">

									<optgroup label="Layer4 Methods" style="color:#037AFB";>
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'amp' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									<optgroup label="Layer7 Methods" style="color:#FF6600";>
									<?php
									$SQLGetLogs = $odb->query("SELECT * FROM `methods` WHERE `type` = 'raw' ORDER BY `id` ASC");
									while ($getInfo = $SQLGetLogs->fetch(PDO::FETCH_ASSOC)) {
										$name     = $getInfo['name'];
										$fullname = $getInfo['fullname'];
										echo '<option value="' . $name . '">' . $fullname . '</option>';
									}
									?>
									</optgroup>
									}
									?>
									</optgroup>  
                                             
									</select>
									</div>
									</div>
                <div class="form-group form-actions">
             <div class="col-md-12">
             <button type="button" id="launch" onclick="start()"  class="btn btn-block btn-effect-ripple btn-sm btn-primary" >Launch Attack<span class="las la-wifi" role="status" aria-hidden="true"></span></button>
                 </div>
				   </div>
				    </div>
					 </div>
	               <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                 <div>
				</div>
				<div style="position: relative; width: auto" class="slimScrollDiv">
			   <div id="attacksdiv" style="display:inline-block;width:100%"></div>										
			    </div>
				  </div>
                    </div>
                       </div>
					    </div>			   
</body>
</html>