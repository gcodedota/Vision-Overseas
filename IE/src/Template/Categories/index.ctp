<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>

<div class="categories index large-9 medium-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h2>Visa Categories</h2>
        <?= $this->Html->link(__('New Category'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
        <?= $this->Html->link(__('Visas List'), ['controller' => 'visas','action' => 'index'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    </div>
        <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
            <tr>
                <th>id</th>
                <th>category</th>
                <th>description</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= h($category->category) ?></td>
                <td><?= h($category->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete {0}? Doing so will delete all the related visas.', $category->category)]) ?>
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
                </body>
</html>

