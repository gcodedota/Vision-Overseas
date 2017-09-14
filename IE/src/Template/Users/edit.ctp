<html>

<head>
    <?= $this->Html->script('/jquery-ui-1.12.1/jquery-ui.js') ?>
    <?= $this->Html->css('/jquery-ui-1.12.1/jquery-ui.css') ?>
</head>

<body>
<!-- removed admin, staff and customers, remember to add it back. Not working at the moment -->
<?php
$user['dob']=date_format($user['dob'],'Y-m-d');
//$user['dob']=date_format($user['dob'],'Y-m-d');
//$userData.lodgementDate == date_format($userData.lodgementDate,'Y-m-d');
//debug($user);
//debug($userData);
$userData['lodgementDate']? ($userData['lodgementDate']=date_format($userData['lodgementDate'],'Y-m-d')): ($userData['lodgementDate']='');
//debug($userData);
//die();
?>

<div>
    <h3 style="position: absolute; left: 200px; display: inline-block">Edit Account Information</h3>
    <?= $this->Html->link(__('List Users'), ['action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
</div>

<div class="users form large-9 medium-8 columns content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 input_form">
                    <div class="work wow fadeInUp" style="height: 330px">
                        <?= $this->Form->create($user,['novalidate'=>true]) ?>
                        <h3 style="background-color:#337ab7; color:white;">
                            Account Information
                        </h3>
                        <p>
                            <?php
                            echo $this->Form->input('username',['disabled' => 'disabled']);
                            echo $this->Form->input('first_name');
                            echo $this->Form->input('last_name');
                            echo $this->Form->input('email',['type'=>'email']);
                            echo $this->Form->input('dob', ['type'=>'text', 'id'=>'dob'],['label'=>'Date of Birth']);
                            echo $this->Form->input('phone');
                            echo $this->Form->input(
                                'status',array('type'=>'select','options'=> array('active' => 'Active', 'inactive' => 'Inactive')));
                            echo $this->Form->input(
                                'level',array('type'=>'select','options'=> array('admin' =>'Admin',
                                    'staff'=>'Staff',
                                    'customer'=> 'Customer'),'disabled' => 'disabled')
                            );
                            ?>
                        </p>
                        <p><strong> Note: All fields are required</p></strong>
                    </div>
                </div>
                <div class="col-md-6 input_form" id="customer" style="display: none">
                    <div class="work wow fadeInUp" style="height: 330px">
                        <h3 style="background-color:#337ab7; color:white;">
                            Customer Information
                        </h3>
                        <?= $this->Form->create($userData,['novalidate'=>true]) ?>
                        <p>
                            <?php
                            echo $this->Form->input('application',['label'=>'Application ID']);
                            echo $this->Form->input('applicationName',['label'=>'Application Name']);
                            echo $this->Form->input('passportNO',['label'=>'Passport ID']);
                            echo $this->Form->input('TRNNo',['label'=>'TRN Number']);
                            echo $this->Form->input('lodgementDate', ['type'=>'text', 'id'=>'lod'],['label'=>'Lodgement Date']);
                            echo $this->Form->input('visaStatus',['label'=>'Visa Status']);
                            echo $this->Form->input('interviewee');
                            echo $this->Form->input('reference');
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 input_form" id="admin" style="display: none">
                    <div class="work wow fadeInUp" style="height: 330px">
                        <h3 style="background-color:#337ab7; color:white;">
                            Admin Information
                        </h3>
                        <?= $this->Form->create($userData,['novalidate'=>true]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('googleCalendar',['style'=>'position:relative']);
                            ?>
                        </fieldset>
                    </div>
                </div>
                <div class="col-md-6 input_form" id="staff" style="display: none">
                    <div class="work wow fadeInUp" style="height: 330px">
                        <h3 style="background-color:#337ab7; color:white;">
                            Staff Information
                        </h3>
                        <?= $this->Form->create($userData,['novalidate'=>true]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('position');
                            ?>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
<?= $this->Form->end() ?>
</body>
<script>
    $(function() {
        $('#level').change(function(e) {
            var e = document.getElementById("level");
            var value = e.options[e.selectedIndex].value;
            var selectedAdmin = e.options[e.selectedIndex].text;
            if (selectedAdmin === 'Customer') {
                document.getElementById("customer").style.display = 'block';
                document.getElementById("admin").style.display = 'none';
                document.getElementById("staff").style.display = 'none';
            } else if (selectedAdmin === 'Staff') {
                document.getElementById("customer").style.display = 'none';
                document.getElementById("admin").style.display = 'none';
                document.getElementById("staff").style.display = 'block';
            } else {
                document.getElementById("customer").style.display = 'none';
                document.getElementById("admin").style.display = 'block';
                document.getElementById("staff").style.display = 'none';
            }
            console.log(selectedAdmin);
        }).change();
        $('#dob').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '1950:2012',
            defaultDate: '1990-01-01'
        });
        $('#lod').datepicker({
            dateFormat: 'yy-mm-dd',
            showButtonPanel: true,
            changeMonth: true,
            changeYear: true
        });
    });
</script>

<style>
    label {
        display: inline-block;
        width: 140px;
        text-align: right;
    }

    input {
        display: inline-block;
        width: 230px;
    }

    select {
        display: inline-block;
        /*margin-left: 88px;*/
        margin-right: 8px;
        width: 230px;
    }
</style>

</html>