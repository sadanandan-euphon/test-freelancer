<?php
require_once '../files/config/config.php';


//Test Line

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Picture Portal</title>        
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>
        
        
        <script src="js/vendor/jquery.ui.widget.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="http://blueimp.github.io/JavaScript-Load-Image/js/load-image.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="http://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="js/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="js/jquery.fileupload.js"></script>
        <!-- The File Upload processing plugin -->
        <script src="js/jquery.fileupload-process.js"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="js/jquery.fileupload-image.js"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="js/jquery.fileupload-audio.js"></script>
        <!-- The File Upload video preview plugin -->
        <script src="js/jquery.fileupload-video.js"></script>
        <!-- The File Upload validation plugin -->
        <script src="js/jquery.fileupload-validate.js"></script>
        
        
       <!-- <script type="text/javascript" src="libjs/functions.js"></script>-->
        <style type="text/css">@import url(css/jquery.fileupload-ui.css);</style>
		<style type="text/css">@import url(libcss/display_upload.css);</style>
    </head>
<body>
<div id="wrapper">
	 <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <!--<span>Add files...</span>-->
        <!-- The file input field used as target for the file upload widget -->
        <input id="fileupload" type="file" name="files[]">
    </span>
    <br>
    <br>
    <!-- The global progress bar -->
    <div id="progress" class="progress progress-success progress-striped">
        <div class="bar"></div>
    </div>
    <!-- The container for the uploaded files -->
    <div id="files" class="files"></div>
    <br>
    
    <div id="uploaddrop" data-role="content" data-theme="a">
        Drop your picture here
    </div>
    <div id="uploadmessage" data-role="content" data-theme="a">
        message area
    </div>
    <div id="options">
        <form>
            <!--Category-->

            <select id="category" name="category"
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="false"
                    >
                <option value="0" selected>Select your category...</option>
                <?php
                    $query = "SELECT idcategory, namecategory FROM category";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<option value="'.$datensatz['idcategory'].'">'.$datensatz['namecategory'].'</option>';
                        }
                    }
                ?>
            </select> 

            <!--Category-->

            <select id="subcategory"
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="false"
                    disabled
                    >
                <option value="0" selected>Select your subcatecory...</option>
                <?php
                    $query = "SELECT idsubcategory, namesubcategory FROM subcategory";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<option value="'.$datensatz['idsubcategory'].'">'.$datensatz['namesubcategory'].'</option>';
                        }
                    }
                ?>
            </select> 

            <!--City-->

            <select id="city"
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="false"
                    >
                <option value="0" selected>Select your city...</option>
                <?php
                    $query = "SELECT idcity, namecity FROM city";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<option value="'.$datensatz['idcity'].'">'.$datensatz['namecity'].'</option>';
                        }
                    }
                ?>
            </select> 

            <!--Shop-->

            <select id="shop" 
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="false"
                    >
                <option value="0" selected>Select your Shop...</option>
                <?php
                    $query = "SELECT idshop, nameshop FROM shop";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<option value="'.$datensatz['idshop'].'">'.$datensatz['nameshop'].'</option>';
                        }
                    }
                ?>
            </select> 
<br>
            <!--Brand-->
            <div data-demo-html="true">
				<ul data-role="listview" data-filter="true" data-filter-reveal="true" data-filter-placeholder="Brand...">
                <?php
                    $query = "SELECT idbrand, namebrand FROM brand";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<li><a href="">'.$datensatz['namebrand'].'</a></li>';
                        }
                    }
                ?>
				
				</ul>
			</div>
          
            <input type="text" name="price" id="price" value=""  placeholder="Price..." data-mini="true" onBlur="priceValidate(this.value);" />
<!-- color -->
 <dl class="dropdown">
        
        
        <select id="color_dropdown"
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="true"
                    >
                    <option value="">'.$datensatz['nameshop'].'</option>
                    </select>
        </dt>
        <dd>
            <ul>
                <li><span class="color" style="background-color:Red; float:left;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </li>
                <li> <span class="color" style="background-color:Green; float:left;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </li>
                <li><span class="color" style="background-color:Black; float:left;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </li>
                <li><span class="color" style="background-color:White; float:left;">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </li>
            </ul>
        </dd>
    </dl>
     <?php /*?>  <select id="shop" 
                    class="selectOptions"
                    data-corners="false"
                    data-theme="b"
                    data-native-menu="false"
                    >
                <option value="0" selected>Select your Shop...</option>
                <?php
                    $query = "SELECT idcolor,namecolor,hexcolor FROM color";
                    $result = mysql_query($query);
                    if(mysql_affected_rows())
                    {
                        while($datensatz = mysql_fetch_assoc($result))
                        {
                            echo '<option value="'.$datensatz['hexcolor'].'"><div style=" background-color:'.$datensatz['hexcolor'].';height:20px; width:20px; ">'.$datensatz['hexcolor'].'</div></option>';
                        }
                    }
                ?>
            </select><?php */?>
        </form>
    </div>
    <a id="picTransfer" href="#" data-role="button" data-theme="a" data-corners="true">Upload...</a>
</div>
<script>
/*jslint unparam: true, regexp: true */
/*global window, $ */
$(function () {
    'use strict';
	var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : 'server/php/',
        uploadButton = $('#picTransfer')
            .addClass('btn')
            .prop('disabled', true)
            .text('Processing...')
            .on('click', function () {
                var $this = $(this),
                    data = $this.data();
                $this
                    .off('click')
                    .text('Abort')
                    .on('click', function () {
                        $this.remove();
                        data.abort();
                    });
                data.submit().always(function () {
                    $this.remove();
                });
            });
			
	/*$("#uploaddrop").bind('drop dragover', function (e) {
		e.preventDefault();
	});*/
			
	$('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        autoUpload: false,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: 5000000, // 5 MB
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator.userAgent),
        previewMaxWidth: 100,
        previewMaxHeight: 100,
        previewCrop: true
    }).on('fileuploadadd', function (e, data) {
        data.context = $('<div/>').appendTo('#files');
        $.each(data.files, function (index, file) {
            var node = $('<p/>')
                    .append($('<span/>').text(file.name));
            if (!index) {
                node
                    .append('<br>')
                    .append(uploadButton.clone(true).data(data));
            }
            node.appendTo(data.context);
        });
    }).on('fileuploadprocessalways', function (e, data) {
        var index = data.index,
            file = data.files[index],
            node = $(data.context.children()[index]);
        if (file.preview) {
            node
                .prepend('<br>')
                .prepend(file.preview);
        }
        if (file.error) {
            node
                .append('<br>')
                .append(file.error);
        }
        if (index + 1 === data.files.length) {
            data.context.find('button')
                .text('Upload')
                .prop('disabled', !!data.files.error);
        }
    }).on('fileuploadprogressall', function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css(
            'width',
            progress + '%'
        );
    }).on('fileuploaddone', function (e, data) {
        $.each(data.result.files, function (index, file) {
            var link = $('<a>')
                .attr('target', '_blank')
                .prop('href', file.url);
            $(data.context.children()[index])
                .wrap(link);
        });
    }).on('fileuploadfail', function (e, data) {
        $.each(data.result.files, function (index, file) {
            var error = $('<span/>').text(file.error);
            $(data.context.children()[index])
                .append('<br>')
                .append(error);
        });
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
		
		
	$('#picTransfer').click(function(){
		alert('hii..');	
		$('#fileupload').fileupload();
	});
});
</script>
</body>
</html>
