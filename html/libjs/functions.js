//--- Upload -------------------------------------------------------------------
function finalStorage() {
    var options = {};
    
    if(!$('#uploaddrop').children().length > 0){
        $('#uploadmessage').empty().append('Bitte wähle ein Bild aus.');
        return;
    }
    options['src'] = $('#uploaddrop img').attr('src');

    $('#options select').each(function() {

        if ($(this).val() === '0') {
            $('#uploadmessage').empty().append('Bitte wähle sie alle Optionen aus.');
            return;
        }
        options[$(this).attr('id')] = $(this).val();
    });
    $.mobile.showPageLoadingMsg();
    $.ajax({
        type: 'POST',
        url: 'uploadFinalStorage.php',
        async: false,
        data: {options:options},
        success: function() {
            //$('#uploadmessage').empty().append(data.echoarray.meldung);
        }
    });
    $.mobile.hidePageLoadingMsg();
}


function setUploadFkt()
{
    $('#uploaddrop').on(
            'dragover',
            function(e) {
                e.preventDefault();
                e.stopPropagation();
            }
    );

    $('#uploaddrop').on(
            'dragenter',
            function(e) {
                e.preventDefault();
                e.stopPropagation();
                //$('#uploaddrop').css({'border':'2px solid #09F'});
            }
    );

    $('#uploaddrop').on(
            'drop',
            function(e) {
				alert('drompppp');
                if (e.originalEvent.dataTransfer) {
                    if (e.originalEvent.dataTransfer.files.length) {
                        e.preventDefault();
                        e.stopPropagation();
                        //$('#uploaddrop').css({'border':'1px solid #ccc'});
                        upload(e.originalEvent.dataTransfer.files);
                    }
                }
            }
    );
}

function upload(files) {
	

    var allowed = ["jpeg", "png", "pjpeg", "gif"];
    var found = false;
    allowed.forEach(function(extension) {
        if (files[0].type.match('image/' + extension)) {
            found = true;
        }
    });
    if (!found)
    {
        $('#uploadmessage').empty().append('Nur die Formate "jpeg", "gif", "png" sind erlaubt.');
        return;
    }

    if (files[0].size > 2000000)
    {
        $('#uploadmessage').empty().append('Die Datei ist zu groß (Max 2MB).');
        return;
    }

    var data = new FormData();
    data.append('file', files[0]);
	
	alert('hii'+files[0].path);	
	return false;
	
    $.ajax({
        url: 'uploadPicture.php',
        dataType: 'json',
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        beforeSend: function() {
            $.mobile.showPageLoadingMsg();
        },
        success: function(data) {

            if (data.echoarray.imgdata.length > 0)
            {
                $('#uploaddrop').empty()
                        .append($(data.echoarray.imgdata).hide()
                        .fadeIn(3000)
                        );
            }

            $('#uploadmessage').empty().append(data.echoarray.meldung);
            $.mobile.hidePageLoadingMsg();
        }
    });
}