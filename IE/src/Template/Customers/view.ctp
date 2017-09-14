<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Staffs'), ['controller' => 'Staffs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Staff'), ['controller' => 'Staffs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="customers view large-9 medium-8 columns content">
    <h3><?= h($customer->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Application') ?></th>
            <td><?= h($customer->application) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('ApplicationName') ?></th>
            <td><?= h($customer->applicationName) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PassportNO') ?></th>
            <td><?= h($customer->passportNO) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TRNNo') ?></th>
            <td><?= h($customer->TRNNo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('VisaStatus') ?></th>
            <td><?= h($customer->visaStatus) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interviewee') ?></th>
            <td><?= h($customer->interviewee) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reference') ?></th>
            <td><?= h($customer->reference) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $customer->has('user') ? $this->Html->link($customer->user->first_name, ['controller' => 'Users', 'action' => 'view', $customer->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Staff') ?></th>
            <td><?= $customer->has('staff') ? $this->Html->link($customer->staff->id, ['controller' => 'Staffs', 'action' => 'view', $customer->staff->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($customer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('LodgementDate') ?></th>
            <td><?= h($customer->lodgementDate) ?></td>
        </tr>
    </table>
</div>
