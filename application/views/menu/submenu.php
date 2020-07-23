<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <?= $this->session->flashdata('deleted'); ?>

            <?= $this->session->flashdata('edited_submenu'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Add New Submenu</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['title']; ?></td>
                            <td><?= $sm['menu']; ?></td>
                            <td><?= $sm['url']; ?></td>
                            <td><?= $sm['icon']; ?></td>
                            <td>
                                <?php if ($sm['is_active'] == 1) {
                                        echo "Actived";
                                    } elseif ($sm['is_active'] == 2) {
                                        echo "Non Active";
                                    }
                                    ?>
                            </td>
                            <td>
                                <!-- <a href="" class="badge badge-success">Edit</a> -->
                                <button onclick="detail(<?= $sm['id']; ?>)" class="badge badge-success">Edit</button>
                                <a href="<?= base_url() ?>menu/deletemenu/<?= $sm['id']; ?>" class="badge badge-danger" onclick="return confirm('Yakin ?');">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModal">Add New SubMenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php base_url('menu/submenu'); ?>" method="post">
                <!--  -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="SubMenu name">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="SubMenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="SubMenu Icon">
                    </div>
                    <div class="form-group">

                        <select name="is_active" id="is_active" class="form-control">
                            <option value="" readonly>Select Status</option>
                            <option value="1">Active</option>
                            <option value="2">Non Active</option>
                        </select>
                        <!-- <input type="checkbox" class="form-check-input" value="1" id="is_active" name="is_active" checked>
                            <label for="is_active" class="form-check-label">
                                Active ?
                            </label> -->

                    </div>
                    <!--  -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="submenuedit" tabindex="-1" role="dialog" aria-labelledby="submenueditlabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submenueditlabel">Edit SubMenu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('menu/submenu_edit'); ?>" method="post">
                <!--  -->
                <input type="text" name="id-edit" id="id-edit">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title_edit" name="title_edit" placeholder="SubMenu name">
                    </div>
                    <div class="form-group">
                        <select name="menu_id_edit" id="menu_id_edit" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url_edit" name="url_edit" placeholder="SubMenu url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon_edit" name="icon_edit" placeholder="SubMenu Icon">
                    </div>
                    <div class="form-group">
                        <select name="is_active_edit" id="is_active_edit" class="form-control">
                            <option value="" readonly>Select Status</option>
                            <option value="1">Active</option>
                            <option value="2">Non Active</option>
                        </select>
                    </div>
                    <!--  -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function detail(id) {
        $('#submenuedit').modal('show');
        $('#id-edit').val(id);
        var param = "<?= current_url(); ?>/" + id;

        console.log(param);

        $.ajax({


            url: param,
            dataType: 'JSON',
            success: function(data) {
                console.log(data);
                $('#title_edit').val(data.title);
                $('#menu_id_edit').val(data.menu_id);
                $('#url_edit').val(data.url);
                $('#icon_edit').val(data.icon);
                $('#is_active_edit').val(data.is_active);

            }


        });
    }
</script>