<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="visas index large-9 medium-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Visa Information</h3>
        <?= $this->Html->link(__('New Visa'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('List Categories'), ['controller' => 'categories','action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    </div>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="table-responsive">
                <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
        <thead>
            <tr>
                <th>id</th>
                <th>visatype</th>
                <th>description</th>
                <th>category</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visas as $visa): ?>
            <tr>
                <td><?= $this->Number->format($visa->id) ?></td>
                <td><?= h($visa->visatype) ?></td>
                <td><?= h($visa->description) ?></td>
                <td><?= $visa->has('category') ? $this->Html->link($visa->category->category, ['controller' => 'Categories', 'action' => 'view', $visa->category->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $visa->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $visa->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visa->id)]) ?>
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
