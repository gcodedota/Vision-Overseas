<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="feedbacks index large-9 medium-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Feedbacks</h3>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>email</th>
                            <th>content</th>
                            <th>time</th>
                            <th>status</th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($feedbacks as $feedback): ?>
                            <tr>
                                <td><?= $this->Number->format($feedback->id) ?></td>
                                <td><?= h($feedback->name) ?></td>
                                <td><?= h($feedback->email) ?></td>
                                <td><?= h($feedback->content) ?></td>
                                <td><?= $feedback->time ? date_format($feedback->time, 'd/m/Y g:i A') : 'Empty' ?></td>
                                <td><?= h($feedback->status) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $feedback->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $feedback->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $feedback->id], ['confirm' => __('Are you sure you want to delete # {0}?', $feedback->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#contents').DataTable( {
                            "order": [[ 0, "desc" ]]
                        } );
                    } );
                </script>
</body>
</html>