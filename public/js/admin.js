$(document).on('click', '#editProjectButton', function() {
    var action = "/project/" + $(this).parents('tr').attr('id');
    $('#editProjectModal').find('form').attr('action', action);
    $('.name').val($(this).parents('tr').children(':nth-child(1)').text());
    $('.repo_link').val($(this).parents('tr').children(':nth-child(2)').text());
    $('.db_name').val($(this).parents('tr').children(':nth-child(3)').text());
    $('.db_repo_link').val($(this).parents('tr').children(':nth-child(4)').text());
});

$(document).on('click', '#deleteProjectButton', function() {
    var action = "/project/" + $(this).parents('tr').attr('id');
    $('#deleteProjectModal').find('form').attr('action', action);
    $('.modal-title.delete').text($(this).parents('tr').children(':nth-child(1)').text());
});

$('.addDeveloper').submit( function(e) {
    e.preventDefault();
    $.ajax({
        url: '/teammate',
        type: 'POST',
        data: $('.addDeveloper').serialize(),
        dataType: 'json',
        success: function(response){
            var newMember = '<li id="'+response.id+'" class="list-group-item">'+
                                '<div class="row">'+
                                    '<div class="col">'+
                                        response.name+
                                        '<div class="float-right">'+
                                            '<button id="deleteTeammate" class="btn btn-danger btn-outline-danger btn-sm">'+
                                                '<span class="oi oi-trash"></span>'+
                                            '</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</li>';
   
            $('#inputDEV').val('');               
            if ($('#devList li:last').prev().length==0) {
                $('#devList li:last').before(newMember);
            } else {
                $('#devList li:last').prev().after(newMember);
            }
        },
        error: function(response){
            console.log('error adding teammate '+response.name);
        }
    });
});

$('.addTester').submit( function(e) {
    e.preventDefault();
    $.ajax({
        url: '/teammate',
        type: 'POST',
        data: $('.addTester').serialize(),
        dataType: 'json',
        success: function(response){
            var newMember = '<li id="'+response.id+'" class="list-group-item">'+
                                '<div class="row">'+
                                    '<div class="col">'+
                                        response.name+
                                        '<div class="float-right">'+
                                            '<button id="deleteTeammate" class="btn btn-danger btn-outline-danger btn-sm">'+
                                                '<span class="oi oi-trash"></span>'+
                                            '</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</li>';

            $('#inputQA').val('');
            if ($('#qaList li:last').prev().length==0) {
                $('#qaList li:last').before(newMember);
            } else {
                $('#qaList li:last').prev().after(newMember);
            }
        },
        error: function(response){
            console.log('error adding teammate '+response.name);
        }
    });
});

$(document).on('click', '#deleteTeammate', function() {
    var id = $(this).parents('.list-group-item:first').attr('id');
    var index = $('.teammatesList').find('.list-group-item').index($('.teammatesList').find('#'+id+'.list-group-item'));
    $.ajax({
        url: '/teammate/'+ id,
        type: 'DELETE',
        data: $('#_token').serialize(),
        dataType: 'json',
        success: function(){
            console.log('successfully deleted teammate');
        },
        error: function(){
            console.log('error deleting teammate');
        }
    });
    $(".teammatesList").find('.list-group-item').eq(index).remove();
});

$('.addWorkingGroup').submit( function(e) {
    e.preventDefault();
    $.ajax({
        url: '/working_group',
        type: 'POST',
        data: $('.addWorkingGroup').serialize(),
        dataType: 'json',
        success: function(response){
            var newWG = '<li id="'+response.id+'" class="list-group-item">'+
                        '<div class="row">'+
                            '<div class="col">'+
                                response.name+
                                '<div class="float-right">'+
                                    '<button id="deleteWorkingGroup" class="btn btn-danger btn-outline-danger btn-sm">'+
                                        '<span class="oi oi-trash"></span>'+
                                    '</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</li>';

            $('#inputWG').val('');
            if ($('#wgList li:last').prev().length==0) {
                $('#wgList li:last').before(newWG);
            } else {
                $('#wgList li:last').prev().after(newWG);
            }
        },
        error: function(response){
            console.log('error adding working group '+response.name);
        }
    });
});

$(document).on('click', '#deleteWorkingGroup', function() {
    var id = $(this).parents('.list-group-item:first').attr('id');
    var index = $('#wgList').find('.list-group-item').index($('#wgList').find('#'+id+'.list-group-item'));
    $.ajax({
        url: '/working_group/'+ id,
        type: 'DELETE',
        data: $('#_token').serialize(),
        dataType: 'json',
        success: function(){
            console.log('successfully deleted working group');
        },
        error: function(){
            console.log('error deleting working group');
        }
    });
    $('#wgList').find('.list-group-item').eq(index).remove();
});

$('.addEnvironment').submit( function(e) {
    e.preventDefault();
    $.ajax({
        url: '/environment',
        type: 'POST',
        data: $('.addEnvironment').serialize(),
        dataType: 'json',
        success: function(response){
            var newEnv = '<li id="'+response.id+'" class="list-group-item">'+
                            '<div class="row">'+
                                '<div class="col">'+
                                    response.name+
                                    '<div class="float-right">'+
                                        '<button id="deleteEnvironment" class="btn btn-danger btn-outline-danger btn-sm">'+
                                            '<span class="oi oi-trash"></span>'+
                                        '</button>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</li>';

            $('#inputENV').val('');
            if ($('#envList li:last').prev().length==0) {
                $('#envList li:last').before(newEnv);
            } else {
                $('#envList li:last').prev().after(newEnv);
            }
        },
        error: function(response){
            console.log('error adding environment '+response.name);
        }
    });
});

$(document).on('click', '#deleteEnvironment', function() {
    var id = $(this).parents('.list-group-item:first').attr('id');
    var index = $('#envList').find('.list-group-item').index($('#envList').find('#'+id+'.list-group-item'));
    $.ajax({
        url: '/environment/'+ id,
        type: 'DELETE',
        data: $('#_token').serialize(),
        dataType: 'json',
        success: function(){
            console.log('successfully deleted environment');
        },
        error: function(response){
            if (response.responseJSON.message.indexOf('SQLSTATE[23000]') !== -1) {
                alert('Tickets are using this environment. It cannot be deleted.');
            }
            console.log('error deleting environment');
        }
    });
    $('#envList').find('.list-group-item').eq(index).remove();
});

$('.addSupportTeam').submit( function(e) {
    e.preventDefault();
    $.ajax({
        url: '/support_team',
        type: 'POST',
        data: $('.addSupportTeam').serialize(),
        dataType: 'json',
        success: function(response){
            var newST = '<li id="'+response.id+'" class="list-group-item">'+
                        '<div class="row">'+
                            '<div class="col">'+
                                response.name+
                                '<div class="float-right">'+
                                    '<button id="deleteSupportTeam" class="btn btn-danger btn-outline-danger btn-sm">'+
                                        '<span class="oi oi-trash"></span>'+
                                    '</button>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</li>';

            $('#inputST').val('');
            if ($('#stList li:last').prev().length==0) {
                $('#stList li:last').before(newST);
            } else {
                $('#stList li:last').prev().after(newST);
            }
        },
        error: function(response){
            console.log('error adding support team '+response.name);
        }
    });
});

$(document).on('click', '#deleteSupportTeam', function() {
    var id = $(this).parents('.list-group-item:first').attr('id');
    var index = $('#stList').find('.list-group-item').index($('#stList').find('#'+id+'.list-group-item'));
    $.ajax({
        url: '/support_team/'+ id,
        type: 'DELETE',
        data: $('#_token').serialize(),
        dataType: 'json',
        success: function(){
            console.log('successfully deleted support team');
        },
        error: function(response){
            if (response.responseJSON.message.indexOf('SQLSTATE[23000]') !== -1) {
                alert('Tickets are using this support team. It cannot be deleted.');
            }
            console.log('error deleting support team');
        }
    });
    $('#stList').find('.list-group-item').eq(index).remove();
});
