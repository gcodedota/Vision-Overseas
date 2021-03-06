<html>
<body>
<div class="container">
    <div class="work-container">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4 input_form">
                    <div class="work wow fadeInUp">
                        <h3 style="background-color:#337ab7; color:white;"><i class="fa fa-map-marker"></i>
                            Your booking has been cancelled successfully!
                        </h3>
                        <p>
                        <div>Booking ID:</div>
                        <div><strong> <?= h($booking->id) ?></strong></div>
                        <div>Your Name: </div>
                        <div><strong><?= h($booking->name) ?></strong></div>
                        <div>Your Email: </div>
                        <div><strong><?= h($booking->email) ?></strong></div>
                        <div>Consultant:</div>
                        <div><strong><?= h($booking->consultant) ?></strong> </div>
                        <div>Start time:</div>
                        <div><strong><?= date_format($booking['start'], 'd/m/Y g:i A'); ?></strong></div>
                        <div>End time:</div>
                        <div><strong><?= date_format($booking['end'], 'd/m/Y g:i A'); ?></strong></div>
                        <div>The reason you visit us:</div>
                        <div><strong><?= h($booking->reason) ?></strong></div>
                        <br>
                        <div><strong>Hope we can see you next time!</div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>