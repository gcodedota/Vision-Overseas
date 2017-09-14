<div class="col-sm-12 work-title wow fadeIn">
    <h2>Our Services</h2>
</div>
<div class="container">
    <div class="row">
            <?php if (sizeof($categories)%3==0): ?>
                <?php for($counter = 0;$counter<sizeof($categories);$counter++){ ?>
                        <div class="col-sm-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                <?php }?>
            <?php elseif ((sizeof($categories)%3==1)): ?>
                <?php for($counter = 0;$counter<sizeof($categories);$counter++){ ?>
                    <?php if ($counter < sizeof($categories)-1): ?>
                        <div class="col-sm-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-sm-4 col-sm-offset-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                    <?php endif ?>
                <?php }?>
            <?php elseif ((sizeof($categories)%3==2)): ?>
                <?php for($counter = 0;$counter<sizeof($categories);$counter++){ ?>
                    <?php if ($counter < sizeof($categories)-3): ?>
                        <div class="col-sm-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                    <?php elseif ((sizeof($categories)-$counter == 2)): ?>
                        <div class="col-sm-4 col-sm-offset-2 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-sm-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?= $this->Html->link(__($categories[$counter]['category']), ['controller' => 'categories','action' => 'visalist', $categories[$counter]['id']], ['style'=>'color:white;']) ?>
                                </h3>
                                <p>
                                    <?=$categories[$counter]['description']?>
                                </p>
                            </div>
                        </div>
                    <?php endif ?>
                <?php }?>
            <?php endif ?>
    </div>
</div>
<style>
    .visacategories {
        height: 300px;
    }
</style>