<html>
<head>

</head>
<body>

<div class="bookings form large-9 medium-8 columns content">
    <?= $this->Form->create(null) ?>
    <div class="container">
        <div class="work-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 input_form">
                        <div class="work wow fadeInUp">
                            <h3 style="background-color:#337ab7; color:white;">
                                Cancel your booking
                            </h3>
                            <p>
                                <?php
                                echo $this->Form->input('id',['label'=>'Your booking ID']);
                                echo $this->Form->input('validationCode',['label'=>'Your Validation Code']);
                                ?>
                                <?= $this->Form->button(__('Submit')) ?>
                                <?= $this->Form->end() ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<style>
    label{
        display: inline-block;
        width: 150px;
        text-align: right;
    }
    input {
        display: inline-block;
        width: 150px;
    }
</style>
</html>