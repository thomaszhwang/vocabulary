var audioElement;
var is_global_shortcuts_enabled;

$(document).ready(function() {
    $(document).on('click', '.new_trash_click', function() {
        $(this).parent().remove();
        $.get('db.php?qtype=delete&word=' + $(this).siblings('span').text())
    })

    $(document).on('keydown', '#txt_new_voc', function(e) {
        keys = {esc: 27};

        var keyCode = e.keyCode;
        switch (keyCode) {
            case keys.esc:
                $('#new_voc_dia').hide();
                $("#txt_new_voc").val("");
                break;
        }
    })

    $('input[type="text"]').focusout(function() {
        is_global_shortcuts_enabled = true;
    })

    $('input[type="text"]').focus(function() {
        is_global_shortcuts_enabled = false;
    })

    audioElement = document.createElement('audio');
    is_global_shortcuts_enabled = true;

	load_next_word();

	$(document).keydown(function(e) {
        if(is_global_shortcuts_enabled) {
            keys = {left: 37, up: 38, right: 39, down: 40, n: 78};
            var keyCode = e.keyCode;
            switch (keyCode) {
                case keys.left:
                    $.get('db.php?qtype=memorize&word=' + $('#word_display_span').text() + '&is_correct=0');
                    load_next_word();
                    break;
                case keys.up:
                    window.open('http://dict.youdao.com/search?q=' + $('#word_display_span').text() + '&keyfrom=dict.index', '_blank');
                    break;
                case keys.right:
                    $.get('db.php?qtype=memorize&word=' + $('#word_display_span').text() + '&is_correct=1');
                    load_next_word();
                    break;
                case keys.down:
                    if (audioElement.src.length == 61) audioElement.play();
                    break;
                case keys.n:
                    $('#new_voc_dia').show();
                    $("#txt_new_voc").focus();
                    return false;
            }
        }
	})

    $('#check_button').click(function(){
        $.get('db.php?qtype=memorize&word=' + $('#word_display_span').text() + '&is_correct=1');
        load_next_word();
    });

    $('#cross_button').click(function(){
        $.get('db.php?qtype=memorize&word=' + $('#word_display_span').text() + '&is_correct=0');
        load_next_word();
    });

	$("#dictionary").hover(
		function() {
			$("#dictionary").css("color", "white");
			$("#dictionary").css("border-color", "white");
		},
		function() {
			$("#dictionary").css("color", "#838383");
			$("#dictionary").css("border-color", "#838383");
		}
	);
});

function load_next_word() {
    $.get('db.php?qtype=next', function(data) {
        var s = data.split('\\t');
        $('#word_display_span').html(s[0]);
        $("#dictionary_link").attr('href', 'http://dictionary.reference.com/browse/' + s[0]);
        audioElement.setAttribute('src', s[1]);
    })
 
    $.get('db.php?qtype=progress&start_time=' + get_today(), function(data) {
        var s = data.split('\\t');
        $('#progress_correct_count').html(s[0]);
        $('#progress_wrong_count').html(s[1]);
    })
}
 
function get_today() {
    var today = new Date();
    today = new Date(today.getFullYear(), today.getMonth(), today.getDate(), 0, 0, 0, 0);

    var dd = today.getUTCDate();
    var mm = today.getUTCMonth() + 1;
    var yyyy = today.getUTCFullYear();
    var hh = today.getUTCHours();
 
    if(dd < 10) dd = '0' + dd;
    if(mm < 10) mm = '0' + mm;
    if(hh < 10) hh = '0' + hh;
 
    return yyyy + '-' + mm + '-' + dd + ' ' + hh + ':00';
}

function enter_new_word(new_word) {
    $('#txt_new_voc').val('');
    
    $.get('db.php?qtype=new&word=' + new_word, function() {
        $('#new_voc_dia ul').prepend("<li><span>" + new_word + "</span><a class='new_trash_click' href='#'><img src='img/d1.png'/></a></li>");
        if ($('#new_voc_dia ul').children().length == 4) $('#new_voc_dia li:last').remove();
    });
}
