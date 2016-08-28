
	
	count=0;
            function add () {
				
			if(!(((document.getElementById('qt1').checked) || (document.getElementById('qt2').checked) || (document.getElementById('qt3').checked)) && ((document.getElementById('at1').checked) || (document.getElementById('at2').checked) ) ) ){
				return;
			}
			count++;
		
			if (count>1)
                 {location.reload(true);}
                var ans = document.main.atype.value;
                
                if ( ans =="multiple")
                     {
                           var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Number of choices</h4><div class='form-group'><input type='number' id='num'name='choice'><br></div><input type='button' name='step2' onclick='option();' class='btn btn-primary'value='Proceed'>";
          document.getElementById('cho').appendChild(newdiv);
                     }
					 else {
						 
						 option();
						 
					 }
            
           
            }
            function option () {
			
                var ans = document.main.atype.value;
				var que = document.main.qtype.value;
				if (ans=='multiple') {
					
					if ((document.getElementById('num').value)== '' ){
				
					return;}
				}
				if(que==1)
				 {var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Enter the question</h4><div class='form-group'><textarea rows='25' cols='50' name='quest' required></textarea></div> ";
          document.getElementById('cho').appendChild(newdiv);
		  }
				 else if (que==2)
				 {
					var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Select the image for question </h4> <div class='form-group'><input type='file' name='quesi' required></div> ";
          document.getElementById('cho').appendChild(newdiv);
				 }
				 else if (que==3)
				 {
				   var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Enter the question</h4><div class='form-group'> <textarea rows='25' cols='50' name='quest'required></textarea></div> ";
          document.getElementById('cho').appendChild(newdiv);
		  
		  var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Select the image for question </h4><div class='form-group'> <input type='file' name='quesi' required> </div>";
          document.getElementById('cho').appendChild(newdiv);
				 }
				 if( ans =="multiple") {
				 var num = document.main.choice.value;
                var i=1;
                while (i<=num)
                    {
                       var newdiv = document.createElement('div');
          newdiv.innerHTML = "<h4>Option " + i + " </h4><div class='form-group'><input type='text' name='opt" + i + "' required></div>";
          document.getElementById('cho').appendChild(newdiv);
		  i++;
                    }
					var newdiv = document.createElement('div');
          newdiv.innerHTML = "<div class='form-group'><br></div><input name='submit'type='submit'class='btn btn-success' value='Submit'>";
          document.getElementById('cho').appendChild(newdiv);
				 }
				 else {
					
					 var newdiv = document.createElement('div');
          newdiv.innerHTML = "<div class='form-group'><br></div><input type='submit' class='btn btn-success' value='Submit'>";
          document.getElementById('cho').appendChild(newdiv);
				 }
                
            }
	
   