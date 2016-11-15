
var clock;
$(document).ready(function() {
    clock = $('.clock').FlipClock(durasi*60, {
        clockFace: 'MinuteCounter',
        countdown: true,
        callbacks: {
            stop: function() {
                $('#form-tpa').submit();
                // window.location.href = 'http://google.com';
                // $('.message').html('The clock has stopped!');
            }
        }
    });
});