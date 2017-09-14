<html>
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
<body>
<h3><?= $this->Html->link(__('List Visas'), ['action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?></h3>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            New Category
                        </h3>
                        <?= $this->Form->create($category,['novalidate'=>true]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('category',['style'=>'width:300;']);
                            //                            echo $this->Form->textfield('category');
//                            echo $this->Form->label('Description');
                            echo $this->Form->input('description',['style'=>'width:390px; height:400px;','type'=>'textarea']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button('Submit',['class'=>'btn btn-outline btn-secondary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style>

</style>
</html>