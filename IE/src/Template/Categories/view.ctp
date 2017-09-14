
<div class="categories index large-9 medium-8 columns content">
 <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id],['class'=>'btn btn-outline btn-primary','style'=>'width:130px']) ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 input_form">
                <div class="work wow fadeInUp">
                    <h3 style="background-color:#337ab7; color:white;">
                        Category: <?= h($category->category) ?>
                    </h3>
                    <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <tr>
                            <th>Category Name: </th>
                            <td><strong><?= h($category->category) ?></strong></td>
                        </tr>
                        <tr>
                            <th>Description: </th>
                            <td><strong><?= h($category->description) ?></strong></td>
                        </tr>
                        <tr>
                            <th>Category ID: </th>
                            <td><strong><?= $this->Number->format($category->id) ?></strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-offset-2 input_form">
                <div class="work wow fadeInUp">
                    <h3 style="background-color:#337ab7; color:white;">
                        Related Visas
                    </h3>
                    <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <?php foreach ($category->visas as $visas): ?>
                            <tr>
                                <th style="text-align: center"><?= __('Visatype') ?></th>
                                <th style="text-align: center"><?= __('Description') ?></th>
                                <th style="text-align: center"><?= __('Actions') ?></th>
                            </tr>
                            <tr>
                                <td><?= h($visas->visatype) ?></td>
                                <td><?= h($visas->description) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Visas', 'action' => 'view', $visas->id]) ?>
                                    <?= $this->Html->link(__('Edit'), ['controller' => 'Visas', 'action' => 'edit', $visas->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Visas', 'action' => 'delete', $visas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $visas->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>