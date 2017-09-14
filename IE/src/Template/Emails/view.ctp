<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="emails view large-9 medium-8 columns content">
    <h3><?= h($email->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Header') ?></th>
            <td><?= h($email->header) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Footer') ?></th>
            <td><?= h($email->footer) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Top') ?></th>
            <td><?= h($email->top) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bottom') ?></th>
            <td><?= h($email->bottom) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Content') ?></th>
            <td><?= h($email->content) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($email->id) ?></td>
        </tr>
    </table>
</div>
