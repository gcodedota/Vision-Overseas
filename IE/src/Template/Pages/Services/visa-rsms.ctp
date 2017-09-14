<?php $this->layout = 'mainpage' ?>
<body>

    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 work-title wow fadeIn">
                    <h2>RSMS (Regional Sponsored Migration Scheme)</h2>
                </div>
            </div>
            <div class="row">

                <?php
                //loop only visa with category = RSMS (10)
                foreach( $visa as $visaitem ) {
                    if( $visaitem['category'] == 10 ) {

                        echo "<div class=\"col-sm-6\">";
                        echo "<div class=\"work wow fadeInUp\">";
                        echo "<h3 style=\"background-color:#337ab7; color:white\"><i class=\"fa fa-map-marker\"></i>".$visaitem['visatype']."</h3>";
                        echo "<p>".$visaitem['content']."</p>";
                        echo "</div>";
                        echo "</div>";
                        
                    };
                }
                ?>

            </div>
        </div>
    </div>

<!--This does not work if the number of visa information is less than what we have on the code below-->
<?php //foreach ($visa as $visaitem): ?>
<!--    <!-- start of an item -->
<!---->
<!---->
<!--    <h3 style="background-color:#337ab7; color:white"><i class="fa fa-map-marker"></i>-->
<!--        --><?//=$visaitem['visatype']?>
<!--    </h3>-->
<!--    <h4><i class="fa fa-map-marker"></i>-->
<!--        --><?//=$visaitem['content']?>
<!--    </h4>-->
<!--    <!-- end of an item -->
<?php //endforeach; ?>

</body>
