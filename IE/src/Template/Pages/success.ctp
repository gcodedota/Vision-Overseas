<body>

<div class="work-container">
    <div class="container">
        <div class="row">
            <div class="work-title wow fadeIn">
                <h2 style="color: green"> Thank you! We have received your feedback</h2><br/>
            </div>
            <?= $this->Html->link(__('Give us your feedback'), ['controller' => 'Feedbacks', 'action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:180px']) ?>
        </div>
        <div class="row">
            <?php foreach ($feedback as $feedbacks): ?>
                <div class="col-sm-12">
                    <div class="work wow fadeInUp">
                        <p>
                            <br/><i>"<?=$feedbacks['content']?>"</i><br/>
                            published by <strong><?=$feedbacks['name']?></strong>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


</body>





