<div class="users form large-9 medium-8 columns content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Folder
                        </h3>
                        <?= $this->Form->create(null) ?>
                            <h4>This customer does have Dropbox folder. Press Submit to create new folder name:<strong> <?= h($folder1) ?></strong></h4>
                            <?php
                                echo $this->Form->button(__('Submit'));
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>