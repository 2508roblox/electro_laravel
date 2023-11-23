(function ($) {
	$.fn.countdown = function (t) {

		function i() {

			eventDate = (Date.parse(new Date().toDateString())+86400000) / 1e3;

			currentDate = Math.floor($.now() / 1e3);

			if (eventDate <= currentDate) {
				clearInterval(interval);
			}

			seconds = eventDate - currentDate;

			weeks = Math.floor(seconds / 604800);
			seconds -= weeks * 7 * 60 * 60 * 24;
			days = Math.floor(seconds / 86400);
			seconds -= days * 60 * 60 * 24;
			hours = Math.floor(seconds / 3600);
			seconds -= hours * 60 * 60;
			minutes = Math.floor(seconds / 60);
			seconds -= minutes * 60;

			weeks = String(weeks).length >= 2 ? weeks : "0" + weeks;
			days = String(days).length >= 2 ? days : "0" + days;
			hours = String(hours).length >= 2 ? hours : "0" + hours;
			minutes = String(minutes).length >= 2 ? minutes : "0" + minutes;
			seconds = String(seconds).length >= 2 ? seconds : "0" + seconds;

			if (!isNaN(eventDate)) {

				if(weeks == 00){
					if(days == 00){
						firstNumb = hours;
						secondNumb = minutes;
						thirdNumb = seconds;
						i1 = 'h';
						i2 = 'm';
						i3 = 's';	
					} else {
						firstNumb = days;
						secondNumb = hours;
						thirdNumb = minutes;
						i1 = 'd';
						i2 = 'h';
						i3 = 'm';
					}
				} else {
					firstNumb = weeks;
					secondNumb = days;
					thirdNumb = hours;
					i1 = 'w';
					i2 = 'd';
					i3 = 'h';
				}
				if (eventDate <= currentDate) {
					firstNumb = '00';
					secondNumb = '00';
					thirdNumb = '00';
					i1 = '';
					i2 = '';
					i3 = '';
				} else {
					$this.find('.first-numb').html( firstNumb );
					$this.find('.second-numb').html( secondNumb );	
					$this.find('.third-numb').html( thirdNumb );
					$this.find('.i1').html( i1 );
					$this.find('.i2').html( i2 );
					$this.find('.i3').html( i3 );
				}

			} else {
				console.log("Invalid date. Example: 13 march 2015 09:00:00");
				clearInterval(interval)
			}
		}

		$this = $(this);

		var options = {
			date: null
		};

		t && $.extend(options, t);

		if ($this.parents('.glitch').data('time')){
			options.date = $this.parents('.glitch').data('time');
		}

		i();

		var interval = setInterval(i, 1e3)

	}

})(jQuery);