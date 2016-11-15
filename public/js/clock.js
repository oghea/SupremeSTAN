var current = new Date();
var future = new Date(window.jam);
var diff = future.getTime()/1000 - current.getTime()/1000;
var clock;
$(document).ready(function() {
    clock = $('.clock').FlipClock(diff+1, {
        clockFace: 'MinuteCounter',
        countdown: true,
        callbacks: {
            stop: function() {
                $('#form-tpa').submit();
            }
        }
    });
});