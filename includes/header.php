<?php
  include("includes/config.php");
  include("includes/classes/Artist.php");
  include("includes/classes/Album.php");
  include("includes/classes/Song.php");
  //session_destroy();
  if (isset($_SESSION['userLoggedIn'])) {
    $userLoggedIn = $_SESSION['userLoggedIn'];
  }
  else {
    header("Location: register.php");
  }
?>
<html>
<head>
  <title>Welcome to Slotify!</title>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600,700" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
  <script>
    var audioElement = new Audio();
    //audioElement.setTrack("assets/music/train.mp3");
    //audioElement.audio.play();
  </script>
  <div class="mainContainer">
    <div class="topContainer">
      <?php include("includes/navBarContainer.php") ?>
      <div id="mainViewContainer">
        <div id="mainContent">
