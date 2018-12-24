<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

            <link rel=StyleSheet href="css/cssApp.css" type="text/css" media=screen>
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700" rel="stylesheet">

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

            <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
            <script src= "source/plugings/slider/jquery.fittext.js" ></script>
            <script src="source/plugings/slider/unslider.min.js"></script>
            <script src="js/jsApp.js" type="text/javascript"></script>
            
            <title> HOME</title>
        </head>
            <body>


                <div class="contPagina w-100 p-3 h-100">
                    <!--Cabecera-->
                    <?php include './cabecera.php'; ?>

                    <!--slider-->
                    <div class="banner ">
                        <ul>
                            <li> Tell me and I forget, show me and I remember,<br> Involve me and I learn.</li>
                            <li>"The wonderful thing about learning something,<br> is that nobody can take it from us "B. B. King</li>
                            <li>There is no better example<br> than the own mistake</li>
                            <li>Knowledge is power.<br> Arm yourself!</li>
                        </ul>
                    </div>

                    <?php include 'pie.php'; ?>
                    <!--Pie-->

                </div>
            </body>
    </html>
