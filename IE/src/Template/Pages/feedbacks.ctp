<body>
<div class="work-container">
    <div class="container">
        <div class="row">
            <div class="work-title wow fadeIn">
                <h2> What people thinks of us!</h2><br/>
            </div>
            <?= $this->Html->link(__('Give us your feedback'), ['controller' => 'Feedbacks', 'action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:180px']) ?>
        </div>
        <div class="row">
                <?php if (sizeof($feedback)>0): ?>
                    <?php for($counter = sizeof($feedback)-1;$counter>=0;$counter--){ ?>
                        <div class="col-sm-12">
                            <div class="work wow fadeInUp">
                                <p>
                                    <br/><i>"<?=$feedback[$counter]['content']?>"</i><br/>
                                    published by <strong><?=$feedback[$counter]['name']?></strong> <br>
                                    on <i><?= $feedback[$counter]['time'] ? date_format($feedback[$counter]['time'], 'd/m/Y') : '' ?></i>
                                </p>
                            </div>
                        </div>
                    <?php }?>
                <?php else: ?>
                        <p>
                            There is no feedback available....
                        </p>
                <?php endif ?>
        </div>
    </div>
</div>
</body>







