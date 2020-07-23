<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card">
        <div class="panel-heading">
            <?= $this->session->flashdata('message_add'); ?>
            <?= $this->session->flashdata('message_update'); ?>
            <?= $this->session->flashdata('message_closed'); ?>
            <?= form_error('action_update', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('status_update', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        </div>
        <!-- <h1><?= $closed->status; ?></h1> -->
        <div class="card-body" style="margin: 5px 0px 0px 15px">
            <?php if ($closed->status != 7) {
                echo '<button class="btn btn-primary float-right" data-toggle="modal" id="tombol_update" data-target=".bd-example-modal-lg"> Update Ticket </button>
                        <button class="btn btn-danger float-right" data-toggle="modal" id="tombol_closed" data-target="#exampleModal"> Closed Ticket </button>';
            } ?>
            <!-- table detail -->
            <?php foreach ($ticket as $td) : ?>
                <table>
                    <tr>
                        <td>Problem / Subject</td>
                        <td>:</td>
                        <td><?= $td->problem; ?></td>
                    </tr>
                    <tr>
                        <td>Report By</td>
                        <td>:</td>
                        <td><?= $td->report_by; ?></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td>:</td>
                        <td>
                            <?php 
                                $id_category = $td->category;
                                $category = "";
                                if ($td->category == 1) {
                                    $category = "Network";
                                } else if ($td->category == 2) {
                                    $category = "Hardware";
                                } else if ($td->category == 3) {
                                    $category = "Software";
                                } else if ($td->category == 4) {
                                    $category = "Software";
                                }
                                else{
                                    $category ="Uncategories";  
                                }
                                echo "$category";
                                ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td id="status">
                            <?php if ($td->status == 5) {
                                    $status = "Pending";
                                } else if ($td->status == 6) {
                                    $status = "Open";
                                } else if ($td->status == 7) {
                                    $status = "Closed";
                                } else if ($td->status == 8) {
                                    $status = "On Progress";
                                }
                                echo "$status";
                                ?>
                        </td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <!-- table detail -->

        </div>
    </div>
    <br>
    <br>
    <?php foreach ($get_id_ticket as $d) : ?>
        <div class="card">
            <div class="card-header">
                <h4 class="panel-title"> Action On <?= $d->update_date; ?> </h4>
            </div>
            <div class="card-body">
                <?= $d->action; ?>
            </div>

        </div>
    <?php endforeach; ?>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal created ticket -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModal">Update Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <?php foreach ($ticket as $t) : ?>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="idd" name="idd" value="<?= $t->id; ?>">
                        </div>
                        <div class="form-group">
                            <label for="problem">Problem/Subject</label>
                            <input type="text" class="form-control" id="problem_update" name="problem_update" value="<?= $t->problem; ?>">
                        </div>
                        <div class="form-group">
                            <label for="report_by">Report By</label>
                            <input type="text" class="form-control" id="report_by_update" name="report_by_update" value="<?= $t->report_by; ?>">
                        </div>
                        <div class="form-group">
                            <label for="action">Action</label>
                            <textarea name="action_update" id="ckeditor_ckeditor" class="ckeditor"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_update" id="category_update" class="form-control">
                                <option value="0">Uncategories</option>
                                <option value="1">Network</option>
                                <option value="2">Hardware</option>
                                <option value="3">General</option>
                                <option value="4">Software</option>

                                <?php 
                                // $category = "";
                                // if ($td->category == 1) {
                                //     $category = "Network";
                                // } else if ($td->category == 2) {
                                //     $category = "Hardware";
                                // } else if ($td->category == 3) {
                                //     $category = "Software";
                                // } else if ($td->category == 4) {
                                //     $category = "Software";
                                // }
                                // else{
                                //     $category ="Uncategories";  
                                // }
                                // echo "$category";
                                ?>
                                </option>
                            </select>
                        </div>
                        <?php
                            if($role_id == 1){
                        ?>
                        <div class="form-group">
                                
                            <label for="petugas">Petugas</label>
                            <select name="petugas_update" id="petugas_update" class="form-control">
                                <?php
                                foreach($petugas->result() as $p){
                                    echo "<option value='$p->id'>$p->name</option>";
                                }
                                    // <option>tes</option>
                                    ?>
                            </select>
                        </div>
                            <?php } ?>
                        <div class="form-group">
                            <label for="category">Status</label>
                            <select name="status_update" id="status_update" class="form-control">
                                <option value="">--Chose Status--</option>
                                <option value="8">On Progress</option>
                                <option value="5">Pending</option>
                            </select>
                        </div>
                    <?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="submit" id="add-row" class="btn btn-success">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal created ticket -->

<!-- modal closed -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Closed Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('user/closed/' . $t->id); ?>" method="post">
                    Do you really for closed this ticket .. ?
                    <input type="text" value="7" id="closed" name="closed">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" name="submit_closed" id="submit_closed" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal closed -->

<script>
    var closed = document.getElementById("status");
    $(document).ready(function(){
        $('#category_update').val('<?=$id_category?>');
    })
    if ('#status' == closed) {
        $('#tombol_update').hide();
        $('#tombol_closed').hide();
    }
</script>