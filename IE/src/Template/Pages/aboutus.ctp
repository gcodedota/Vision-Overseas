<body>
<div class="work-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 work-title wow fadeIn">
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="work wow fadeInUp" style="height: 300px">
                        <h3 style="background-color:#337ab7; color:white;">
                            Our Vision
                        </h3>
                        <p>
                            <?=$content[0]['content']?>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="work wow fadeInUp" style="height: 300px">
                        <h3 style="background-color:#337ab7; color:white;">
                            Our Achievements
                        </h3>
                        <?php foreach ($achievement as $achievement): ?>
                            <tr>
                                <td>
                                    <p>
                                    <div align="centre"><b> <?=$achievement['content']?></div>
                                    </b>
                                    <p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 work-title wow fadeIn">
                    <h2>Meet Our Staff</h2>
                </div>
                <!-- use footer contents at the moment just for testing purposes -->
                <?php if (sizeof($staffmembers)%3==0): ?>
                    <?php for($counter = 0;$counter<sizeof($staffmembers);$counter++){ ?>
                        <div class="col-sm-4 input_form">
                            <div class="work wow fadeInUp visacategories">
                                <h3 style="background-color:#337ab7; color:white;">
                                    <?=$staffmembers[$counter]['name']?>
                                </h3>
                                <div style="width: 100%; text-align: center;">
                                    <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                        <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                            <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                        <?php else: ?>
                                            <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div style="display: block;">
                                    <p>
                                        Position:  <?=$staffmembers[$counter]['position']?>
                                    </p>
                                    <p>
                                        email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                    </p>
                                    <p>
                                        Phone:  <?=$staffmembers[$counter]['phone']?>
                                    </p>
                                    <p>
                                        Phone:  <?=$staffmembers[$counter]['phone']?>
                                    </p>
                                    <details>
                                        <summary><a>More Detail...</a></summary>
                                        <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                            <p><?=$staffmembers[$counter]['description']?></p>
                                        <?php else: ?>
                                            <p> There is no information about this staff, contact us for more detail</p>
                                        <?php endif; ?>
                                    </details>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                <?php elseif ((sizeof($staffmembers)%3==1)): ?>
                    <?php for($counter = 0;$counter<sizeof($staffmembers);$counter++){ ?>
                        <?php if ($counter < sizeof($staffmembers)-1): ?>
                            <div class="col-sm-4 input_form">
                                <div class="work wow fadeInUp visacategories">
                                    <h3 style="background-color:#337ab7; color:white;">
                                        <?=$staffmembers[$counter]['name']?>
                                    </h3>
                                    <div style="width: 100%; text-align: center;">
                                        <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                            <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                                <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                            <?php else: ?>
                                                <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div style="display: block;">
                                        <p>
                                            Position:  <?=$staffmembers[$counter]['position']?>
                                        </p>
                                        <p>
                                            email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <details>
                                            <summary><a>More Detail...</a></summary>
                                            <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                                <p><?=$staffmembers[$counter]['description']?></p>
                                            <?php else: ?>
                                                <p> There is no information about this staff, contact us for more detail</p>
                                            <?php endif; ?>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-sm-4 col-sm-offset-4 input_form">
                                <div class="work wow fadeInUp visacategories">
                                    <h3 style="background-color:#337ab7; color:white;">
                                        <?=$staffmembers[$counter]['name']?>
                                    </h3>
                                    <div style="width: 100%; text-align: center;">
                                        <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                            <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                                <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                            <?php else: ?>
                                                <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div style="display: block;">
                                        <p>
                                            Position:  <?=$staffmembers[$counter]['position']?>
                                        </p>
                                        <p>
                                            email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <details>
                                            <summary><a>More Detail...</a></summary>
                                            <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                                <p><?=$staffmembers[$counter]['description']?></p>
                                            <?php else: ?>
                                                <p> There is no information about this staff, contact us for more detail</p>
                                            <?php endif; ?>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php }?>
                <?php elseif ((sizeof($staffmembers)%3==2)): ?>
                    <?php for($counter = 0;$counter<sizeof($staffmembers);$counter++){ ?>
                        <?php if ($counter < sizeof($staffmembers)-3): ?>
                            <div class="col-sm-4 input_form">
                                <div class="work wow fadeInUp visacategories">
                                    <h3 style="background-color:#337ab7; color:white;">
                                        <?=$staffmembers[$counter]['name']?>
                                    </h3>
                                    <div style="width: 100%; text-align: center;">
                                        <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                            <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                                <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                            <?php else: ?>
                                                <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div style="display: block;">
                                        <p>
                                            Position:  <?=$staffmembers[$counter]['position']?>
                                        </p>
                                        <p>
                                            email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <details>
                                            <summary><a>More Detail...</a></summary>
                                            <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                                <p><?=$staffmembers[$counter]['description']?></p>
                                            <?php else: ?>
                                                <p> There is no information about this staff, contact us for more detail</p>
                                            <?php endif; ?>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        <?php elseif ((sizeof($staffmembers)-$counter == 2)): ?>
                            <div class="col-sm-4 col-sm-offset-2 input_form">
                                <div class="work wow fadeInUp visacategories">
                                    <h3 style="background-color:#337ab7; color:white;">
                                        <?=$staffmembers[$counter]['name']?>
                                    </h3>
                                    <div style="width: 100%; text-align: center;">
                                        <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                            <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                                <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                            <?php else: ?>
                                                <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div style="display: block;">
                                        <p>
                                            Position:  <?=$staffmembers[$counter]['position']?>
                                        </p>
                                        <p>
                                            email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <details>
                                            <summary><a>More Detail...</a></summary>
                                            <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                                <p><?=$staffmembers[$counter]['description']?></p>
                                            <?php else: ?>
                                                <p> There is no information about this staff, contact us for more detail</p>
                                            <?php endif; ?>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="col-sm-4 input_form">
                                <div class="work wow fadeInUp visacategories">
                                    <h3 style="background-color:#337ab7; color:white;">
                                        <?=$staffmembers[$counter]['name']?>
                                    </h3>
                                    <div style="width: 100%; text-align: center;">
                                        <div style="width: 120px;height: 120px; display: inline-block; position: relative">
                                            <?php if (!empty($staffmembers[$counter]['image'])): ?>
                                                <?= $this->Html->image('staff/'.$staffmembers[$counter]['image'],['class'=>'imagefull'])?>
                                            <?php else: ?>
                                                <?= $this->Html->image('staff/withoutimage.jpeg',['class'=>'imagefull'])?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                    <div style="display: block;">
                                        <p>
                                            Position:  <?=$staffmembers[$counter]['position']?>
                                        </p>
                                        <p>
                                            email: <a href="mailto:enquiry@visionoverseas.com.au?Subject=VISA%20query" target="_top"><?=$staffmembers[$counter]['email']?></a>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>
                                        <p>
                                            Phone:  <?=$staffmembers[$counter]['phone']?>
                                        </p>

                                        <details>
                                            <summary><a>More Detail...</a></summary>
                                            <?php if (!empty($staffmembers[$counter]['description'])): ?>
                                                <p><?=$staffmembers[$counter]['description']?></p>
                                            <?php else: ?>
                                                <p> There is no information about this staff, contact us for more detail</p>
                                            <?php endif; ?>
                                        </details>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php }?>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<style>
    .imagefull{
        min-width: 100%;
        min-height: 100%;
    }
</style>