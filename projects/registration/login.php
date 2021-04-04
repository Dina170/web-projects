<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
	.header {
    width: 30%;
    margin: 30px auto 0px;
    text-align: center;
    color: white;
    background: #a81164;
    border: 1px solid #a81164;
    border-bottom: none;
    border-radius: 10px 10px 0px 0px;
    padding: 20px;

}
form {
	width: 30%;
    margin: 0px auto;
    padding: 20px;
    border: 1px solid #B0C4DE;
    background: white;
    border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
label {
	display: block;
	text-align: left;
	margin: 3px;
}
input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
    padding: 10px;
    color: white;
    background: #a81164;
    border: none;
    font-size: 15px;
    border-radius: 5px;
}
.error {
    width: 92%;
    margin: 0px auto;
    padding: 10px;
    border: 1px solid #a94442;
    color: #a94442;
    background: #f2dede;
    border-radius: 5px;
    text-align: left;
}
</style>
<body>
	<div class="header" >
		<h2>Login</h2>
	</div>
	<form method="post" action="login.php">
        <?php include('errors.php'); ?>
        <div class="input_group">
        	<label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
        </div>       
        
        <div class="input_group">
        	<label>Password</label>
            <input type="password" name="password">
        
        </div>
        <p>
    	Not yet a member? <a href="first.php">Sign up</a>
    	</p>
        <button class="btn" type="login" name="login">Login</button>
    </form>
    
</body>
</html> 