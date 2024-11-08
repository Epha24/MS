<?php

if(isset($_GET['program'])){

          if($_GET['program'] == "diploma"){ ?>
                          <option>Accounting and Finance</option>
						  <option>Human Resource Management</option>
						  <option>Secretarial Science and Office Management</option>
                          <option>Hardware and Networking Service</option>
                          <option>Database and Multimedia Administration</option>
                          <option>Animal Health</option>
                          <option>Hotel and Truism Operation</option>
                          <option>Textile and Garment Sector</option>
                          <option>Marketing Management</option>
                          <option>Library Management and Information System</option>
						  <option>Purchasing and Supply Chain Management</option>
           <?php }
           if($_GET['program'] == "degree"){ ?>
                          <option>BA in Accounting and Finance</option>
						  <option>BA in Management</option>
						  <option>BSc in Computer Science</option>
           <?php }
	       if($_GET['program'] == "masters"){ ?>
                          <option>MSc in Accounting and Finance</option>
						  <option>MBA in Business Administration</option>
						  <option>MA in Project Management</option>
           <?php }
           if($_GET['program'] == "distance"){ ?>
                          <option>BA in Accounting and Finance</option>
						  <option>BA in Management</option>
						  <option>BA in Economics</option>
                          <option>BA in Marketing Management</option>
                          <option>RED in EDPM</option>
           <?php }

     }             


?>