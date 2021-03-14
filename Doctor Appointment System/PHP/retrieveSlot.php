<?php
	include "../PHP/Connection.php";

	$data=stripcslashes(file_get_contents("php://input"));
	$data=json_decode($data,true);
	$dayname=$data['day'];
	$doc_id=$data['doc_id'];
	$date=$data['date'];
	
		$sql="SELECT Time,Capacity FROM doc_officehour where Day='$dayname' and doc_id='$doc_id' ";
		$slotsarray=array();
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
			$Capacity=$row['Capacity'];
			$time=$row['Time'];
			if(preg_match("/and/", $time))
			{
				
				$slot=explode("and", $time);
				for($i=0;$i<count($slot);$i++) {
					$sl=$slot[$i];
					$sql="SELECT appoint_id from appointments where doc_id='$doc_id' and appoint_date='$date' and appoint_slot='$sl' ";
					$result=mysqli_query($conn,$sql);
					if($result)
					{
						$row=mysqli_num_rows($result);
						
						if($Capacity>$row)
						{
							$sol=array("slot"=>$sl);
							array_push($slotsarray, $sol);
						}
						else
						{
							$sol=array("slot"=>"Slot Full");
							array_push($slotsarray, $sol);
						}
						
					}
					
				}
				
			}
			else
			{
				$slot=$time;
				$sol=array("slot"=>$slot);
				array_push($slotsarray, $sol);
				
			}
		
		}
		else
		{
			$sol=array("slot"=>"There is no slot");
			array_push($slotsarray, $sol);
		}
		echo json_encode($slotsarray);
	
	
?>