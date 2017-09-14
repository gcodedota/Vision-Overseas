<html>
<body>

<div class="users index large-9 large-8 columns content">
    <?= $this->Html->link(__('List Calendars'), ['controller' => 'Calendars', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <div class="row touch_middle center_div">
        <div class="col-md-4 col-md-offset-4 input_form">
    <?= $this->Form->create($calendar,['novalidate'=>true]) ?>
    <fieldset>

        <span>Short Name*</span>
        <?php echo $this->Form->input('shortName', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <span>Long Name*</span>
        <?php echo $this->Form->input('longName', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <span>Calendar API Key*</span>
        <?php echo $this->Form->input('calendarAPI', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <spam>Calendar ID*</spam>
        <?php
        echo $this->Form->input('calendarID', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

    </fieldset>
    <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <?= $this->Form->end() ?>

        </div>
    </div>
</div>


</body>

</html>