<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="panel panel-white">
        <div class="panel-heading">
            <?= $this->session->flashdata('message_add'); ?>
        </div>


        <ul class="nav nav-tabs" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Open Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pending Tickets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link danger" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Closed Tickets</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <!-- <br>
                <br> -->
                <br>
                <div class="panel-body">
                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Created Ticket </button>
                    <br>
                    <br>
                    <br>
                    <table class="display mt-5" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Problem / Subject</th>
                                <th scope="col">Report By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($ticket_open as $to) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $to->created_date; ?></td>
                                    <td><?= $to->problem; ?></td>
                                    <td><?= $to->report_by; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/ticket_detail'); ?>/<?= $to->id; ?>" class="btn btn-primary"> View Detail </a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="panel-body">
                    <!-- <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Created Ticket </button> -->
                    <br>
                    <br>
                    <br>
                    <table class="display" id="ticket_pending">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Problem / Subject</th>
                                <th scope="col">Report By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($ticket_pending as $tp) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $tp->created_date; ?></td>
                                    <td><?= $tp->problem; ?></td>
                                    <td><?= $tp->report_by; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/ticket_detail'); ?>/<?= $tp->id; ?>" class="btn btn-primary"> View Detail </a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                <div class="panel-body">
                    <!-- <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Created Ticket </button> -->
                    <br>
                    <br>
                    <br>
                    <table class="display" id="ticket_closed">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">Problem / Subject</th>
                                <th scope="col">Report By</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($ticket_closed as $tc) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $tc->created_date; ?></td>
                                    <td><?= $tc->problem; ?></td>
                                    <td><?= $tc->report_by; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/ticket_detail'); ?>/<?= $tc->id; ?>" class="btn btn-primary"> View Detail </a>
                                    </td>
                                </tr>
                                <?php $i++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- /.container-fluid -->
</div>

<!-- <div>

        <select onchange="ubah(this)">

            <option value="0" read-only>--pilih metode pembayaran--</option>
            <option value="1">Cash</option>
            <option value="2"> Credit</option>

        </select>

        <br>

        <label for="text">Uang muka </label>
        <input type="text" id="text" name="text">
        <br>
        <label for="text">Total </label>
        <input type="text" id="total" name="total">

    </div> -->
<!-- End of Main Content -->
<!-- Modal created ticket -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModal">Create Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('user/ticket') ?>" method="post">
                    <div class="form-group">
                        <label for="problem">Problem/Subject</label>
                        <input type="text" class="form-control" id="problem" name="problem">
                    </div>
                    <div class="form-group">
                        <label for="report_by">Report By</label>
                        <input type="text" class="form-control" id="report_by" name="report_by">
                    </div>
                    <div class="form-group">
                        <label for="action">Action</label>
                        <textarea name="action" id="ckeditor" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">--Chose Category--</option>
                            <option value="1">Network</option>
                            <option value="2">Hardware</option>
                            <option value="3">Software</option>
                            <option value="4">General</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="status" name="status" value="6">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" id="add-row" class="btn btn-success">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal created ticket -->