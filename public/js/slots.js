$(document).ready(function() {
    $('#date').on('change', function() {
        var selectedDate = $(this).val();
        if (selectedDate) {
            $.ajax({
                url: 'appointment/slots/' + selectedDate,
                method: 'GET',
                success: function(response) {
                    $('#time_slot').empty();
                    if (response.length === 0) {
                        $('#time_slot').append('<option>No available slots</option>');
                    } else {
                        $('#time_slot').append('<option value="">Select a Time Slot</option>');
                        $.each(response.slots, function(index, slot) {
                            $('#time_slot').append('<option value="' + slot + '">' + slot + '</option>');
                        });
                    }
                },
            });
        }
    });

    $('#date').change();
});
