<?php

$no = $_GET['no']; 
$no = filter_var ( $no, FILTER_SANITIZE_STRING);

$alma_analytics_result_array = simplexml_load_file($no.'_books.xml');

$rowset = $alma_analytics_result_array->QueryResult->ResultXml->rowset;

/* build parameter for each value in the analytics results */

$i=0;
?>

	<head>

		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.css">
		<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10-dev/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/28e7751dbec/integration/bootstrap/3/dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8">

			$(document).ready(function() {

				$('#useStats').dataTable({
				    
				    "aaSorting": [[ 0, "desc" ]],
				    "iDisplayLength": 100,
				    });
			} );

		</script>

	</head>
<title>New Books at SDSU</title>	
		<body>
<div class="container">

<table id="useStats" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Date Added</th>
      <th>Title (Link)</th>
      <th>Call Number</th>
      <th>Location</th>
    </tr>
  </thead>
  <tbody>

<?php
foreach ($rowset->Row as $row_number){
    
      echo "<tr>";
      $col5_name[$i] = $row_number->Column5->__toString();
      echo '<td>';
      echo $col5_name[$i];
      echo '</td>';
      echo '<td>';
      echo '<img src="https://books.google.com/books?vid=OCLC:';
      $col8_name[$i] = $row_number->Column8->__toString();
      $imageoclc[$i] = str_replace('(OCoLC)', '', $col8_name[$i]);
      echo $imageoclc[$i];
      echo '&printsec=frontcover&img=1&zoom=1"></img>&nbsp;&nbsp;'; 
      echo '<div><h2>';
      echo '<a href="https://sdsu-primo.hosted.exlibrisgroup.com/primo-explore/search?query=any,contains,';
      $col1_name[$i] = $row_number->Column1->__toString();
      echo $col1_name[$i];
      echo '&context=L&vid=01CALS_SDL&search_scope=EVERYTHING&tab=everything&lang=en_US" target="_blank">';
      $col2_name[$i] = $row_number->Column2->__toString();
      echo $col2_name[$i];
      echo '</a></h2></div></td>';
      $col4_name[$i] = $row_number->Column4->__toString();
      echo '<td>';
      echo $col4_name[$i];
      echo '</td>';
      echo '<td>';
      $col7_name[$i] = $row_number->Column7->__toString();
      echo $col7_name[$i];
      echo '</td>';
      echo '</tr>';
      $i++;

}

?>


  </tbody>
</table>
		</div>



<script type="text/javascript">

	// For demo to fit into DataTables site builder...

	$('#useStats')

		.removeClass( 'display' )

		.addClass('table table-striped table-bordered');

</script>

	</body>