<?php
// checks to see if the data sent or serveback the html template
    /*if(isset($_GET['submit'])){
        echo $_GET['email'];
        echo $_GET['title'];
        echo $_GET['ingredients'];
    }*/
     /*if(isset($_POST['submit'])){
        echo $_POST['email'];
        echo $_POST['title'];
        echo $_POST['ingredients'];
    }*/
   /* if(isset($_POST['submit'])){
        //check email
        if(empty($_POST['email'])){
            echo 'Email required <br/>';
        }else
            echo htmlspecialchars($_POST['email']);
        //check title
        if(empty($_POST['title'])){
            echo 'Title required <br/>';
        }else
            echo htmlspecialchars($_POST['title']);
        //check ingredients
        if(empty($_POST['ingredients'])){
            echo 'Ingredients required <br/>';
        }else
            echo htmlspecialchars($_POST['ingredients']);
    }//end of POST check*/
    $email = $title = $ingredients ='';

    $error = array('email'=>'', 'title'=>'','ingredients'=>'');
    
    if(isset($_POST['submit'])){
        //check email
        if(empty($_POST['email'])){
            $error['email'] = 'Email required <br/>';
        }else
            $email =$_POST['email'];
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $error['email'] = 'email must be valid';
            }
        //check title
        if(empty($_POST['title'])){
			$error['title'] = 'A title is required <br />';
		} else{
			$title = $_POST['title'];
			if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
				$error ['title'] = 'Title must not contain special chars';
			}
		}

		// check ingredients
		if(empty($_POST['ingredients'])){
			$error['ingredients'] = 'At least one ingredient is required <br />';
		} else{
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$error['ingredients'] = 'Ingredients are separated using a comma';
			}
		}

    }//end of POST check


?>
<!DOCTYPE html>
<html>

<?php include('templates/header.php')?>

<section class='container grey-text'>
    <h4 class='center'>Add your Drink</h4>
    <form class ='white'action=""method='POST'>
        <label>Email ?:</label>
        <input type='text' name='email' value='<?php echo $email?>'>
        <div class="red-text"><?php echo $error['email']; ?></div>
        <label>Drink Name:</label>
        <input type='text' name='title'value='<?php echo $title?>'>
        <div class="red-text"><?php echo $error['title']; ?></div>
        <label>Ingredients(Comma Separated):</label>
        <input type='text' name='ingredients'value='<?php echo $ingredients?>'>
        <div class="red-text"><?php echo $error['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name='submit' value='submit' class='btn brand z-depth-0'>
        </div>
    </form>

</section>

<?php include('templates/footer.php')?>

</html>