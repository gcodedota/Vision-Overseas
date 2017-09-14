<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Slide Picture</h3>
        <?= $this->Html->link(__('New Picture'), ['action' => 'add'],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr>
                <th>id</th>
                <th>image</th>
                <th>name</th>
                <th>path</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sliders as $slider): ?>
                    <tr>
                <td><?= $this->Number->format($slider->id) ?></td>
                <td><?= h($slider->image) ?></td>
                <td><?= h($slider->name) ?></td>
                <td><?= h($slider->path) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $slider->id], ['confirm' => __('Are you sure you want to delete # {0}?', $slider->id)]) ?>
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