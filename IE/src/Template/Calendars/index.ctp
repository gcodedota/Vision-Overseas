<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Calendars</h3>
        <?= $this->Html->link(__('New Calendar'), ['controller' => 'Calendars', 'action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:150px']) ?>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>short Name</th>
                        <th>long Name</th>
                        <th>calendarID</th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($calendars as $calendar): ?>
                        <tr>
                            <td><?= $this->Number->format($calendar->id) ?></td>
                            <td><?= h($calendar->shortName) ?></td>
                            <td><?= h($calendar->longName) ?></td>
                            <td><?= h($calendar->calendarID) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $calendar->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $calendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendar->id)]) ?>
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
<script>
    $(document).ready(function(){
        $('#contents').DataTable();
    });
</script>
</body>
</html>