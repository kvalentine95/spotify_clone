<?php
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
  $account = new Account($con);
  include("includes/handler/register-handler.php");
  include("includes/handler/login-handler.php");
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }
?>
<html>
<head>
  <title>Welcome to Slotify!</title>
  <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
  <link href="https://fonts.googleapis.com/css?family=Lobster|Open+Sans:400,700,800|Pacifico" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Dosis:400,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="assets/js/register.js"></script>
</head>
<body>
  <?php
    if(isset($_POST['registerButton'])) {
      echo '<script>
        $(document).ready(function(){
            $("#registerForm").show();
            $("#loginForm").hide();
            $("#inputContainer").css("margin-top","0px");
        });
      </script>';
    }
    else {
      echo '<script>
        $(document).ready(function(){
            $("#loginForm").show();
            $("#registerForm").hide();
            $("#inputContainer").css("margin-top","50px");
        });
      </script>';
    }
   ?>
  <div class="background">
    <div class="loginContainer">
      <div id="inputContainer">
        <form id="loginForm" action="register.php" method="POST">
          <h2>Login to your account</h2>
          <p>
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <label for ="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('loginUsername')?>" required/>
          </p>
          <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required/>
          </p>
          <button type="submit" name="loginButton">LOG IN</button>
          <div class="hasAccountText">
            <span id="hideLogin">Don't have an account yet? Sign up here.</span>
          </div>
        </form>
        <form id="registerForm" action="register.php" method="POST">
          <h2>Create your free account</h2>
          <p>
            <?php echo $account->getError(Constants::$usernameCharacters); ?>
            <?php echo $account->getError(Constants::$usernameTaken); ?>
            <label for ="username">Username</label>
            <input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="<?php getInputValue('username')?>"required/>
          </p>
          <p>
            <?php echo $account->getError(Constants::$firstNameCharacters) ?>
            <label for ="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstName')?>"required/>
          </p>
          <p>
            <?php echo $account->getError(Constants::$lastNameCharacters)?>
            <label for ="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="<?php getInputValue('username')?>" required/>
          </p>
          <p>
            <?php echo $account->getError(Constants::$lastNameCharacters) ?>
            <?php echo $account->getError(Constants::$emailInvalid) ?>
            <?php echo $account->getError(Constants::$emailTaken) ?>
            <label for ="email">Email</label>
            <input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" required value="<?php getInputValue('email')?>"/>
          </p>
          <p>
            <label for ="email2">Confirm Email</label>
            <input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="<?php getInputValue('email2')?>" required/>
          </p>
          <p>
            <?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
            <?php echo $account->getError(Constants::$passwordNotAlphanumeric) ?>
            <?php echo $account->getError(Constants::$passwordCharacters) ?>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" placeholder="Your password" required/>
          </p>
          <p>
            <label for="password2">Confirm password</label>
            <input id="password2" name="password2" type="password" placeholder="Your password" required/>
          </p>
          <button type="submit" name="registerButton">SIGN UP</button>
          <div class="hasAccountText">
            <span id="hideRegister">Already have an account? Log in here.</span>
          </div>
        </form>
      </div>
      <div id="loginText">
        <h1>Get great music, right now</h1>
        <ul>
          <li>Discover music you'll fall in love with</li>
          <li>Create your own playlists</li>
          <li>Follow artists to keep up to date</li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>
