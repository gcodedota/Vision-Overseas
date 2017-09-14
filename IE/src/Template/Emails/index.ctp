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
                            <th>Header</th>
                            <th>Footer</th>
                            <th>Top</th>
                            <th>Bottom</th>
                            <th>Content</th>
                            <th scope="col" class="actions">
                                <?= __('Actions') ?>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($emails as $email): ?>
                            <tr>
                                <td>
                                    <?= h($email->id) ?>
                                </td>
                                <td>
                                    <?= h($email->header) ?>
                                </td>
                                <td>
                                    <?= h($email->footer) ?>
                                </td>
                                <td>
                                    <?= h($email->top) ?>
                                </td>
                                <td>
                                    <?= h($email->bottom) ?>
                                </td>
                                <td>
                                    <?= h($email->content) ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $email->id]) ?>
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
