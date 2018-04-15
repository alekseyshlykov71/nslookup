<?php 
	set_time_limit(-1);
	$sites=explode("\n",file_get_contents('sites.txt');
	$sites=explode(',',$sites);

	$csv='';
	for ($i=0;$i<count($sites)-1;$i++) {
		$site=explode(' ',$sites[$i]);
		unset($out);
		exec ("nslookup ".$site[0]." 8.8.4.4", $out);
		$csv.=$site[0].';';
		for ($j=0;$j<count($out)-1;$j++) {
			$csv.=$out[$j].';';
		}
		$csv.="\n";
	}
	file_put_contents('ns.csv',$csv);
	echo "Open ns.csv\n";
?>