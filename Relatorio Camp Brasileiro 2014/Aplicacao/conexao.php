<?php

         // connect
         $m = new MongoClient();

         // select a database
         $db = $m->scrapy;

         // select a collection (analogous to a relational database's table)
         $collection = $db->items; 
                           
         ?>
