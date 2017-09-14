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
<div class="row touch_middle center_div">
    <div class="col-md-4 col-md-offset-4 input_form">
        <?= $this->Form->create($staffmember, array('url' => array('action' => 'edit'), 'enctype' => 'multipart/form-data')) ?>
        <fieldset>
            <h3>
                Edit Staff Member
            </h3>
            <span>Name*</span>
            <?php echo $this->Form->input('name', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

            <span>Position*</span>
            <?php echo $this->Form->input('position', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

            <span>email*</span>
            <?php echo $this->Form->input('email', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>

            <spam>Phone*</spam>
            <?php
            echo $this->Form->input('phone', ['label' => false, 'class' => 'form-control', 'required' => false]); ?>
            <spam>Description*</spam>
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