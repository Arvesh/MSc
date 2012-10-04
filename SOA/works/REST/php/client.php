<?php 

$url = 'http://localhost:8080/JavaRestWebTrial/webresources/entities.tblstudent/';

$method = 'GET';

$headers = array(
		'Accept: application/json',
		'Content-Type: application/json'
	);



$handle = curl_init();


$request = !empty($_POST) ? $_POST : NULL;



$fname = 'testnew name from php';
$sname = 'test new surname from php';

if ($request != null) {

	switch ($request) {
		case array_key_exists('btnSelect', $request)==true:

			$url .= $request['txtSelect'];

			
			
			break;

		case array_key_exists('btnInsert', $request)==true:

			$method = 'POST';
			$fname = $request['txtFname'];
			$sname = $request['txtSname'];

			break;

		default:
			
			break;
	}
}


$data = json_encode(array(
		'studentFname' => $fname,
		'studentSname' => $sname
	));



switch($method)
{

case 'GET':

break;

case 'POST':
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
break;

case 'PUT':
curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
break;

case 'DELETE':
curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
break;
}

curl_setopt($handle, CURLOPT_URL, $url);
curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($handle);
/*$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);*/



$decoded = json_decode($response);

echo "<pre>";
	print_r($decoded);
echo "</pre>";

if ($decoded != null) {
echo 1;
	$convertToObject = !isset($decoded->tblStudent) ?  array($decoded): $decoded->tblStudent;
}


 ?>

	<?php if(!empty($convertToObject)): ?>

	<table border="1">
		<thead>
		<th>ID</th>
		<th>FIRST NAME</th>
		<th>SURNAME</th>
		</thead>

		<tbody>
			<?php foreach($convertToObject as $key=>$value): ?>
				<tr>
					<td><?php echo $value->studentId ?></td>
					<td><?php echo $value->studentFname ?></td>
					<td><?php echo $value->studentSname ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		
	</table>
	<?php endif; ?>

	<form action="" method="POST">
		<p>
			<label for="">ID</label>
			<input type="text" name="txtSelect">
			<input type="submit" name="btnSelect" value="Select">
		</p>

		<p>
			<p>
				<label for="">First name</label>
				<input type="text" name="txtFname">
			</p>
			<p>
				<label for="">Surname</label>
				<input type="text" name="txtSname">
			</p>
			
			<input type="submit" name="btnInsert" value="Insert">
		</p>
	</form>

