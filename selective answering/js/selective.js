//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			
			scale = 1;
			
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration:0, //you can chage the duration value to see some animations on transition.
					//change at previous button's block also for the same.
		complete: function(){
			current_fs.hide();
			animating = false;
		}
	});
});

$(".previous").click(function(){
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();
	
	
	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			
			scale = 1;
			//2. take current_fs to the right(50%) - from 0%
			left = 0+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration:0, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}
	});
});
function DoAction(no,tot)

{	if(animating) return false;
	animating = true;
	
	current_fs =$( "fieldset:first-of-type" );
	
	while(tot--){
    current_fs.hide();
	current_fs = current_fs.next();
	}

	current_fs =$( "fieldset:first-of-type" );
	next_fs = current_fs;
	if (no==0)
	{current_fs=next_fs.next();}
	while(no--)
	{
	next_fs = next_fs.next();
	
	}
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration:0, //you can chage the duration value to see some animations on transition.
					//change at previous button's block also for the same.
		complete: function(){
			if(next_fs!=current_fs)
			current_fs.hide();
			animating = false;
		}
	});
	
}

