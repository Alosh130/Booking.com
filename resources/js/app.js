// Assuming the old directive populated the input with a value in the format 'MM/DD/YYYY - MM/DD/YYYY'

$(function() {
    // Check if the input has a value and set it to the picker
    var initialDateRange = $('input[name="dates"]').val();

    if (initialDateRange) {
        var dates = initialDateRange.split(' - ');
        if (dates.length === 2) {
            var startDate = moment(dates[0], 'MM/DD/YYYY');
            var endDate = moment(dates[1], 'MM/DD/YYYY');

            $('input[name="dates"]').daterangepicker({
                startDate: startDate,
                endDate: endDate,
                autoUpdateInput: true,
                locale: {
                    cancelLabel: 'Clear'
                },
                minDate: new Date()
            });
        }
    } else {
        $('input[name="dates"]').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            },
            minDate: new Date()
        });
    }

    $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });

    $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('');
    });

    // Add pointer class to Apply and Clear buttons after picker is shown
    $('input[name="dates"]').on('show.daterangepicker', function(ev, picker) {
        setTimeout(function() {
            $('.drp-buttons .btn').addClass('pointer');
        }, 0);
    });
});
