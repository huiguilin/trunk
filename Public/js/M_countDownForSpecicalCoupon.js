$(function(){

	var ctimer = setInterval(countdown,1000);
	function countdown(){
		some();
	}


	function some(){

		var objs = $('#main #foot_and_footsort_box div.foot_box ul.content li p.hidden_location');
		for(var i =0;i<objs.length;i++){
			var obj = objs[i];

			for(var k =0; k<obj.length+1;k++){
				alert(k);
				var cobj = obj[k];

				var day;
				var hour;
				var min;
				var sec;

				if(k == 0){
					day = cobj.innerHTML;
					return;
				}
				else if(k ==1){
					hour = cobj.innerHTML;
					return;
				}
				else if(k ==2){
					min = cobj.innerHTML;
					return;
				}
				else if(k == 3){
					sec = cobj.innerHTML;
					return;
				}
				else{
					if(sec != 0){
						sec--;
						changeSec(sec);
					}else{
						if(min != 0){
							min--;
							changeMin(min);
							sec = 60;
							changeSec(sec);
						}else{
							if(hour != 0 ){
								hour--;
								changeHr(hour);
								min = 60;
								changeSec(sec);
							}else{
								if(day != 0){
									day--;
									changeDay(day);
									hour = 24;
									changeSec(sec);
								}else{
									clearInterval(ctimer);
								}
							}
						}
					}
				}
			}
		}
	}
	function changeSec(sec){
		var objs = $('#main #foot_and_footsort_box div.foot_box ul.content li p.hidden_location');
		for(var i =0;i<objs.length;i++){
			var obj = objs[i];
			for(var k=0; k<obj.length+1;k++){
				var cobj = obj[k];
				if(k ==3){
					cobj.innerHTML = sec;
				}
			}
		}
	}
	function changeMin(min){
		var objs = $('#main #foot_and_footsort_box div.foot_box ul.content li p.hidden_location');
		for(var i =0;i<objs.length;i++){
			var obj = objs[i];
			for(var k=0; k<obj.length+1;k++){
				var cobj = obj[k];
				if(k ==2){
					cobj.innerHTML = sec;
				}
			}
		}
	}
	function changeHr(hour){
		var objs = $('#main #foot_and_footsort_box div.foot_box ul.content li p.hidden_location');
		for(var i =0;i<objs.length;i++){
			var obj = objs[i];
			for(var k=0; k<obj.length+1;k++){
				var cobj = obj[k];
				if(k ==1){
					cobj.innerHTML = sec;
				}
			}
		}
	}
	function changeDay(day){
		var objs = $('#main #foot_and_footsort_box div.foot_box ul.content li p.hidden_location');
		for(var i =0;i<objs.length;i++){
			var obj = objs[i];
			for(var k=0; k<obj.length+1;k++){
				var cobj = obj[k];
				if(k ==0){
					cobj.innerHTML = sec;
				}
			}
		}
	}












	// var day = parseInt($('#countdown_day').text());
	// var hour = parseInt($('#countdown_hour').text());
	// var min = parseInt($('#countdown_min').text());
	// var sec = parseInt($('#countdown_sec').text());
	// var ctimer = setInterval(countdown,1000);
	// function countdown(){
	// 	if(sec != 0){
	// 		sec--;
	// 		changeSec(sec);
	// 	}else{
	// 		if(min != 0){
	// 			min--;
	// 			changeMin(min);
	// 			sec = 60;
	// 			changeSec(sec);
	// 		}else{
	// 			if(hour != 0 ){
	// 				hour--;
	// 				changeHr(hour);
	// 				min = 60;
	// 				changeSec(sec);
	// 			}else{
	// 				if(day != 0){
	// 					day--;
	// 					changeDay(day);
	// 					hour = 24;
	// 					changeSec(sec);
	// 				}else{
	// 					clearInterval(ctimer);
	// 				}
	// 			}
	// 		}
	// 	}
	// }
	// function changeSec(sec){
	// 	$('#countdown_sec').text(sec);
	// }
	// function changeMin(min){
	// 	$('#countdown_min').text(min);
	// }
	// function changeHr(hour){
	// 	$('#countdown_hour').text(hour);
	// }
	// function changeDay(day){
	// 	$('#countdown_day').text(day);
	// }

})