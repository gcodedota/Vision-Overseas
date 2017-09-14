<html>
<head>
    <?= $this->Html->script("//cdn.tinymce.com/4/tinymce.min.js")?>
    <script> tinymce.init({ selector:'textarea',
            theme: 'modern',
            convert_urls : false,
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc',
                'image'
            ],
            menubar: "insert",
            toolbar3: "image",
            image_list: [
                {title: 'logo', value: 'http://ie.infotech.monash.edu.au/team37/git/IE/img/rsz_logo.png'}
            ],
            toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'
            ]
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
                            New Email Content
                        </h3>
                        <?= $this->Form->create($email,['novalidate'=>true]) ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('header',['style'=>'width:390px; height:400px;','type'=>'textarea']);
                            echo $this->Form->input('footer',['style'=>'width:390px; height:400px;','type'=>'textarea']);
                            echo $this->Form->input('top',['style'=>'width:390px; height:400px;','type'=>'textarea']);
                            echo $this->Form->input('bottom',['style'=>'width:390px; height:400px;','type'=>'textarea']);
                            echo $this->Form->input('content',['style'=>'width:390px; height:400px;','type'=>'textarea']);
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