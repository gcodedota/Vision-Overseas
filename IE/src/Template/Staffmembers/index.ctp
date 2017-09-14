<html>
<head>
<?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
<?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">

        <h3><?= $this->Html->link(__('New Staff Member'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:140px']) ?></h3>
    </ul>


</nav>

<div class="feedbacks index large-9 medium-8 columns content">
    <h3><?= __('Staffmembers') ?></h3>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>name</th>
                            <th>position</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
        <tbody>
            <?php foreach ($staffmembers as $staffmember): ?>
            <tr>
                <td><?= $this->Number->format($staffmember->id) ?></td>
                <td><?= h($staffmember->name) ?></td>
                <td><?= h($staffmember->position) ?></td>
                <td><?= h($staffmember->email) ?></td>
                <td><?= h($staffmember->phone) ?></td>
                <td><?= h($staffmember->description) ?></td>
                <td><?= h($staffmember->image) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $staffmember->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $staffmember->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $staffmember->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staffmember->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
                <script>
                    $(document).ready(function(){
                        $('#contents').DataTable();
                    });
                </script>
