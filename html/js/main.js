/*
 * jQuery File Upload Plugin JS Example 8.3.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

/*jslint nomen: true, regexp: true */
/*global $, window, blueimp */

$(function () {
    'use strict';

    // Initialize the jQuery File Upload widget:
    $('#fileupload').fileupload({
        // Uncomment the following to send cross-domain cookies:
        //xhrFields: {withCredentials: true},
		previewMaxWidth: 300,
        previewMaxHeight: 300,
        previewCrop: true,
        url: 'php/'
    });

    // Enable iframe cross-domain access via redirect option:
    $('#fileupload').fileupload(
        'option',
        'redirect',
        window.location.href.replace(
            /\/[^\/]*$/,
            '/cors/result.html?%s'
        )
    );

/*	
	$("#uploaddrop").bind('drop dragover', function (e) {
		e.preventDefault();
	});*/

});

$(document).ready(function () {
		
	$('#fileupload').bind('fileuploaddone', function (e, data) {
		//alert('hiiii.');
		$('#pictureDelete').css("display","block");
		setTimeout(function(){
		$('.template-download').find('td:eq(1)').css("display","none");
		$('.template-download').find('td:eq(2)').css("display","none");
		$('.template-download').find('td:eq(3)').css("display","none");},120);
	});
	
	$('#fileupload').bind('fileuploadchange', function (e, data) {
		//for limitting the upload size to one.
		if (data.files.length + $(".template-upload").size() > 1) {
			alert("Cannot add more than one file");
			return false;
		}			
		$('#uploaddrop').css("display","none");
	});
	
	$('#fileupload').bind('fileuploadadd', function (e, data) {
		//if file is already added then replace it with new file
		if (data.files.length + $(".template-upload").size() > 1) {
			//alert("Cannot add more than one file");				
			$('.template-upload').find('.cancel').click();
			//return false;
		}			
		$('#uploaddrop').css("display","none");
		
		//hiding preview name upload and cancel buttons.
		setTimeout(function(){
			$('.template-upload').find('td:eq(1)').css("display","none");
			$('.template-upload').find('td:eq(2)').css("display","none");
			$('.template-upload').find('td:eq(3)').css("display","none");
			},120)
	});
	
	$('button.cancel').click(function (e) {
		//jqXHR.abort();
		$('#uploaddrop').css("display","block");
		$('#pictureDelete').css("display","none");
	});
	
	$('#pictureDelete').click(function(){
		$('.template-download').find('.delete').click();
		$('#pictureDelete').css("display","none");
		$('#uploaddrop').css("display","block");
		
	});
	
	// for preventing default filebrowse property
	$('#fileupload').click(function(){
		return false;
	});		
	
	$('#fileupload').bind('fileuploaddrop', function (e, data) {			
		if($('#pictureDelete').css("display")!="none"){
			alert('Already uploaded an image. Please delete it before try new one.');
			return false;
		}
	});
			
	
});
