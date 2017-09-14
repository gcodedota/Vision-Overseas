<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="customers index large-9 medium-8 columns content">
    <h3><?= __('Customers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('application') ?></th>
                <th scope="col"><?= $this->Paginator->sort('applicationName') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passportNO') ?></th>
                <th scope="col"><?= $this->Paginator->sort('TRNNo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lodgementDate') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visaStatus') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interviewee') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reference') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('staff_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td><?= $this->Number->format($customer->id) ?></td>
                <td><?= h($customer->application) ?></td>
                <td><?= h($customer->applicationName) ?></td>
                <td><?= h($customer->passportNO) ?></td>
                <td><?= h($customer->TRNNo) ?></td>
                <td><?= h($customer->lodgementDate) ?></td>
                <td><?= h($customer->visaStatus) ?></td>
                <td><?= h($customer->interviewee) ?></td>
                <td><?= h($customer->reference) ?></td>
                <td><?= $customer->has('user') ? $this->Html->link($customer->user->first_name, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
                <td><?= $customer->has('staff') ? $this->Html->link($customer->staff->id, ['controller' => 'Staffs', 'action' => 'view', $customer->staff->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $customer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
