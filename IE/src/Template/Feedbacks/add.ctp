<html>
<body>
<?php use Cake\Core\Configure;?>
<div class="work-container">
    <div class="container">
        <div class="row">
            <div class="work-title wow fadeIn">
                <h2>Please add feedback, we value it!</h2>
            </div>
        </div>
        <div class="col-md-4 col-md-offset-4 input_form">
            <?= $this->Form->create($feedback,['novalidate'=>true]) ?>
            <fieldset>
                <span>Name*</span>
                <?php echo $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
                <br>
                <span>Email*</span>
                <?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
                <span><strong>(Note: Your email will not be posted publicly)</strong></span>
                <br/>
                <br>
                <span>Your Feedback*</span>
                <?php echo $this->Form->input('content', ['label' => false, 'class' => 'form-control', 'rows' => 5, 'required' => false]); ?>
                <br/>
                <?php
                echo $this->Form->input('status', array('type' => 'hidden', 'value' => 'inactive'));
                ?>
                <div>
                    <div class="g-recaptcha"
                         data-sitekey="<?php echo Configure::read('Recaptcha.SiteKey'); ?>">
                    </div>
                    <?php echo $this->Html->script('https://www.google.com/recaptcha/api.js"'); ?>
                </div>
            </fieldset>
            <br/>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

</body>
</html>