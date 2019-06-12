<!DOCTYPE html>

<?php 
session_start();
$session_value=(isset($_SESSION['user_id']))?$_SESSION['user_id']:''; ?>

<html>
<head>
    <link href="themes/Navbar.css" rel="stylesheet" type="text/css">
    <title>Timetable Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <script type="text/javascript">
        var myvar='<?php echo $session_value;?>';
    </script>

    <script src="Timetable.js"></script>
    <script type="text/javascript" src="jquery-3.4.1.js"></script>
    <script type="text/javascript" src="moment.js"></script>
    <script type="text/javascript" src="jquery.session.js"></script>
    

<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            JsonExtractor()
        });

    </script>

    <!--   <style>
 

    TABLE {
        font-family: arial, calibri;
        border-collapse: collapse;
        width: 100%;
        border: 5px solid black;
    }

    TD, TH {
        border: 1px solid black;
        text-align: left;
        padding:20px;
    }
    </style>
     -->

</head>


<body onmousedown="ResetRedir()">
    <header>
        <div class="nav_container">
    

            <img src="images/AUT-logo-block.png" width="96.39" height="68.34" alt="logo" class="logo">

            <nav>
                <ul>
                    <li><a href="#">Timetable</a></li>
                    <li><a href="#" class="HSimage" onclick="document.getElementById('hsimg').style.display='block'"
                            style="width:auto;">Health and Safety</a></li>
                    <li><a href="#" class="booking_button">booking</a></li>
                    <li><a href="login.php" class="sign_in">Sign in</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="textbox">

        <text>
            <h3 id="h3">WZ 416 Research and Development Project room</h3>

            <h1 id="time"></h1>

            <h2 style = "margin-bottom: 0;">Currently available for booking</h2> 

           
           
           
            

            <!--         <h3 id="test">test</h3> -->

            <!--         <h4 id="test1">another test</h4> -->

        </text>
    </div>
    
     <div class="help-tip">
		<p>Red: Lecture<br> Gray:Booking selected<br> Blue: Booking confirmed</p>
    </div>



    <div>


        <table class="table" id="timetable">

            <!-- <colgroup>
            <col stlye="width: 10%">
            <col stlye="width: 18%">
            <col stlye="width: 18%">
            <col stlye="width: 18%">
            <col stlye="width: 18%">
            <col stlye="width: 18%">
            
        </colgroup>
        -->
            <thead>
                <TR>
                    <TH scope="col">TIME</TH>
                    <TH scope="col" id="0">Monday</TH>
                    <TH scope="col" id="1">Tuesday</TH>
                    <TH scope="col" id="2">Wednesday</TH>
                    <TH scope="col" id="3">Thursday</TH>
                    <TH scope="col" id="4">Friday</TH>
                </TR>
            </thead>

            <tbody id="timebody">

                <TR id="08:00">
                    <TH scope="row">08:00am</TH>
                    <TD id="1"></TD>
                    <TD id="2"></TD>
                    <TD id="3"></TD>
                    <TD id="4"></TD>
                    <TD id="5"></TD>
                </TR>
                <TR id="08:30">
                    <TH scope="row">08:30am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="09:00">
                    <TH scope="row">09:00am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="09:30">
                    <TH scope="row">09:30am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="10:00">
                    <TH scope="row">10:00am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="10:30">
                    <TH scope="row">10:30am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="11:00">
                    <TH scope="row">11:00am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="11:30">
                    <TH scope="row">11:30am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="12:00">
                    <TH scope="row">12:00am</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="12:30">
                    <TH scope="row">12:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="13:00">
                    <TH scope="row">13:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="13:30">
                    <TH scope="row">13:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="14:00">
                    <TH scope="row">14:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="14:30">
                    <TH scope="row">14:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="15:00">
                    <TH scope="row">15:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="15:30">
                    <TH scope="row">15:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="16:00">
                    <TH scope="row">16:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="16:30">
                    <TH scope="row">16:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="17:00">
                    <TH scope="row">17:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="17:30">
                    <TH scope="row">17:30pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
                <TR id="18:00">
                    <TH scope="row">18:00pm</TH>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                    <TD></TD>
                </TR>
            </tbody>

        </table>

    </div>


    <footer id="bookmarquee" class="marquee overlay">   
    </footer>

    <!-- test field -->

    </style>
    </head>

    <body>


        <!--Health and safety image container-->
        <div id="hsimg" class="modal">

            <form class="modal-content animate">
                <div class="imgcontainer">
                    <span onclick="document.getElementById('hsimg').style.display='none'" class="close"
                        title="Close Modal">&times;</span>
                    <img src="images/WZ323 health and safety.jpg" alt="Avatar" class="avatar">


                </div>
            </form>
        </div>



        <script>
            // Get the modal
            var modal = document.getElementById('hsimg'); //don't get rid of this****

            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }


            /* function doDate(){

            var str = "fell";
            var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
            var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            var seconds;
            var now = new Date();

            str = days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear() + " " + now.getHours() +":" + now.getMinutes()+ ":" + now.getSeconds();


            document.getElementById("time").innerHTML =  str ;
            }
            setInterval(doDate, 1000); */





            /* // Get the modal
            var modal = document.getElementById('id01');

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            $(document).ready(function(){
                $.getJSON("WZ416.json", function(data){
                    var timetable_info = '';
                    $.each(data, function(key, value){
                        timetable_info ='<tr>';
                        timetable_info ='<td>'+Day.Day_json+'</td>';
                    });
                    $('#timetable_table').append(timetable_info);
                });
            });
             */

        </script>


    </body>

    </html>