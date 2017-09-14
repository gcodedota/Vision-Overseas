<html>
<body>
<div>
    <h3 style="position: relative;display: block">Booking Information</h3>
</div>

<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;"><i class="fa fa-map-marker"></i>
                            Booking ID: <?= h($booking->id) ?>
                        </h3>
                        <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <tr>
                                <th>Name: </th>
                                <td><strong><?= h($booking->name) ?></strong></strong></td>
                            </tr>
                            <tr>
                                <th>Email: </th>
                                <td><strong><?= h($booking->email) ?></strong></strong></td>
                            </tr>
                            <tr>
                                <th>Consultant: </th>
                                <td><strong><?= h($booking->consultant) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Reason: </th>
                                <td><strong><?= h($booking->reason) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Type: </th>
                                <td><strong><?= h($booking->visatype) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Start Time: </th>
                                <td><strong><?= date_format($booking['start'], 'd/m/Y g:i A'); ?></strong></td>
                            </tr>
                            <tr>
                                <th>End Time: </th>
                                <td><strong><?= date_format($booking['end'], 'd/m/Y g:i A'); ?></strong></td>
                            </tr>
                            <tr>
                                <th>Reason: </th>
                                <td><strong><?= h($booking->reason) ?></strong></td>
                            </tr>
                            <tr>
                                <th>Status: </th>
                                <td><strong><?= h($booking->status) ?></strong></td>
                            </tr>
                        </table>
                        <?= $this->Form->postButton(
                            __('Cancel'),
                            ['action' => 'delete', $booking->id],
                            ['confirm' => __('Are you sure you want to Cancel this booking??', $booking->id)]
                            ,['class'=>'btn btn-outline btn-primary']
                        )
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
