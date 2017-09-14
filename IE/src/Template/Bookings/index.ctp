<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Bookings</h3>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="booking" class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Validation Code</th>
                <th>Consultant</th>
                <th>Visa type</th>
                <th>Reason</th>
                <th>Start</th>
                <th>End</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= h($booking->name) ?></td>
                <td><?= h($booking->phone) ?></td>
                <td><?= h($booking->email) ?></td>
                <td><?= h($booking->validationCode) ?></td>
                <td><?= h($booking->consultant) ?></td>
                <td><?= h($booking->visatype) ?></td>
                <td><?= h($booking->reason) ?></td>
                <td><?= $booking->start ? date_format($booking->start, 'd/m/Y g:i A') : 'Empty' ?></td>
                <td><?= $booking->end ? date_format($booking->start, 'd/m/Y g:i A') : 'Empty' ?></td>
                <td><?= h($booking->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                    <?= $this->Html->link(__('Cancel'), ['action' => 'delete', $booking->id],['class'=>'button']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('#booking').DataTable( {
            "order": [[ 4, "desc" ]]
        } );
    } );
</script>