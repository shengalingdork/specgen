$('.release-tab').on('click', function () {
    $(this).parents().siblings().children().find('.release-tab').removeClass('active').removeClass('show');
    $(this).parent().siblings().children().removeClass('active').removeClass('show');

    var otherReleaseTab;
    if ($(this).attr('id').search('project') !== -1) {
        otherReleaseTab = $(this).attr('id').replace('project-', 'wg-');
    } else {
        otherReleaseTab = $(this).attr('id').replace('wg-', 'project-');
    }

    $('#'+otherReleaseTab).addClass('active').parents('.collapse').addClass('show');
});

$('a.navigation').on('click', function () {
    if ($('a.navigation').hasClass('collapsible-close')) {
        $('a.navigation').removeClass('collapsible-close').addClass('collapsible-open');
        $(this).children().removeClass('oi-chevron-right').addClass('oi-chevron-bottom');
    } else {
        $('a.navigation').removeClass('collapsible-open').addClass('collapsible-close');
        $(this).children().removeClass('oi-chevron-bottom').addClass('oi-chevron-right');
    }
})

$(document).on('click', '#editReleaseButton', function() {
    var releaseID = $(this).parents('.release-content').attr('id');
    $('#editReleaseModal').find('form').attr('action', '/release/'+releaseID);
    $.ajax({
        url: '/release/' + releaseID,
        type: 'GET',
        success: function(response) {
            $('#selectWG option[value="' + response.working_group_id +'"]').prop('selected', true);
            $('#selectProject option[value="' + response.project_id +'"]').prop('selected', true);
            $('#releaseName').val(response.name);
            var startDateTime = response.start_deployment.split(' ');
            var endDateTime = response.end_deployment.split(' ');
            $('#startDate').val(startDateTime[0]);
            $('#startTime').val(startDateTime[1]);
            $('#endDate').val(endDateTime[0]);
            $('#endTime').val(endDateTime[1]);
        },
        error: function() {
            console.log('error fetching release');
        }
    });
});

$(document).on('click', '#deleteReleaseButton', function() {
    var releaseID = $(this).parents('.release-content').attr('id');
    var releaseName = $(this).parents('.optionsCard').find('h5').text().split(' ')[0];
    $('#deleteReleaseModal').find('form').attr('action', '/release/'+releaseID);
    $('#deleteReleaseModal').find('.modal-title').text(releaseName);
});

function saveRiskAndAssessment(field, value, releaseID) {
    var data = { _token: $('#_token').val() };
    data[field] = value;
    $.ajax({
        url: '/release/updateR&A/' + releaseID,
        method: 'PUT',
        data: data,
        success: function() {
            console.log('success saving risk and assessment');
            window.location.replace('/compiler/'+ releaseID);
        },
        error: function() {
            console.log('error saving risk and assessment');
        }
    });
}

$('.typeOfService').change(function() {
    var releaseID = $(this).parents('.release-content').attr('id');
    saveRiskAndAssessment('typeOfService', this.value, releaseID);
});

$('.downtimeReq').change(function() {
    var releaseID = $(this).parents('.release-content').attr('id');
    saveRiskAndAssessment('downtimeReq', this.value, releaseID);
});

$('.businessHours').change(function() {
    var releaseID = $(this).parents('.release-content').attr('id');
    saveRiskAndAssessment('businessHours', this.value, releaseID);
});
