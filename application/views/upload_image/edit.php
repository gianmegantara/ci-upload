<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Image</title>
    <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>">

    <style>
        #image-preview {
            height: 400px;
            position: relative;
            overflow: hidden;
            background-color: #ffffff;
            color: #ecf0f1;
        }
        #image-preview input {
            line-height: 200px;
            font-size: 200px;
            position: absolute;
            opacity: 0;
            z-index: 10;
        }
        #image-preview label {
            position: absolute;
            z-index: 5;
            opacity: 0.8;
            cursor: pointer;
            background-color: #bdc3c7;
            width: 200px;
            height: 50px;
            font-size: 20px;
            line-height: 50px;
            text-transform: uppercase;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            text-align: center;
        }
    </style>
  </head>

  <body>

    <div class="container">
      <div class="col-md-4 col-md-offset-4">
        <?php echo form_open_multipart('uploadimage/update/'.$id); ?>
          <div class="form-group">
            <?php echo form_label('Nama File', 'namaFile'); ?>
            <?php echo form_error('nama_file'); ?>
            <?php
                $data = array('type' => 'text',
                              'name' => 'nama_file',
                              'value' => set_value('nama_file', $nama_file),
                              'class' => 'form-control',
                              'id' => 'namaFile',
                              'placeholder' => 'Nama File',
                              'autofocus' => 'autofocus'
                );
                echo form_input($data);
            ?>
          </div>
          <div class="form-group">
            <label>File Foto</label> <span class="label label-success">Ukuran maksimal 2 MB. Format file: jpeg, jpg, dan png.</span>
            <?php echo form_error('filefoto'); ?>
            <!-- style:background-image is the main actor to show preview image while edit  -->
            <div id="image-preview" style="background-image: url(<?php echo base_url('images/'.$filefoto); ?>)">
                <label for="image-upload" id="image-label">Choose File</label>
                <input type="file" name="filefoto" id="image-upload"/>
            </div>
          </div>
          <?php echo anchor(site_url('uploadimage'), 'Kembali', 'class="btn btn-default"'); ?>
          <?php echo form_submit('submit', 'Ubah', 'class="btn btn-warning"'); ?>
          <?php echo form_hidden('id', $id); ?>
        <?php echo form_close(); ?>
      </div>
    </div>

    <script src="<?php echo base_url('asset/js/jquery.min.js'); ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>" charset="utf-8"></script>
    <script src="<?php echo base_url('asset/js/jquery.uploadPreview.min.js'); ?>" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
          $.uploadPreview({
              input_field: "#image-upload",
              preview_box: "#image-preview",
              label_field: "#image-label"
          });
      });
    </script>

  </body>
</html>
