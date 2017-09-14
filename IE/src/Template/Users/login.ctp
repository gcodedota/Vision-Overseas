<html>
<body>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Login
                        </h3>
                            <?= $this->Form->create() ?>
                        <p>
                            <?= $this->Form->input('username',['style'=>'width:150px']) ?>
                        </p>
                        <p>
                            <?= $this->Form->input('password',['style'=>'width:150px']) ?>
                        </p>
                            <br/>
                            <?= $this->Form->button('Login',['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
                            <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
