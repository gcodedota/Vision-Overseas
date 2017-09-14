<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Admins</h3>
        <?= $this->Html->link(__('New Admin'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>User ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Phone Number</th>
                        <th>Google Calendar</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td><?= $this->Number->format($admin->id) ?></td>
                            <td><?= $admin->has('user') ? $this->Html->link($admin->user->id, ['controller' => 'users', 'action' => 'view', $admin->user->id]) : '' ?></td>
                            <td><?= $admin->has('user') ? h($admin->user->first_name)  : '' ?></td>
                            <td><?= $admin->has('user') ? h($admin->user->last_name)  : '' ?></td>
                            <td><?= $admin->has('user') ? h($admin->user->email)  : '' ?></td>
                            <td><?= $admin->user->dob ? date_format($admin->user->dob, 'd/m/Y') : 'Empty' ?></td>
                            <td><?= $admin->has('user') ? h($admin->user->phone)  : '' ?></td>
                            <td><?= h($admin->googleCalendar) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $admin->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $admin->id]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#users').DataTable( {
        } );
    });
</script>