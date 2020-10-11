<?php 
include "database.php";
$db = new database();
$query = "SELECT * FROM images";
$read = $db->select($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- required meta tags -->
    <meta charset="utf-8">
    
    <meta name="description" content="Building modern responsive website with html5, css3, jQuery & bootstrap framework">
    <meta name="keywords" content="HTML5, CSS3, jQuery, Bootstrap, Web Design, Web Development, Responsive website, Modern website">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>Modern Responsive Website</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <!-- animate CSS -->
    <link rel="stylesheet" href="css/animate/animate.css">

    <!-- magnific-popup CSS -->
    <link rel="stylesheet" href="css/magnific-popup/magnific-popup.css">

    <!-- owl carousel CSS -->
    

    <!-- style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- responsive CSS -->
    


</head>

<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="65">

    
    <!-- Work -->
    <section id="work">
        <div class="content-box">
            <div class="content-title wow animated fadeInDown" data-wow-duration="1s" data-wow-delay=".5s">
                <h3> Our Work </h3>
                <div class="content-title-underline"></div>
            </div>
            <div class="container-fluid">
                <div class="row no-gutters wow animated fadeInUp"style="padding: 70px;" data-wow-duration="1s" data-wow-delay=".5s">
                <?php if ($read) { 
                while($row = $read->fetch_array())  { ?>
                    <div class="col-md-4 col-sm-4"style="padding-left: 10px;padding-right: 10px;padding-bottom: 15px;">
                        <div class="img-wrapper">
                            <a href="<?php echo 'img/work/'.$row['img'];?>" title="Work Description Goes Here">
                                <img src="<?php echo 'img/work/'.$row['img'];?>" class="img-responsive" alt="Work">
                            </a>                          
                        </div>                         
                    </div>                    
                <?php }  } ?> 
                </div>
            </div>
        </div>
        <!-- End Content Box -->
    </section>

    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- bootstrap JS -->
    <script src="js/bootstrap/bootstrap.min.js"></script>

    <!-- WOW JS -->
    <script src="js/wow/wow.min.js"></script>

    <!-- magnific-popup JS -->
    <script src="js/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- owl carousel JS -->
    

    <!-- counter -->
    

    <!-- easing -->
    


    <!-- custom JS -->
    <script src="js/custom.js"></script>
</body>



</html>