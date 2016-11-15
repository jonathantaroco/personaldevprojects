<?php
	// connect
	$m = new MongoClient();
	// select a database
	$db = $m->scrapy;
	// select a collection (analogous to a relational database's table)
	$collection = $db->my_items; 

	$filter = array('link_noticia' => new MongoRegex('/.basquete./i')); 
	$cursor = $collection->find($filter);

	foreach ($cursor as $result) {
		echo $result['link_noticia'];
	}
?>