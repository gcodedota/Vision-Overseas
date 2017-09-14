<head>
    <?= $this->Html->script("//cdn.tinymce.com/4/tinymce.min.js")?>
    <script> tinymce.init({ selector:'textarea',
            force_br_newlines : false,
            force_p_newlines : false,
            forced_root_block : '',
            plugins: 'paste',
            paste_auto_cleanup_on_paste : true,
            paste_remove_styles: true,
            paste_remove_styles_if_webkit: true,
            paste_strip_class_attributes: true,
        });</script>

</head>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <h3><?= $this->Html->link(__('List Staff Members'), ['action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:140px']) ?></h3>
    </ul>
</nav>

<div class="row touch_middle center_div">
    <div class="col-md-8 col-md-offset-2 input_form">
    <?= $this->Form->create($staffmember, array('url' => array('action' => 'add'), 'enctype' => 'multipart/form-data')) ?>
    <fieldset>
        <span>Name*</span>
        <?php echo $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <span>Position*</span>
        <?php echo $this->Form->input('position', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <span>Email*</span>
        <?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <br/>
        <span>Phone*</span>
        <?php
        echo $this->Form->input('phone', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
        <span>Description*</span>
        <?php
        echo $this->Form->textarea('description',['label' => false, 'class' => 'form-control', 'required' => false],['style'=>'width:390px; height:400px; float:right; display: block']); ?>
        <span>Image</span>
        <?php
        echo $this->Form->input('image', array('type' => 'file','label' => false, 'class' => 'form-control', 'required' => false)); ?>
        <br>
    </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <?= $this->Form->end() ?>

    </div>

</div>


