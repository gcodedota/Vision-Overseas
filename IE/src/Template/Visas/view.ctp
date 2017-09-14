<div class="categories index large-9 medium-8 columns content">
 <?= $this->Html->link(__('Edit Visa'), ['action' => 'edit', $visa->id],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
 <?= $this->Html->link(__('Delete Visa'), ['action' => 'delete', $visa->id],['class'=>'btn btn-outline btn-primary','style'=>'width:130px'], ['confirm' => __('Are you sure you want to delete # {0}?', $visa->id)]) ?>

    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Visa ID: <?= h($visa->id) ?>
                        </h3>
                        <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>Visa Type: </th>
                                <td><strong><?= h($visa->visatype) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Description: </th>
                                <td><strong><?= h($visa->description) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Category: </th>
                                <td><strong><?= $visa->has('category') ? $this->Html->link($visa->category->category, ['controller' => 'Categories', 'action' => 'view', $visa->category->id]) : '' ?></strong></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

