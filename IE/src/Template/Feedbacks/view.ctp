<html>
<body>
<div class="categories index large-9 medium-8 columns content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            <?= h($feedback->name) ?>
                        </h3>
                        <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>Name: </th>
                                <td><strong><?= h($feedback->name) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><strong><?= h($feedback->email) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Content: </th>
                                <td><strong><?= h($feedback->content) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Status: </th>
                                <td><strong><?= h($feedback->status) ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>