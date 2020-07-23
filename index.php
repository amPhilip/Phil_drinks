<?php

    //connect to a database
    $connect = mysqli_connect('localhost','phil','phil1234','mac_phil drinks');

    //check  for the connection
    if(!$connect){
        echo 'connection error:'. mysqli_connect_error();
    }

   //construct the query
    $sql = 'SELECT title, ingredients FROM drinks';

    //make the query
    $result = mysqli_query($connect, $sql);

    //fetch results from that query
    $drinks = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_free_result($result);

	// close connection
	mysqli_close($connect);

    //-----print_r($drinks);-----


?>
<!DOCTYPE html>
<html>

<?php include('templates/header.php')?>
    <h4 class='center grey-text'>Drinks!</h4>
    <div class="container">
		<div class="row">

			<?php foreach($drinks as $drink){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo htmlspecialchars($drink['title']); ?></h6>
							<ul class="grey-text">
								<?php foreach(explode(',', $drink['ingredients']) as $ing){ ?>
									<li><?php echo htmlspecialchars($ing); ?></li>
								<?php } ?>
							</ul>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="#">more details</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>
    
<?php include('templates/footer.php')?>

</html>