<html>
<body>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">-->
<!--    <ul class="side-nav">-->
<!--        <li class="heading">--><?//= __('Actions') ?><!--</li>-->
<!--        <li>--><?//= $this->Html->link(__('Edit Calendar'), ['action' => 'edit', $calendar->id]) ?><!-- </li>-->
<!--        <li>--><?//= $this->Form->postLink(__('Delete Calendar'), ['action' => 'delete', $calendar->id], ['confirm' => __('Are you sure you want to delete # {0}?', $calendar->id)]) ?><!-- </li>-->
<!--        <li>--><?//= $this->Html->link(__('List Calendars'), ['action' => 'index']) ?><!-- </li>-->
<!--        <li>--><?//= $this->Html->link(__('New Calendar'), ['action' => 'add']) ?><!-- </li>-->
<!--    </ul>-->
<!--</nav>-->

<div class="categories index large-9 medium-8 columns content">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;">
                            Calendar: <?= h($calendar->shortName) ?>
                        </h3>
                        <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>Short Name: </th>
                                <td><strong><?= h($calendar->shortName) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Long Name: </th>
                                <td><strong><?= h($calendar->longName) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Calendar API: </th>
                                <td><strong><?= h($calendar->calendarAPI) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Calendar ID: </th>
                                <td><strong><?= $this->Number->format($calendar->id) ?></strong></td>
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