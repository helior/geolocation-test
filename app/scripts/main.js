(function($) {

	/*
	* Geolocation.
	*/
	if (navigator.geolocation) {
		console.dir(navigator.geolocation);

	  navigator.geolocation.getCurrentPosition(iHazLocation);

	  function iHazLocation(position) {
			var element, message;
			element = $('.browser-geolocation');
			message = "<dl><dt>Latitude</dt><dd>" + position.coords.latitude + "</dd><dt>Longitude</dt><dd>" + position.coords.longitude + "</dd></dl>";

			console.log(position);
			element.find('p').html(message);
		}
	}

	/*
	* Timezone.
	* Get offset and convert it to a timezone (either shorthand or official regional strings) to map to a pre-determined list of representative affiliates.
	*/
	var element = $('.browser-timezone'),
		date, currentTimeZoneOffsetInHours;

	var tz = jstz.determine();
	element.html(tz.name());

	var main = main || {};

	<esi:choose>
		<esi:when test="$(GEO{'zip'})">
    		main.zip = <esi:vars>$(GEO{'zip'})</esi:vars>;
        </esi:when>
    </esi:choose>


})(jQuery);
