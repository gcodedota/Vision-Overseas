<div class="categories index large-9 medium-8 columns content">
    <?= $this->Html->link(__('Edit Staff'), ['action' => 'edit', $staff->id],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <table id="visas" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <tr>
                            <th scope="row"><?= __('Id') ?></th>
                            <td><?= $this->Number->format($staff->id) ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Account ID') ?></th>
                            <td><?= $staff->has('user') ? $this->Html->link($staff->user->id, ['controller' => 'users', 'action' => 'view', $staff->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('First Name Name') ?></th>
                            <td><?= $staff->has('user') ? h($staff->user->first_name)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Last Name') ?></th>
                            <td><?= $staff->has('user') ? h($staff->user->last_name)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Email Address') ?></th>
                            <td><?= $staff->has('user') ? h($staff->user->email)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Phone Number') ?></th>
                            <td><?= $staff->has('user') ? h($staff->user->phone)  : '' ?></td>
                        </tr>
                        <tr>
                            <th scope="row"><?= __('Position') ?></th>
                            <td><?= h($staff->position) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>