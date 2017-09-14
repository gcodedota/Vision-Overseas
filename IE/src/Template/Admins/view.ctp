<div class="categories index large-9 medium-8 columns content">
    <?= $this->Html->link(__('Edit Admin'), ['action' => 'edit', $admin->id],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table id="visas" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($admin->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Account ID') ?></th>
                            <td><?= $admin->has('user') ? $this->Html->link($admin->user->id, ['controller' => 'users', 'action' => 'view', $admin->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('First Name Name') ?></th>
                            <td><?= $admin->has('user') ? h($admin->user->first_name)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Last Name') ?></th>
                            <td><?= $admin->has('user') ? h($admin->user->last_name)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email Address') ?></th>
                            <td><?= $admin->has('user') ? h($admin->user->email)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Phone Number') ?></th>
                            <td><?= $admin->has('user') ? h($admin->user->phone)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Google Calendar') ?></th>
                            <td><?= h($admin->googleCalendar) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>