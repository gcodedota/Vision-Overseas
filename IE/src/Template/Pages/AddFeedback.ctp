<h1 style="background-color:#337ab7;color:white">
    Share Your Thoughts and Experiences With Others! </h1>
<div class="row touch_middle", align="center">
    <div class="col-md-8 input_form">
        <?= $this->Form->create($feedback, array('url' => array('controller' => 'Feedbacks', 'action' => 'add'))) ?>
        <fieldset>
            <h3>
                Add Your own Feedback here
            </h3>
            <span>Name*</span>
            <?php echo $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

            <span>Email(Optional)</span>
            <?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

            <span>Your Feedback*</span>
            <?php echo $this->Form->input('content', ['label' => false, 'class' => 'form-control', 'rows' => 5, 'required' => false]); ?>

            <?php
            echo $this->Form->input('status', array('type' => 'hidden', 'value' => 'inactive'));
            ?>

        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
