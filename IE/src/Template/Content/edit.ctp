<html>
<head>
    <?= $this->Html->script("//cdn.tinymce.com/4/tinymce.min.js")?>
    <script>
        tinymce.init({
            selector: 'textarea',
            force_br_newlines: false,
            force_p_newlines: false,
            forced_root_block: '',
            plugins: 'paste',
            paste_auto_cleanup_on_paste: true,
            paste_remove_styles: true,
            paste_remove_styles_if_webkit: true,
            paste_strip_class_attributes: true,
        });
    </script>
</head>
<body>
<h3><?= $this->Html->link(__('List Content'), ['action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?></h3>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Edit Content
                        </h3>
                        <?= $this->Form->create($content,['novalidate'=>true]) ?>
                        <fieldset>
                            <?php echo $this->Form->label('Page: '.$content->page." |");
                            echo $this->Form->label('description: '.$content->description." |");
                            echo $this->Form->textarea('content',['style'=>'width:390px; height:400px']); ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->end() ;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<style></style>
</html>