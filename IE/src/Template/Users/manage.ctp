<html>
<head>
    <?= $this->Html->script('/jquery-ui-1.12.1/jquery-ui.js') ?>
    <?= $this->Html->css('/jquery-ui-1.12.1/jquery-ui.css') ?>
</head>
<body>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <div class="container">
        <div class="work-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 input_form">
                        <div class="work wow fadeInUp">
                            <h3 style="background-color:#337ab7; color:white;">
                                Manage My Account
                            </h3>
                            <p>
                                <?php
                                echo $this->Form->input('username',['disabled'=>'disabled']);
                                echo $this->Form->input('password', ['value' => '']);
                                echo $this->Form->input('confirm_password', array('type' => 'password'));
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
<script>

    $( function() {
        $('#dob').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2012',
            defaultDate:'1990-01-01'
        });
    });
</script>
<style>
    label{
        display: inline-block;
        width: 150px;
        text-align: right;
    }
    input {
        display: inline-block;
        width: 230px;
    }
    select{
        display: inline-block;
        width: 230px;
    }
    button{
        display: block;
        margin: 0 auto;
    }

</style>
</html>