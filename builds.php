<?php
	// get the app that was just built
	$requested_app = $_GET["app"];
	
	// do only try to process the request if the app was set
	if (isset($requested_app)) {
		// get the storage
		$file = file_get_contents('./builds.txt', FILE_USE_INCLUDE_PATH);
		$json = json_decode($file, true);
		
		// use this bool to determine wether or not the requested app was available
		$found = false;
	
		// find the app and update it's build number
		for ($i = 0, $length = count($json['builds']); $i < $length; ++$i) {
			// check if the app at index $i is the one we want		
			if ($json['builds'][$i]['app'] == $requested_app) {
				// if so remember that we found it
				$found = true;
				
				// update the build number
				$json['builds'][$i]['build'] = $json['builds'][$i]['build'] + 1;
			
				// print the new build number
				print_r($json['builds'][$i]['build']);
			}
		}
	
		// if the app was not in store yet add it
		if ($found == false) {
			// get the new app's index
			$count = count($json['builds']);
			
			// add it
			$json['builds'][$count]['app'] = $requested_app;
			$json['builds'][$count]['build'] = 1;
					
			// print the new build number
			print_r($json['builds'][$count]['build']);
		}
		
		// write the data back to the text file
		file_put_contents('./builds.txt', json_encode($json));
	} else {
		// tell the user that the app was not set
		echo 'app not set' . '<br />';
	}
?>
