<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <?= $this->Html->css('/css/bootstrap/bootstrap.css') ?>
    <?= $this->Html->css('/font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('/css/animate.css') ?>
    <?= $this->Html->css('/css/magnific-popup.css') ?>
    <?= $this->Html->css('/flexslider/flexslider.css') ?>
    <?= $this->Html->css('/css/form-elements.css') ?>
    <?= $this->Html->css('/css/style.css') ?>
    <?= $this->Html->css('/css/media-queries.css') ?>

    <!-- JS -->
    <?= $this->Html->script('jquery-1.11.1.min') ?>
    <?= $this->Html->script('/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/js/bootstrap-hover-dropdown.min.js') ?>
    <?= $this->Html->script('/js/jquery.backstretch.min.js') ?>
    <?= $this->Html->script('/js/wow.min.js') ?>
    <?= $this->Html->script('/js/retina-1.1.0.min.js') ?>
    <?= $this->Html->script('/js/jquery.magnific-popup.min.js') ?>
    <?= $this->Html->script('/flexslider/jquery.flexslider.js') ?>
    <?= $this->Html->script('/js/masonry.pkgd.min.js') ?>
    <?= $this->Html->script('/js/jquery.ui.map.min.js') ?>

</head>

<body>
<div>
    <p align="center" style="background-color:#ccccff;color:black; padding: 10px; font-family: sans-serif; min-height: 35px; text-transform: uppercase; position: relative;">
        <i class="fa fa-envelope"></i>  <?=$footer[3]['content']?> &nbsp; &nbsp; | &nbsp; &nbsp;
        <i class="fa fa-phone"></i> <?=$footer[1]['content']?>
        <?= $this->Html->link(__('Help'), ['controller' => 'Pages', 'action' => 'help'], ['class'=>'btn btn-outline btn-primary mybutton','style'=>'width:60px;text-align: center;']) ?>
        <span style = 'position:absolute; right: 120px; top: 20px;'><em>Hi, </em><strong><?= $this->request->session()->read('Auth.User.first_name')." ".$this->request->session()->read('Auth.User.last_name') ?></strong></span>
        <?php
        if($this->request->session()->read('Auth.User')) {
            // user is logged in, show logout..user menu etc
            echo $this->Html->link('Logout', array('controller'=>'users', 'action'=>'logout'),['class'=>'btn btn-outline btn-primary','style'=>'position:absolute; right: 20px;']);
        } else {
            // the user is not logged in
            echo $this->Html->link( 'Login', array('controller'=>'users', 'action'=>'login'),['class'=>'btn btn-outline btn-primary','style'=>'position:absolute; right: 20px;']);
        }
        ?>
    </p>
</div>

<?= $this->Flash->render() ?>
<nav class="navbar" role="navigation">
    <div class="container col-sm-12">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a ><?= $this->Html->link('',['controller' => 'pages', 'action' => 'homepage'],['class'=>'navbar-brand']) ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?= $this->Html->link(' Home',['controller' => 'pages', 'action' => 'homepage']) ?>

                </li>
                <li>
                    <?= $this->Html->link(' Services',['controller' => 'pages', 'action' => 'visas']) ?>
                </li>
                <li>
                    <?= $this->Html->link(' About us',['controller' => 'pages', 'action'=>'aboutus']) ?>
                </li>
                <li>
                    <?= $this->Html->link(' Contact Us',['controller' => 'pages', 'action'=>'contactus']) ?>
                </li>
                <li>
                    <?= $this->Html->link(' Feedback',['controller' => 'pages', 'action'=>'feedbacks']) ?>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                        <?= $this->Html->tag('span',' Appointment') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left" role="menu">
                        <li><?= $this->Html->link('Book Appointment',['controller' => 'bookings', 'action'=>'add']) ?></li>
                        <li><?= $this->Html->link('Cancel Appointment',['controller' => 'bookings', 'action'=>'cancel']) ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000">
                        <?= $this->Html->tag('span','Staff Functions') ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-left" role="menu">

                        <li><?= $this->Html->link('User Logs',['controller' => 'logs', 'action'=>'index']) ?></li>
                        <li><?= $this->Html->link('Manage Feedbacks',['controller' => 'feedbacks', 'action'=>'index']) ?></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?= $this->fetch('content') ?>
</body>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 footer-box wow fadeInUp">
                <h4>Code of conduct</h4>
                <div class="footer-box-text">
                    <a href="<?=$footer[4]['content']?>" target="_blank">Click here to see Code of Conduct</a>
                </div>
                <h4>Privacy Policy</h4>
                <div class="footer-box-text">
                    <?= $this->Html->link(__('Click here to see Privacy Policy'), ['controller' => 'Pages', 'action' => 'privacy']) ?>
                </div>
            </div>

            <div class="col-sm-6 footer-box wow fadeInDown">
                <h4>Contact Us</h4>
                <div class="footer-box-text footer-box-text-contact">
                    <p><i class="fa fa-map-marker"></i> <?=$footer[0]['content']?></p>
                    <p><i class="fa fa-phone"></i></i> <?=$footer[1]['content']?></p>
                    <p><i class="fa fa-envelope"></i> </i> <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$footer[3]['content']?></a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 wow fadeIn">
                <div class="footer-border"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 footer-copyright wow fadeIn">
                <p>Vision Overseas 2016 - All rights reserved</p>
            </div>

        </div>
    </div>
</footer>
</html>