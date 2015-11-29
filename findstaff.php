<?php
$schools = json_decode(file_get_contents('http://mobile.nottingham.ac.uk/hack/data/timetabling/2013/staff'))->Staff->School;
//var_dump($schools);
$searchstr=$_GET["name"];
foreach ($schools as $school) {
	$schoolnameprinted = false;
	if (is_array($school->Person)) {
		foreach ($school->Person as $staff) {
			if (stripos($staff->Name, $searchstr) !== false) {
				if (!$schoolnameprinted) {
					echo '<p class="schoolname">'.$school->Name."</p>\n";
					$schoolnameprinted = true;
				}
				echo '<a href="staff.php?id='.$staff->Guid.'" class="personname">'.$staff->Name . "</a>\n";	
			}			
		}
	} else {
		if (stripos($school->Person->Name, $searchstr != -1)) {
			echo '<p class="schoolname">'.$school->Name."</p>\n";
			echo '<a href="staff.php?id='.$school->Person->Guid.'" class="personname">'.$school->Person->Name . "</a>\n";
		}
	}

}//*/
?>