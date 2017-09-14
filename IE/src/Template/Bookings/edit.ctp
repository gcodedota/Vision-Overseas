<body>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>
        <?php
            echo $this->Form->text('name');
            echo $this->Form->text('email');
            echo $this->Form->text('phone');
            echo $this->Form->text('consultant');
            echo $this->Form->text('visatype');
            echo $this->Form->text('reason');
            echo $this->Form->text('status');
            echo $this->Form->text('validationCode');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</body>