function toggleDBAttributes() {
    var dropDown = $(this).get(0);
    var selectedInput = dropDown.options[dropDown.selectedIndex].text;

    if (selectedInput === 'DIT') {
        $('#dbAttributes').prop('disabled', false);
    } else {
        $('#dbAttributes').prop('disabled', true);
    }
}

function disableOtherInstructionForm(id) {
    var otherForms = $('.editInstruction').find('tbody').children().not('#'+id);
    otherForms.find('#supportTeamID').prop('disabled', true);
    otherForms.find('#environmentID').prop('disabled', true);
    otherForms.find('#instruction').prop('disabled', true);
    otherForms.find('#dbCodeReviewLink').prop('disabled', true);
    otherForms.find('#dbCoreTables').prop('disabled', true);
    otherForms.find('#dbRevisionNum').prop('disabled', true);
    otherForms.find('#addInstructionButton').prop('disabled', true);
    otherForms.find('#saveEditedInstructionButton').prop('disabled', true);
}

function enableInstructionForm() {
    $('#instructionForm').find('#supportTeamID').prop('disabled', false);
    $('#instructionForm').find('#environmentID').prop('disabled', false);
    $('#instructionForm').find('#instruction').prop('disabled', false);
    $('#instructionForm').find('#dbCodeReviewLink').prop('disabled', false);
    $('#instructionForm').find('#dbCoreTables').prop('disabled', false);
    $('#instructionForm').find('#dbRevisionNum').prop('disabled', false);
    $('#instructionForm').find('#addInstructionButton').prop('disabled', false);
}

$('#supportTeamID').on('change', toggleDBAttributes);

$(document).on('click', '#editInstructionButton', function() {
    var id = $(this).parents('tr').attr('id');
    $('#'+id).empty();

    $.ajax({
        url: '/instruction/'+ id,
        type: 'GET',
        dataType: 'json',
        success: function(response){
            enableInstructionForm();
            $('#'+id).html($('#instructionForm').prop('innerHTML'));
            if (response.db_code_review_link) {
                $('#'+id).find('#dbAttributes').prop('disabled', false);
            } else {
                $('#'+id).find('#dbAttributes').prop('disabled', true);
            }
            $('#'+id).find('#supportTeamID').val(response.support_team_id);
            $('#'+id).find('#environmentID').val(response.environment_id);
            $('#'+id).find('#instruction').val(response.instruction);
            $('#'+id).find('#dbCodeReviewLink').val(response.db_code_review_link);
            $('#'+id).find('#dbCoreTables').val(response.db_affected_core_table);
            $('#'+id).find('#dbRevisionNum').val(response.db_revision_num);
            $('#'+id).find('#addInstructionButton').attr('id', 'saveEditedInstructionButton');
            $('#'+id).find('#saveEditedInstructionButton').removeClass('btn-primary').addClass('btn-info');
            $('#'+id).find('#saveEditedInstructionButton').children().removeClass('oi-plus').addClass('oi-check');
            $('.addInstruction').addClass('editInstruction').removeClass('addInstruction');
            $('.editInstruction').attr('action', '/instruction/'+id);
            $('.editInstruction').append('<input name="_method" type="hidden" value="PUT">');
            disableOtherInstructionForm(id);
            $('#'+id).find('#supportTeamID').on('change', toggleDBAttributes);
        },
        error: function(){
            console.log('failed getting instruction');
        }
    });

});

$(document).on('click', '#deleteInstructionButton', function() {
    var action = "/instruction/" + $(this).parents('tr').attr('id');
    $('#deleteInstructionModal').find('form').attr('action', action);
});
