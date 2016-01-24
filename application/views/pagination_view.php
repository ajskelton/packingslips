<div class="container">
    <div class="row">
        <div class="col-md-12 well">
            <h3>Search Packing Slips</h3>
        <?php 
        $attr = array("class" => "form-horizontal", "role" => "form", "id" => "form1", "name" => "form1");
        echo form_open("pagination/search", $attr);?>
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" id="slip_name" name="slip_name" placeholder="Search Packing Slips..." type="text" value="<?php echo set_value('slip_name'); ?>" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search" />
                        <a href="<?php echo base_url(). "index.php/pagination/index"; ?>" class="btn btn-primary">Show All</a>
                    </div>
                </div>
        <?php echo form_close(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 bg-border">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>Slip ID</th>
                    <th>Slip Name</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $slip_id = 0;
                for ($i = 0; $i < count($slips); ++$i) {
                    if($slip_id == $slips[$i]['slip_id']) {
                        continue;
                    }
                ?>
                <tr>
                    <td><?php echo $slips[$i]['slip_id']; ?></td>
                    <td><?php echo "<a href='" . site_url('slips') . "/" . $slips[$i]['slip_id'] . "'>" . $slips[$i]['slip_description']; ?></td>
                    <td><?php echo $slips[$i]['slip_date']; ?></td>
                    <td><?php echo $slips[$i]['slip_status']; ?></td>
                </tr>
                <?php
                    $slip_id = $slips[$i]['slip_id'];
                 } ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </div>
    </div>
</div>
