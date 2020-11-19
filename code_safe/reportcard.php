<div>
<div style="background:; margin-top:0px;"><marquee direction="right">every child is special</marquee></div>
<div style="margin-top:62px; margin-bottom:px;"><center><img src="ii.png" width="140"/></center></div><br /><br />
<div id="footer" style="margin:0px; width:100%; background:#333; height:150px;">
<center><div style="">developed by suman(sulaiman saleh maidoya) contact: 08104343917, 09043835356</div></center>
<center><img src="q.png"  width="100px" /></center>
</div>
<style type="text/css">
	#footer{
margin-top:px; 
text-transform:capitalize; 
font-size:18px;
font-family:Tahoma;
color:white;
}
 marquee{
  font-family: tahoma;
  font-size: 35px;
  color:;
 }
 body{
 margin: 0px;
 text-transform: capitalize;
 }
</style>
mysql_connect("localhost","root");
mysql_select_db("marker");
$check=mysql_query("select * from large ");
if(mysql_num_rows($check)>0){
while($rows=mysql_num_rows($check)){
$eng=$rows["eng1"]+$rows["eng2"]+$rows["eng3"]+$rows["exameng"];
$math=$rows["math1"]+$rows["math2"]+$rows["math3"]+$rows["exammath"];
$sci=$rows["sci1"]+$rows["sci2"]+$rows["sci3"]+$rows["examsci"];
$ss=$rows["ss1"]+$rows["ss2"]+$rows["ss3"]+$rows["examss"];
$hau=$rows["hau1"]+$rows["hau2"]+$rows["hau3"]+$rows["examhau"];
$rel=$rows["rel1"]+$rows["rel2"]+$rows["rel3"]+$rows["examrel"];
$wri=$rows["wri1"]+$rows["wri2"]+$rows["wri3"]+$rows["examwri"];
$art=$rows["art1"]+$rows["art2"]+$rows["art3"]+$rows["examart"];
$agric=$rows["agric1"]+$rows["agric2"]+$rows["agric3"]+$rows["examagric"];
$hedu=$rows["hedu1"]+$rows["hedu2"]+$rows["hedu3"]+$rows["examhedu"];
$comp=$rows["comp1"]+$rows["comp2"]+$rows["comp3"]+$rows["examcomp"];
$hecon=$rows["hecon1"]+$rows["hecon2"]+$rows["hecon3"]+$rows["examhecon"];
echo"
<center>
<div class='holder'>
	<div class='holder_sch'><b class='schoolname'>yolonguruza nursery and primary school</b>
     <br>(motto: education never late)<br>
     GOMBE L.E.A<br>
     <font>RESULT SHEET</font>
	</div>
</div></center>
<center>
<div id='detail'>
  <ul>
 <li>class:</li>
 <li>year:</li>
 <li>term:</li>
 <li>position: 1 out of 65</li>
  </ul>
  <div id='pic'>
  	<img src='pic.png' style='float: right;'>
    <br>
    <font style='float: right; text-transform: uppercase;'>sulaiman saleh yahaya</font>
  </div></div></center>
</div>
<table border='1px' align='center' width='px' class='view' cellpadding='5'>
<tr><th>s/n</th><th id='sub'>subject</th><th>1st_CA</th><th>2nd_CA</th><th>3rd_CA</th><th>exam</th><th>total</th><th>grade</th></tr>
<tr><td>1</td><td>english language</td><td>'".$rows["eng1"]."'</td><td>'".$rows["eng2"]."'</td><td>'".$rows["eng3"]."'</td><td>'".$rows["exmaeng"]."'</td><td>'".$eng."'</td><td>a</td></tr>
<tr><td>2</td><td>mathematics</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>3</td><td>science</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>4</td><td>social studies</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>5</td><td>hausa language</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>6</td><td>religion</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>7</td><td>writing</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>8</td><td>art</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>9</td><td>agric science</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>10</td><td>health education</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>11</td><td>computer</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td>12</td><td>home economics</td><td>10</td><td>10</td><td>10</td><td>70</td><td>100</td><td>a</td></tr>
<tr><td></td><td>total</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
</table>
<center><div class='gh'>suman</div></center>

";}
