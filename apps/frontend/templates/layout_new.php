<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/new_layout/css/style.css">
    <link rel="stylesheet" href="/new_layout/css/my.css">
    <script src="https://kit.fontawesome.com/29dceacc74.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
</head>
<body>

<div class="wrapper">
    <div class="content">
        <header class="p-3">
            <div class="container">
                <nav class="header-nav d-flex justify-content-between">
                    <div class="nav-logo">
                        <a href="#" target="_blank"><img src="/new_layout/images/icon-image.png" alt=""></a>
                    </div>
                    <div class="nav-navigation d-flex align-items-center">
                        <ul class="d-flex m-0">
                            <li><a class="nav-link mr-4 pb-2" href="#">Take a quizz</a></li>
                            <li><a class="nav-link pb-2" href="#">Log in</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <?php echo $sf_content; ?>

    </div>
    <footer class="p-5">
        <div class="container">
            <div class="container-fluid footer-container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 d-flex align-items-center">
                        <div class="nav-brand">
                            <a href="http://promo.quizzine.org/" target="_blank"><img src="/new_layout/images/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h4>Contact me</h4>
                        <div class="email_block d-flex align-items-center">
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:marina.raduk@gmail.com">marina.raduk@gmail.com</a>
                        </div>

                        <a href="mailto:marina.raduk@gmail.com"><i class="fas fa-phone"></i>+375 33 364 82 28</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


</body>
</html>
