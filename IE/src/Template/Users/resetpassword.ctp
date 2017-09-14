<html>

<body>
<div class="row" style="margin-bottom: 10px">
        <?= $this->Html->link(__('List Active Users'), ['controller' => 'Users', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:150px']) ?>
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <div class="container">
        <div class="work-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 input_form">
                        <div class="work wow fadeInUp">
                            <h3 style="background-color:#337ab7; color:white;">
                                Change Password
                            </h3>
                            <p> <?= $this->Form->create($user,['novalidate'=>true]) ?>
                                <?php
                                echo $this->Form->input('username',['disabled'=>'disabled']);
                                echo $this->Form->input('first_name',['disabled'=>'disabled']);
                                echo $this->Form->input('last_name',['disabled'=>'disabled']);
                                echo $this->Form->input('password');
                                echo $this->Form->input('confirm_password', array('type' => 'password'));
                                ?>
                                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
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