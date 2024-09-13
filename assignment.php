<!doctype html>
<form method="POST" action="assignment.php">
	<h1>CALCULATE</h1>
	<div class="mb-3">
        <label for="voltage" class="form-label">Voltage</label>
		<br/>
    	<input type="number" class="form-control" min="0" step="0.01" name='voltage' placeholder="">
		<br/>
		<label>Voltage (V)</label>
    </div>
	<br/>
	<div class="mb-3">
        <label for="current" class="form-label">Current</label>
		<br/>
    	<input type="number" class="form-control" min="0" step="0.01" name='current'>
		<br/>
		<label>Ampere (A)</label>
	</div>
	<br/>
	<div class="mb-3">
        <label for="rate" class="form-label">CURRENT RATE</label>
		<br/>
    	<input type="number" class="form-control" min="0" step="0.01" name='rate'>
		<br/>
		<label>sen/kWh</label>
	</div>
	<br/>
	<div class="mt-4">
        <button class="btn btn-success w-100" name="calculate" type="submit">calculate</button>
    </div>
</form>
<br/>
<?php
	if(isset($_POST['calculate']))
	{
	$voltage = $_POST['voltage'];
	$current = $_POST['current'];
	$rate = $_POST['rate'];
	
	$hour=0;
	$total=0.0;

	$power = $voltage*$current/1000;
	$energy = $power*$hour*1000;
	$new_rate = $rate/100;

	echo "POWER : ".$power."kW"."<br>"."RATE : RM".$new_rate."<br>";
	}
?>

<table class="table table-bordered">
	<thead>
		<tr align="center">
			<th>#</th>
			<th>Hour</th>
			<th>Energy (kWh)</th>
			<th>Total (RM)</th>
		</tr>
	</thead>
	<?php
		$i=0;
			while($i<24)
			{
		?>
	<tbody>
		<tr align="center">
			<td><?php echo ++$i; ?></td>
			<td><?php echo $i?></td>
			<td><?php echo $power*$i?></td>
			<?php
				$total = $power*$i*$new_rate;
				$new_total = number_format($total, 2);
			?>
			<td><?php echo $new_total?></td>
		</tr>
			<?php
			}?>
	</tbody>	
</table>
</html>