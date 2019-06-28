<body style="background-color: yellow; height: 100%; margin-top: 3%; margin-right: 5%; margin-left: 5%;">
Hello This is sign in
<?php echo $_POST['email']; ?>
<br>
<?php echo $_POST['password'] ?>
<br>
<?php if(isset($_POST['char']))
{
	echo "No bot";
}
else
{
 echo "Bot";
} ?>
<br>
<a href="<?php echo base_url('login') ?>">Back to login</a>


