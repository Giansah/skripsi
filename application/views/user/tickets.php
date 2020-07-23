<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="panel panel-white">
        <div class="panel-heading">
            <?= $this->session->flashdata('message_add'); ?>
        </div>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
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
                            <?php foreach ($ticket as $to) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $to->created_date; ?></td>
                                    <td><?= $to->problem; ?></td>
                                    <td><?= $to->report_by; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/ticket_details'); ?>/<?= $to->id; ?>" class="btn btn-primary"> View Detail </a>
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
                <form action="<?php echo base_url('user/tickets'); ?>" method="post">
                    <div class="form-group">
                        <label for="problem">Problem/Subject</label>
                        <input type="text" class="form-control" id="problem" name="problem">
                    </div>
                    <!-- <div class="form-group">
                        <label for="report_by">Report By</label> -->
                    <input type="hidden" class="form-control" id="report_by" name="report_by" value="<?= $create['name']; ?>">
                    <!-- </div> -->
                    <div class=" form-group">
                        <label for="action">Action</label>
                        <textarea name="action" id="ckeditor" class="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="status" name="status" value="6">
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $user['id']; ?>">
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