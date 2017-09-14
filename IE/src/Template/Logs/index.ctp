<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>User Logs</h3>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="logs" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr>
                        <th>users_id</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr>
                            <td><?= $log->has('user') ? $this->Html->link($log->user->id, ['controller' => 'Users', 'action' => 'view', $log->user->id]) : $log->user->id ?></td>
                            <td><?= $log->user->username ? $log->user->username : '' ?></td>
                            <td><?= $log->user->first_name ? $log->user->first_name : '' ?></td>
                            <td><?= $log->user->last_name? $log->user->last_name : '' ?></td>
                            <td><?= $log->user->email ? $log->user->email : '' ?></td>
                            <td><?= $log->time ? date_format($log->time, 'Y-m-d H:i:s') : 'Empty' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#logs').DataTable( {
            "order": [[ 5, "desc" ],[0,"asc"]]
        } );
    } );
</script>
</html>
