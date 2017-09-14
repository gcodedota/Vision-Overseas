<html>
<body>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            New Slide Picture
                        </h3>
                        <?php echo $this->Form->create($slider1, array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')); ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('upload', array('type' => 'file'));
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>