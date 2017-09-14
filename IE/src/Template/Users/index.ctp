<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Accounts</h3>
        <div>
            <h4 style="position: absolute; left: 50px; display: inline-block">Active Users</h4>
            <?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
            <?= $this->Html->link(__('List Inactive Users'), ['controller' => 'Users', 'action' => 'inactiveusers'],['class'=>'btn btn-outline btn-primary','style'=>'width:150px']) ?>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                    <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>level</th>
                                <th>Status</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Date of Birth</th>
                                <th>Phone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->level) ?></td>
                                <td><?= h($user->status) ?></td>
                                <td><?= h($user->first_name) ?></td>
                                <td><?= h($user->last_name) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= $user->dob ? date_format($user->dob, 'd/m/Y') : 'Empty' ?></td>
                                <td><?= h($user->phone) ?></td>
                                <td>
                                    <?= $this->Html->link(__('File(s)'), ['action' => 'listfile', $user->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                    <?= $this->Html->link(__('Password'), ['action' => 'resetpassword', $user->id]) ?>
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
            "order": [[ 0, "desc" ]]
        } );
    });
</script>