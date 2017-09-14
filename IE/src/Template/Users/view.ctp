<div class="users form large-9 medium-8 columns content">
    <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 input_form">
                        <div class="work wow fadeInUp">
                            <h3 style="background-color:#337ab7; color:white;">
                                View User
                            </h3>
                            <table id="users" class="table table-striped table-bordered table-hover dataTable no-footer">
                                <tr>
                                    <th>Username: </th>
                                    <td><strong><?= h($user->username) ?></strong></td>
                                </tr>
                                <tr>
                                    <th>First Name: </th>
                                    <td><strong><?= h($user->first_name) ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Last Name: </th>
                                    <td><strong><?= h($user->last_name) ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <td><strong><?= h($user->email) ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth: </th>
                                    <td><strong><?= date_format($user['dob'], 'd/m/Y'); ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Phone: </th>
                                    <td><strong><?= h($user->phone) ?></strong></td>
                                </tr>
                                <tr>
                                    <th>Status: </th>
                                    <td><strong><?= h($user->status) ?></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>