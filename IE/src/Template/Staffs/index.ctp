<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Staff</h3>
        <?= $this->Html->link(__('New Staff'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
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
                        <th>Phone Number</th>
                        <th>Position</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($staffs as $staff): ?>
                        <tr>
                            <td><?= $this->Number->format($staff->id) ?></td>
                            <td><?= $staff->has('user') ? $this->Html->link($staff->user->id, ['controller' => 'users', 'action' => 'view', $staff->user->id]) : '' ?></td>
                            <td><?= $staff->has('user') ? h($staff->user->first_name)  : '' ?></td>
                            <td><?= $staff->has('user') ? h($staff->user->last_name)  : '' ?></td>
                            <td><?= $staff->has('user') ? h($staff->user->email)  : '' ?></td>
                            <td><?= $staff->has('user') ? h($staff->user->phone)  : '' ?></td>
                            <td><?= h($staff->position) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $staff->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staff->id]) ?>
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