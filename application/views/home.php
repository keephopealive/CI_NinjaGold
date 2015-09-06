<html lang="en">
<head>
	<title>NinjaGold!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<style type="text/css">
	.fluid-container{
		margin-top: 15%;
		border: 1px solid black;
	}
	.center{
		text-align: center;
		margin: 5 auto;
	}
	.boxed{
		border: 1px solid black;
		padding: 5px;
		margin: 0 auto;
		text-align: center;
	}
	.left{
		text-align: left;
		display: inline-block;
	}
	.scrolling{
		max-height: 400px;
		overflow: scroll;
	}
	</style>
</head>
<body>
	<div class="fluid-container">
		<div class="row center">
			<div class="col-md-12 left">
				<h4 class="left">Your Gold:</h4> <input value="<?= $totalGold ?>" name="total_gold" class="left">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3 boxed">
				<h2>Farm</h2>
				<h5>(earns 10-20 gold)</h5>
				<form method="post" action="/submit_form">
					<input type="hidden" name="building" value="farm">
					<input type="submit" class="btn btn-warning" value="Find Gold!">
				</form>
				</div>
			<div class="col-sm-3 boxed">
				<h2>Cave</h2>
				<h5>(earns 5-10 gold)</h5>
				<form method="post" action="/submit_form">
					<input type="hidden" name="building" value="cave">
					<input type="submit" class="btn btn-warning" value="Find Gold!">
				</form>
			</div>
			<div class="col-sm-3 boxed">
				<h2>House</h2>
				<h5>(earns 2-5 gold)</h5>
				<form method="post" action="/submit_form">
					<input type="hidden" name="building" value="house">
					<input type="submit" class="btn btn-warning" value="Find Gold!">
				</form>
			</div>
			<div class="col-sm-3 boxed">
				<h2>Casino</h2>
				<h5>(earns/takes 0-50 gold)</h5>
				<form method="post" action="/submit_form">
					<input type="hidden" name="building" value="casino">
					<input type="submit" class="btn btn-warning" value="Find Gold!">
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 center">
				<form method="post" action="/clearAll">
					<button type="submit" class="btn btn-danger">Clear All!</button>
				</form>
			</div>
			<div class="scrolling col-md-8 center left boxed">
				<?= $totalMessage ?>
			</div>
		</div>
	</div>
</body>
</html>