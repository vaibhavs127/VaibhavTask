<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Homepage</title>
       <link rel="stylesheet" href="../css/homepage.css" type="text/css"/>
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body style="background-color:#727F88">
            <form action="../../index.html">
              <button class="mt-5" type="submit" name="upload" id="submit">New Item Registration</button>
              <h1 class="mt-3" style="color:white">Latest 6 Entries</h1>
          </form>
        
        <?php
            $db = mysqli_connect("localhost", "root", "", "test");
            $result = mysqli_query($db, "SELECT * FROM user ORDER BY id DESC LIMIT 6"); 
            if($result-> num_rows > 0){
            while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
        ?>
        
        <div class="main">
            <ul class="cards" id="hide">
                <li class="cards_item">
                    <div class="card">
                        <div class="card_image"><img src="<?php echo '../img/'.$row['img'];?>"></div>
                            <div class="card_content">
                                <h2 class="card_title"><?php echo $row['title']; ?></h2>
                                <p class="card_text"><?php echo $row['description']; ?></p>
                            </div>
                    </div>
                </li>
            </ul>
        </div>
        <?php }  }?> 

        <button type="submit" id="button">Get All Users</button>

        <div id="users"></div>

        <script src="../js/main.js"></script>
        
    </body>
</html>