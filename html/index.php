<?php
require_once '../files/config/config.php';
?>
<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 8.6.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Picture Portal</title>        
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.css">
<!-- Bootstrap styles -->
<!--<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">-->
<!-- Generic page styles -->
<!--<link rel="stylesheet" href="css/style.css">-->
<!-- blueimp Gallery styles -->
<!--<link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">-->
<!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
<link rel="stylesheet" href="css/jquery.fileupload-ui.css">
<!-- CSS adjustments for browsers with JavaScript disabled -->
<!--<noscript>&lt;link rel="stylesheet" href="css/jquery.fileupload-ui-noscript.css"&gt;</noscript>-->
<style type="text/css">@import url(css/jquery.fileupload-ui.css);</style>
<style type="text/css">@import url(libcss/display_upload.css);</style>
</head>
<body>
<div id="wrapper">
<div class="container">
    
    <!-- The file upload form used as target for the file upload widget -->
    <form id="fileupload" action="" method="POST" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <!--<div class="span7">-->
                <!-- The fileinput-button span is used to style the file input field as button -->
                
                <button type="submit" class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel upload</span>
                </button>
               <span class="btn btn-success fileinput-button">
                   <!-- <i class="icon-plus icon-white"></i>
                    <span>Add files...</span>-->
                    <input type="file" name="files[]">
                </span>
                 <a id="pictureDelete" href="#" data-role="button" data-icon="delete" data-theme="c" data-iconpos="notext" style="float:right; display:none;margin-bottom: -20px;
    margin-right: -5px;">Delete</a>
                 <!-- The loading indicator is shown during file processing -->
                <span class="fileupload-loading"></span>
            <!--</div>-->
            <!-- The global progress information -->
            <div class="span5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="bar" style="width:0%;"></div>
                </div>
                <!-- The extended global progress information -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <br>    
</div>
<!-- The blueimp Gallery widget -->

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
                    <option value="0" selected>Select your colour...</option>
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
     <div id="contactus-modal" style="display:none;">

        <div id="contactus-inner">
            <?php  
                $query = "SELECT idcolor, namecolor, hexcolor FROM color";
                $result = mysql_query($query);
                if(mysql_affected_rows()){
                    while($datensatz = mysql_fetch_assoc($result)){
                    ?>	
                        <div style="float:left; margin:2px; cursor:pointer;width:30px; height:30px; background-color:<?php echo $datensatz['hexcolor']; ?>" onClick="showCurrentColor('<?php echo $datensatz['hexcolor']; ?>');">&nbsp;</div>
                    <?php    
                    }
                }
            ?>
        </div>    
    </div>
        </form>
    </div>    
    <a id="picTransfer" href="#" data-role="button" data-theme="a" data-corners="true">Save</a>
</div>
<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <p class="size">{%=o.formatFileSize(file.size)%}</p>
            {% if (!o.files.error) { %}
                <div class="progress progress-success progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="bar" style="width:0%;"></div></div>
            {% } %}
        </td>
       /* <td>
            {% if (!o.files.error && !i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start">
                    <i class="icon-upload icon-white"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="icon-ban-circle icon-white"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>*/
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnailUrl) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img class ="down-img-size" src="{%=file.url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
            </p>
            {% if (file.error) { %}
                <div><span class="label label-important">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td>
            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                <i class="icon-trash icon-white"></i>
                <span>Delete</span>
            </button>
			<a id="pictureDelete" href="#" data-role="button" data-icon="delete" data-theme="c" data-iconpos="notext">Delete</a>
            <input type="checkbox" name="delete" value="1">
        </td>
    </tr>
{% } %}
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script src="http://code.jquery.com/mobile/1.3.1/jquery.mobile-1.3.1.min.js"></script>

<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="js/load-image.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="js/blueimp-gallery.min.js"></script>
<script src="js/jquery.blueimp-gallery.min.js"></script>
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
<!-- The File Upload user interface plugin -->
<script src="js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="js/main.js"></script>
<script type="text/javascript" src="libjs/functions.js"></script>
<script>
function displayModal(){
	$('#contactus-modal').toggle();
}

function showCurrentColor(color){
	$('#color_dropdown option:first').val(color);
	$('#color_dropdown option:first').text(color);
	$('.dropdown span.selectOptions').text(color);
	displayModal();
}

function getSelectedValue(id) {
	return $("#" + id).find("dt a span.value").html();
}

function priceValidate(value){
	if( !IsNumeric (value)){
		if(value){
			alert('Please enter a valid price!');
			$('#price').val('')
		}
	}
}

function IsNumeric(input){
	return (input - 0) == input && (input+'').replace(/^\s+|\s+$/g, "").length > 0;
}

$(document).bind('click', function(e) {
	var $clicked = $(e.target);
	if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});

$(document).ready( function(){
		
	$("#color_dropdown").click(function() {
			displayModal();
	});  
	
	$('#picTransfer').click(function(){finalStorage();});
	
	/*-----get sub category by category id------*/
	$('#category').change(function(){
		var selected_category	=	parseInt($(this).val());
		$.ajax({
		  url: "functions.php",
		  type: "POST",
		  data: "selected_category="+selected_category,
		  success: function(data){
			 $("#subcategory").html(data).selectmenu('refresh', true);
			 $('#subcategory').selectmenu('enable');
			 if(selected_category < 1){		
				$('#subcategory').selectmenu('disable');
			 }
		  }
	   });
		
	});
	/*-----//get sub category by category id------*/
	
	var sugList = $("#suggestions");
	$("#brandSearch").on("input", function(e) {
		var text = $(this).val();
		if(text.length < 1) {
			sugList.html("");
			sugList.listview("refresh");
		} else {
			$.get("functions.php?method=getSuggestions", {search:text}, function(res,code) {
				var str = "";
				for(var i=0, len=res.length; i<len; i++) {
					str += "<li>"+res[i]+"</li>";
				}
				sugList.html(str);
				sugList.listview("refresh");
				console.dir(res);
			},"json");
		}
	});
});
</script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE8+ -->
<!--[if gte IE 8]>
<script src="js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
</body> 
</html>
