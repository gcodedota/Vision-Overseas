<html>
<head>

</head>
<body>
        <a class="h3"><?= __('Actions:') ?></a>
        <?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>

        <!-- removed admin, staff and customers, remember to add it back. Not working at the moment -->


        <?= $this->Html->link(__('User File Uploads'), ['controller' => 'Uploads', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('User Activity Log'), ['controller' => 'Logs', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('Manage Content'), ['controller' => 'Content', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('Manage Visa'), ['controller' => 'Visa', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('Feedback'), ['controller' => 'Feedbacks', 'action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>

<div class="content form large-9 medium-8 columns content">
    <?= $this->Form->create($content,['novalidate'=>true]) ?>
    <fieldset>
        <legend><?= __('Add Content') ?></legend>
        <?php
            echo $this->Form->input('description');
            echo $this->Form->input('content');
            echo $this->Form->input('page');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</body>
</html>