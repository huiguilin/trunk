function Test(dayid, hourid, minid, secid) {
    var day = parseInt($('#' + dayid).text());
    var hour = parseInt($('#' + hourid).text());
    var min = parseInt($('#' + minid).text());
    var sec = parseInt($('#' + secid).text());
    var ctimer = setInterval(countdown, 1000);

	function countdown(){
		if(sec != 0){
			sec--;
			changeSec(sec,secid);
		}else{
			if(min != 0){
				min--;
				changeMin(min,minid);
				sec = 60;
				changeSec(sec,secid);
			}else{
				if(hour != 0 ){
					hour--;
					changeHr(hour,hourid);
					min = 60;
					changeSec(sec,secid);
				}else{
					if(day != 0){
						day--;
						changeDay(day,dayid);
						hour = 24;
						changeSec(sec,secid);
					}else{
						clearInterval(ctimer);
					}
				}
			}
		}
	}
	 function changeSec(sec, secid) {
        $('#' + secid).text(sec);
    }
    function changeMin(min, minid) {
        $('#' + minid).text(min);
    }
    function changeHr(hour, hourid) {
        $('#' + hourid).text(hour);
    }
    function changeDay(day, dayid) {
        $('#' + dayid).text(day);
    }
}
