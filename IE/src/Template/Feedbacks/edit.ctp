<br>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            User Feedback
                        </h3>
                        <?= $this->Form->create($feedback,['novalidate'=>true]) ?>
                        <fieldset>
                            <h3>
                                Edit Feedback
                            </h3>
                            <span>Name</span>
                            <?php echo $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'required' => false,'readonly'=>'readonly']); ?>

                            <span>Email</span>
                            <?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'required' => false,'readonly'=>'readonly']); ?>

                            <span>Feedback</span>
                            <?php echo $this->Form->input('content', ['label' => false, 'class' => 'form-control', 'rows' => 5, 'required' => false, 'readonly'=>'readonly']); ?>

                            <?php
                            echo $this->Form->input('status', array('type'=>'select','options'=> array('Inactive' => 'Inactive', 'Active' => 'Active')));

                            ?>
                            

                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>