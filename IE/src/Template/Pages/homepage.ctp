<body>
<!-- Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for($counter = 0;$counter<sizeof($sliders);$counter++){ ?>
            <?php if ($counter == 0): ?>
                  <li data-target="#myCarousel" data-slide-to="0" class="active">
            <?php else: ?>
                <li data-target="#myCarousel" data-slide-to="<?=$counter?>">
            <?php endif ?>
        <?php }?>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php for($counter = 0;$counter<sizeof($sliders);$counter++){ ?>
            <?php if ($counter == 0): ?>
                <div class="item active">
                    <?= $this->Html->image($sliders[$counter]['name'])?>
                </div>
            <?php else: ?>
                <div class="item">
                    <?= $this->Html->image($sliders[$counter]['name'])?>
                </div>
            <?php endif ?>
        <?php }?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- Presentation -->
<div class="presentation-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 wow fadeInLeftBig">
                <h1 style="font-family: sans-serif;"><?=$homepage[0]['content']?></h1>
                <p style="font-family: sans-serif;"><?=$homepage[1]['content']?></p>
            </div>
        </div>
    </div>
</div>

<!-- Services -->
<div class="services-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="service wow fadeInUp">
                    <div class="service-icon"><i class="fa fa-eye"></i></div>
                    <h3><?=$homepage[2]['content']?></h3>
                    <p><?=$homepage[5]['content']?></p>
<!--                    <a class="big-link-1" href="aboutus.html">Read more</a>-->
                        <a><?= $this->Html->link('Read more',['action'=>'aboutus'],['class'=>'big-link-1']) ?></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service wow fadeInDown">
                    <div class="service-icon"><i class="fa fa-table"></i></div>
                    <h3><?=$homepage[3]['content']?></h3>
                    <p><?=$homepage[6]['content']?></p>
<!--                    <a class="big-link-1" href="services.html">Book Now</a>-->
                    <a><?= $this->Html->link('Book now',['controller'=>'bookings','action'=>'add'],['class'=>'big-link-1']) ?></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="service wow fadeInUp">
                    <div class="service-icon"><i class="fa fa-envelope"></i></div>
                    <h3><?=$homepage[4]['content']?></h3>
                    <p><?=$homepage[7]['content']?></p>
<!--                    <a class="big-link-1" href="services.html">Contact Detail</a>-->
                    <a><?= $this->Html->link('Contact Detail',['action'=>'contactus'],['class'=>'big-link-1']) ?></a>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Social Media -->

<div class="work-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 work-title wow fadeIn">
                <h2 style="font-family: sans-serif;"><?=$homepage[8]['content']?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="work wow fadeInUp">
                    <?=$this->Html->link($this->Html->image('/img/portfolio/facebook.png', array('height' => '150', 'width' => '200')) . '' . (''), $homepage[12]['content'],array('escape' => false,'target'=> '_blank'));?>
                    <h3>Facebook</h3>
                    <p><?=$homepage[9]['content']?></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="work wow fadeInUp">
                <?= $this->Html->link($this->Html->image('/img/portfolio/linkedin.png', array('height' => '150', 'width' => '200')) . '' . (''), $homepage[13]['content'], array('escape' => false,'target'=> '_blank'));?>
                <h3>LinkedIn</h3>
                <p><?=$homepage[10]['content']?></p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Our Associations -->


<div class="testimonials-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 testimonials-title wow fadeIn">
                <h2 style="font-family: sans-serif;"><?=$homepage[11]['content']?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="work wow fadeInUp">
                    <?=$this->Html->image('/img/portfolio/evisa-logo.png', array('height' => '150', 'width' => '200'))?>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="work wow fadeInUp">
                    <?=($this->Html->image('/img/portfolio/Mia.jpg', array('height' => '150', 'width' => '200')))?>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="work wow fadeInUp">
                    <?=($this->Html->image('/img/portfolio/ma.png', array('height' => '150', 'width' => '200')))?>

                </div>
            </div>
        </div>
     </div>
</div>
</body>

</html>