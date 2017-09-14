
    <h3><?= h($staffmember->name) ?></h3>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <table id="staffmembers" class="table table-striped table-bordered table-hover dataTable no-footer">
                    <tr>
                        <th scope="row"><?= __('Name') ?></th>
                        <td><?= h($staffmember->name) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Position') ?></th>
                        <td><?= h($staffmember->position) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Email') ?></th>
                        <td><?= h($staffmember->email) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Phone') ?></th>
                        <td><?= h($staffmember->phone) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Description') ?></th>
                        <td><?= h($staffmember->description) ?></td>
                    </tr>
                    <tr>
                        <th scope="row"><?= __('Id') ?></th>
                        <td><?= $this->Number->format($staffmember->id) ?></td>
                    </tr>
                 </table>
             </div>
        </div>
    </div>
</div>