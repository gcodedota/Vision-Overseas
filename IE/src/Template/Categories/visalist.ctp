<div class="col-sm-12 work-title wow fadeIn">
    <h2><?php echo $category->category;?> </h2>
</div>
<?php $visas = $category->visas?>
<div class="container">
    <div class="row">
        <?php if (sizeof($visas)%3==0): ?>
            <?php for($counter = 0;$counter<sizeof($visas);$counter++){ ?>
                <div class="col-sm-4 input_form">
                    <div class="work wow fadeInUp visacategories">
                        <h3 style="background-color:#337ab7; color:white;">
                            <p> <?= h($visas[$counter]['visatype']) ?> </p>
                        </h3>
                        <p><?= $visas[$counter]['description'] ?></p>
                    </div>
                </div>
            <?php }?>
        <?php elseif ((sizeof($visas)%3==1)): ?>
            <?php for($counter = 0;$counter<sizeof($visas);$counter++){ ?>
                <?php if ($counter < sizeof($visas)-1): ?>
                    <div class="col-sm-4 input_form">
                        <div class="work wow fadeInUp visacategories">
                            <h3 style="background-color:#337ab7; color:white;">
                                <p> <?= h($visas[$counter]['visatype']) ?> </p>
                            </h3>
                            <p><?= $visas[$counter]['description'] ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-sm-4 col-sm-offset-4 input_form">
                        <div class="work wow fadeInUp visacategories">
                            <h3 style="background-color:#337ab7; color:white;">
                                <p> <?= h($visas[$counter]['visatype']) ?> </p>
                            </h3>
                            <p><?= $visas[$counter]['description'] ?></p>
                        </div>
                    </div>
                <?php endif ?>
            <?php }?>
        <?php elseif ((sizeof($visas)%3==2)): ?>
            <?php for($counter = 0;$counter<sizeof($visas);$counter++){ ?>
                <?php if ($counter < sizeof($visas)-3): ?>
                    <div class="col-sm-4 input_form">
                        <div class="work wow fadeInUp visacategories">
                            <h3 style="background-color:#337ab7; color:white;">
                                <p> <?= h($visas[$counter]['visatype']) ?> </p>
                            </h3>
                            <p><?= $visas[$counter]['description'] ?></p>
                        </div>
                    </div>
                <?php elseif ((sizeof($visas)-$counter == 2)): ?>
                    <div class="col-sm-4 col-sm-offset-2 input_form">
                        <div class="work wow fadeInUp visacategories">
                            <h3 style="background-color:#337ab7; color:white;">
                                <p> <?= h($visas[$counter]['visatype']) ?> </p>
                            </h3>
                            <p><?= $visas[$counter]['description'] ?></p>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="col-sm-4 input_form">
                        <div class="work wow fadeInUp visacategories">
                            <h3 style="background-color:#337ab7; color:white;">
                                <p> <?= h($visas[$counter]['visatype']) ?> </p>
                            </h3>
                            <p><?= $visas[$counter]['description'] ?></p>
                        </div>
                    </div>
                <?php endif ?>
            <?php }?>
        <?php endif ?>
    </div>
</div>

<style>
    .visacategories{
        height: 275px;
        text-align: inherit;
    }
</style>