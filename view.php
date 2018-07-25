<?php require_once 'includes/Schools.class.php';
$choice=new Schools(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="James O.">
    
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <!-- Bootstrap core CSS -->
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    

  </head>

    	
<body>
<div class="custom navbar nav navbar-inverse navbar-fixed-top magictime slideUpReturn" role="navigation">
      <div class="container">
        <div class="navbar-header ">Nigerian Institutions


</div><table class="table-responsive" ><tr><td>
<select  id="states" class="select state-select" >
<option selected disabled>State</option>
<?php 
$state=$choice->get_all_states();
$unique='';
foreach($state as $row): 
if($row['state'] !='' and $unique !=$row['state']):?>
<option value="<?php echo  $row['id']; ?>"><?php echo $row['state']; ?></option>

<?php 
endif;
$unique=$row['state'];
endforeach; ?>
</select>
</td><td>
<select id="types" class="select type-select" >
<option selected disabled>Type</option>
<?php $type=$choice->get_all_types();
$unique='';
foreach($type as $row): 
if($row['type'] != $unique):
switch($row['type']){
	case 'ce':
	$type='Colleges Of Education';
	break;
		case 'fu':
	$type='Federal Universities';
	break;
		case 'su':
	$type='State Universities';
	break;
		case 'sem':
	$type='Semimary Schools';
	break;
		case 'ue':	
	$type='Universities Of Education';
	break;
		case 'fi':
	$type='Film Institutes';
	break;
		case 'ct':
	$type='Colleges Of Technology';
	break;
		case 'tc':
	$type='Television Colleges';
	break;
		case 'pu':
	$type='Private Universities';
	break;
	
	case 'pl':
	$type='Polytechniques';
	break;
	default:
	$type='others';
	break; 
}  ?>
<option value="<?php echo $row['id']; ?>"><?php echo $type; ?></option>

<?php 
endif;
$unique=$row['type'];
endforeach; ?>
</select>
</td><td>
<form action="index.php" name="search-form" id="search-form" method="post">
<input name="search" class="navbar-input" type="text" />
<input type="submit" value="search" class="btn btn-primary"/>
</form>
</td></tr></table>
</div></div>
<br><br><br><br>
<div class="container-fluid">
<div class="view-tables">
<table border="2" class="table table-responsive view-table">
<tr> <th>Abbr. </th><th>Name </th><th>Type </th><th>State </th><th> Address </th><th> Contact</th><th>Website </th><th>Affilliate(s)</th></tr>
<?php foreach($school as $row): ?>
<tr> <td><?php echo $row['abbr']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php
switch($row['type']){
	case 'ce':
	$type='College Of Education';
	break;
		case 'fu':
	$type='Federal University';
	break;
		case 'su':
	$type='State University';
	break;
		case 'sem':
	$type='Semimary School';
	break;
		case 'ue':
		case 'eu':
	$type='University Of Education';
	break;
		case 'fi':
	$type='Film Institute';
	break;
		case 'ct':
	$type='College Of Technology';
	break;
		case 'tc':
	$type='Television College';
	break;
	case 'pu':
	$type='Private University';
	break;
			case 'pl':
	$type='Polytechnique';
	break;
	default:
	$type='Other';
	break;
}

 echo $type; ?></td>
<td><?php echo $row['state']; ?></td>
<td><?php echo $row['address'].' '.$row['pmb']; ?></td>
<td><?php echo $row['email'].' '.$row['tel']; ?></td>
<td><?php echo $row['website']; ?></td>
<td><?php echo $row['affil']; ?></td>
</tr>

<? endforeach; ?>
</table>
</div>
</div>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
