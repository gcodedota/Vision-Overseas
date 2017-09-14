<html>
<body>
<div class="uploads form large-9 medium-8 columns content">
    <?= $this->Form->create($feedback)?>
    <fieldset>
        <legend><?= __('Provide Feedback') ?></legend>
        <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('content');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</body>
</html>