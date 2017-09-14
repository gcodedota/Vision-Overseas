<html>
<head>
    <?= $this->Html->script('https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js') ?>
    <?= $this->Html->css('https://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css') ?>
</head>
<body>
<div class="users index large-9 large-8 columns content">
    <div class="row" style="margin-bottom: 10px">
        <h3>Manage Contents</h3>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                <table id="contents" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>description</th>
                        <th>content</th>
                        <th>page</th>
                        <th scope="col" class="actions">
                            <?= __('Actions') ?>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($content as $content): ?>
                        <tr>
                            <td>
                                <?= h($content->id) ?>
                            </td>
                            <td>
                                <?= h($content->description) ?>
                            </td>
                            <td>
                                <?= h($content->content) ?>
                            </td>
                            <td>
                                <?= h($content->page) ?>
                            </td>
                            <td class="actions">
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $content->id]) ?>
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
</html>
<script>
    $(document).ready(function(){
        $('#contents').DataTable();
    });
</script>
