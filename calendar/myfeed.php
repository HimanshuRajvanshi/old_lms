<?php
include_once('functions.php');

	$emid = $_POST['empid'];

	$connection = mysql_pconnect(HOSTNAME,USERNAME,PASSWORD);

mysql_select_db(DATABASE,$connection);


   
	







   if($emid)
	{
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 and leave.empid = '$emid' ", $connection) or die(mysql_error());
	}
	else
	{
	$result = mysql_query("SELECT * FROM  `leave` where status = 1 ", $connection) or die(mysql_error());
	}
	
	


	

	
echo "<script type='text/javascript'>





	$(document).ready(function() {

		

		$('#calendar').fullCalendar({
		
	    	theme: true,

			header: {

				left: 'prev,next today',

				center: 'title',

				right: 'month,basicWeek,basicDay'

			},
eventSources: [

       
        {
			

			events: ["

			

			?>

			

			

		

				

<?php   

while($row = mysql_fetch_array($result))



	{
             
           
		 if($row['leavetype'] != "Work From Home" )
	   
	   {   
	   
	   echo "{ 

		   title: '".$row['reqname']."-(".$row['leavetype'].")',  

		   start: '".$row['fromdate']."',  

		   end: '".$row['todate']."',
		   
		   },";	
			   
	   } 
	   
	    else
	   {
		   echo "{ 

		   title: '".$row['reqname']."-(".$row['leavetype'].")',  

		   start: '".$row['fromdate']."',  

		   end: '".$row['todate']."',
		   
		   color:'#e7cf95',
		   
		   textColor:'#000',
		   
		   },";	
		   
		   
		   
	   }
			   
		 
   

	 } 

	

?>



<?php

echo"	

				],
				color:'#0a6b45'
},

{
events: [ 
                {
                    title  : 'New Years Day',
                    start  : '2018-01-01'
                }, 
				
                {
                    title  : 'Republic Day',
                    start  : '2018-01-26'
                },             
              
				{
                    title  : 'Holi',
                    start  : '2018-03-02'
                },				
							
				{
                    title  : 'Good Friday',
                    start  : '2018-03-30'
                },
				
				{
                    title  : 'Independence Day',
                    start  : '2018-08-15'
                },
				
				/* {
                    title  : 'Janmashtami',
                    start  : '2017-08-25'
                }, */
				
				{
                    title  : 'Mahatma Gandhi Birthday',
                    start  : '2018-10-02'
                },	

				{
                    title  : 'Dussehra',
                    start  : '2018-10-19'
                },
				
				{
                    title  : 'Diwali',
                    start  : '2018-11-07'
                },
				{
                    title  : 'Govardhan Puja',
                    start  : '2018-11-08'
                },
				{
                    title  : 'Christmas',
                    start  : '2018-12-25'
                },
				
		],
color: '#e26e31',     // an option!
textColor: 'white' // an option!		

}




]
				

			

		});

	});



</script>";

?>