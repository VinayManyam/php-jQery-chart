<?php
 if($_POST['ndata']=='reports'){
 dataant();
   }
 if($_POST['ndata']=='reports1'){
 dataant1();
   }
function dataant1 (){
$data = file_get_contents("hdata");
$handle = fopen("hdata", "r");
$col=array();
if ($handle) {
    while (($line = fgets($handle)) !== false) {
       
		$str_arr = explode ("|", $line); 
		$data=array();
		$data1=array();
		$data=json_decode($str_arr[1]);
		$ndata = (array) $data;
		#print_r($ndata['data'][0]->time);
		$arr=array();
		$nc=0;
		foreach ($ndata['data']  as $i) {
		$ntime=$i->time;
		$nopen=$i->open;
		$nclose=$i->close;
		$ntime=substr_replace($ntime ,"",-3);
		
		if(date('H:i:s', $ntime) == '05:00:00'){
					$arr[date('m/d', $ntime)]=$nopen;
		
		#echo date('m/d/Y H:i:s', $ntime).",$nopen,$nclose";	

		}
		
		
		}
		$key = array();
		$key = array_keys($arr);
		unset($arr[$key[0]]);
		$data1[]=$str_arr[0];
		$data1[]=$arr;
		$col[]=$data1;
			
	}
    fclose($handle);
} else {
    // error opening the file.
} 
echo json_encode($col);

}



function dataant (){
$data = file_get_contents("hdata");
$handle = fopen("hdata", "r");
$col=array();
if ($handle) {
    while (($line = fgets($handle)) !== false) {
       
		$str_arr = explode ("|", $line); 
		$data=array();
		$data1=array();
		$data=json_decode($str_arr[1]);
		$ndata = (array) $data;
		#print_r($ndata['data'][0]->time);
		$arr=array();
		$nc=0;
		foreach ($ndata['data']  as $i) {
		$ntime=$i->time;
		$nopen=$i->open;
		$nclose=$i->close;
		$ntime=substr_replace($ntime ,"",-3);
		$yday=$i->close;
		if(date('H:i:s', $ntime) == '05:00:00'){
					$arr[date('m/d', $ntime)]=round(($nopen-$nc)*100/$nopen,2);
					$nc=$nopen;
		#echo date('m/d/Y H:i:s', $ntime).",$nopen,$nclose";	

		}
		
		
		}
		$key = array();
		$key = array_keys($arr);
		unset($arr[$key[0]]);
		$data1[]=$str_arr[0];
		$data1[]=$arr;
		$col[]=$data1;
			
	}
    fclose($handle);
} else {
    // error opening the file.
} 
echo json_encode($col);

}


?>