(function($) {

  $.fn.circleSkills = function(options){  
    // default configuration properties
    var defaults = {      
      percent        :  50,
      speed          :  7,
      colorline      : '#000',
	  emptyColorline : '#f2f2f2',
      skillTitle     : '',
      lineSize       : 1,
	  pointSize      : 7
    }; 

    var options = $.extend(defaults, options);

    this.each(function() {
      var skill = $(this),
		  percent,
		  colorline,
		  emptyColorline,
		  skillTitle,
		  lineSize,
		  pointSize;
	  
      // This object
      var context = skill.get(0).getContext('2d');
	  
      // How many percent draw a line
	  if (skill.data('percent')){
		percent = skill.data('percent');
	  } else {
		percent = options.percent
	  }
      // Start draw line
      var start = 0;
	  
	  //Circle Color
	  if (skill.data('color')){
		colorline = skill.data('color');
	  } else {
		colorline = options.colorline
	  }
	  if (skill.data('emptyColor')){
		emptyColorline = skill.data('emptyColor');
	  } else {
		emptyColorline = options.emptyColorline
	  }
	  
	  //Circle Title
	  if (skill.data('title')){
		skillTitle = skill.data('title');
	  } else {
		skillTitle = options.skillTitle
	  }
	  
	  //Circle Line Size
	  if (skill.data('lineSize')){
		lineSize = skill.data('lineSize');
	  } else {
		lineSize = options.lineSize
		console.log(skill.data('lineSize'));
	  }
	  
	  //Progress Speed
	  if (skill.data('speed')){
		speed = skill.data('speed');
	  } else {
		speed = options.speed
	  }
	  
	  //Point Size
	  if (skill.data('pointSize')){
		pointSize = skill.data('pointSize');
	  } else {
		pointSize = options.pointSize
	  }
	 
		skill.wrap('<div class="skill-wrap" style="display: inline-block; position: relative; vertical-align: top;" />');
		skill.parent().append('<div class="skill-content" style="left: 0; position: absolute; right: 0; top: 50%;" />');
		skill.next('.skill-content').append('<div class="skill-name">' + skillTitle + '</div>');
		skill.next('.skill-content').css('margin-top',  -((skill.next('.skill-content').height()+8) / 2));

      // First Circle 
      context.beginPath();
      context.lineWidth = lineSize;
      context.strokeStyle = emptyColorline;
      context.arc( 50, 50, 45, 0, 2 * Math.PI, false );
      context.stroke();

      var interval = setInterval( function() {
        context.clearRect(0, 0, 100, 100);
        context.beginPath();
        context.lineWidth = lineSize;
        context.strokeStyle = emptyColorline;
        context.arc( 50, 50, 45, 0, 2 * Math.PI, false );
        context.stroke();
         
        var rad = ( Math.PI * (start / 100)) * 2;
        context.beginPath();
        context.lineWidth = lineSize;
        context.strokeStyle = colorline;
        context.arc( 50, 50, 45, -(Math.PI / 2), rad - ((Math.PI / 2) * 2) / 2  , false);
        context.stroke();
        
        context.save();

        var translateX= 50+(1/2);
        var translateY= 5+(90/2);

        context.translate(translateX,translateY);
        context.rotate(rad);
        context.translate(-translateX,-translateY); 

        context.beginPath();
        context.fillStyle = colorline;
        context.arc(50,5,pointSize/2,0,2*Math.PI);
		
		//Point Hide
		if (!skill.data('pointHide')){
		  context.fill();
		}
        
		context.restore();
        
        if (start == percent) {
          clearInterval(interval);
        } else {
          start++;
          skill.parent().find('.skill-percent').html(start+'%')
        }
      }, speed )
    });
  }
})(jQuery);
