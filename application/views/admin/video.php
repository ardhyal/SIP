<div class="content">
    <?php echo form_open_multipart('video/addvideo') ?>
    <div class="form-group">
        <label for="uploadvideo"> Upload Video : </label>
        <input type="file" name="video" id="video"></div>
    <div class="form-group">
        <button type="submit" class="btn btn-default">Submit</button>
    </div>
    <?php echo form_close() ?>  
    
    <div class="form-group">
        <object width="550" height="310">
            <param name="src" value="<?php echo base_url()?>/assets/video/big_buck_bunny_720p_5mb.wmv">
            <param name="autoplay" value="false">
            <param name="controller" value="true">
            <param name="bgcolor" value="#333333">
            <embed type="video/wmv" src="<?php echo base_url()?>/assets/video/big_buck_bunny_720p_5mb.wmv" autostart="false" 
                   loop="false" width="550" height="310" controller="true" bgcolor="#333333"></embed>
        </object>
    </div>
</div>  

