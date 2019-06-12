


function doDate() {

  var str = "";

  var days = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
  var months = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  var now = new Date();

  str = days[now.getDay()] + ", " + now.getDate() + " " + months[now.getMonth()] + " " + now.getFullYear()
    + " " + String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0')
    + ":" + String(now.getSeconds()).padStart(2, '0');

  //console.log(str);

  //Check available




  document.getElementById("time").innerHTML = str;

}
//update toDate every sec
setInterval(doDate, 1000);

// function check_available{

//   var now = new Date();
//   var time = String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0');


//   var table = $("#timetable")[0];

//   var test = $(table.rows[r].cells[c + 1]);
//   console.log(test);



// }

// setInterval(check_available, 1000);



var timeouttime = 30000;//5000 for 5 sec
var timeout = setTimeout(function () {
  window.location.href = "Promo_Vid.html";
}, timeouttime);

function ResetRedir() {//reset timer when click
  console.log("mouse clicked");
  clearTimeout(timeout);
  timeout = setTimeout(function () {
    window.location.href = "Promo_Vid.html";
  }, timeouttime);
}



function JsonExtractor() {

    if (myvar !== ''){
      $(".sign_in").text("SIGN OUT");
      $('.sign_in').attr('href','logout.php');
    }

  var tt;

  /*   $.ajax({
      dataType: "json",
      url: "WZ416.json",
      data: data,
      success: success
    }); */

  $.getJSON("WZ416.json", function (data) {

    var tt = (data.TimeTable);

    checkdate(tt);
  });

}


function checkdate(tt) {

  var now = new Date();

  var start_date = new String("");
  var end_date = "";

  var first = now.getDate() - now.getDay();

  //get start of this week and format string
  var startOfWeek = moment().weekday(1)._d;;
  var SoW = moment(startOfWeek).format("YYYY-MM-DD");// HH:mm:SSS");
  var endOfWeek = moment().weekday(7 + 1)._d; //1 more date for searching the next class of last 
  var EoW = moment(endOfWeek).format("YYYY-MM-DD");
  //console.log(moment().weekday(7)._d);
  //   console.log("endOfWeek: "  + endOfWeek);


  SoW = "2019-05-20";
  EoW = "2019-05-27";




  //Sow = moment ("15-05-2019", "YYYY-MM-DD");


  console.log("SOW: " + SoW);
  console.log("EOW: " + EoW);


  var tt_startpoint;
  var tt_stoppoint;

  var findfow = false;
  var findeow = false;

  var plusSOD = 0;
  var plusoneday = 0;

  // REMEMBER ADD START TIME + 1 DO WHILE THIG


  // //   do {

  for (var i = 0; i < tt.length; i++) {

    var tt_sow = tt[i].StartDateTime;
    var sow_sub = tt_sow.substring(0, 10);


    if (sow_sub == SoW) {

      tt_startpoint = i;
      findfow = true;
      console.log("start data of this week: " + i);


      do {

        var e = i;

        for (e; e < tt.length; e++) {

          var tt_eow = tt[e].EndDateTime;
          var eow_sub = tt_eow.substring(0, 10);

          if (eow_sub == EoW) {

            tt_stoppoint = e - 1;

            console.log("end data of this week: " + tt_stoppoint);

            findeow = true;

            break;

          } else {

            console.log("check tt stop: " + tt_eow == EoW);
          }

        }

        plusoneday = plusoneday + 1;

        var plusendOfWeek = moment().weekday(7 + 1 + plusoneday)._d;
        var pow = moment(plusendOfWeek).format("YYYY-MM-DD");
        EoW = pow;


      } while (findeow == false)

      //         console.log("plusSOD:" + plusSOD);

      break;

    } else {


      console.log("There are no data that match start of this week");
    }

  }

  //     plusSOD = plusSOD + 1;

  //     var plusendOfWeek = moment().weekday(1 + plusSOD)._d;
  //     var psow = moment(plusendOfWeek).format("YYYY-MM-DD");
  //     SoW = psow;

  //   } while (findfow == true);

  console.log(tt_startpoint);
  console.log(tt_stoppoint);

  console.log(tt[tt_startpoint]);
  console.log(tt[tt_stoppoint]);

  displaytimetable(tt, tt_startpoint, tt_stoppoint);


}


function displaytimetable(tt, tt_startpoint, tt_stoppoint) {
  //console.log(tt);
  var table = $("#timetable")[0];

  var tc_length = table.rows.length;

  //console.log(tt[tt_startpoint].StartDateTime.substring(11, 16));

  console.log(table.rows[0].cells.length);
  console.log(table.rows.length);
  //   console.log(table.rows[21]);
  //   var cell = table.rows[0].cells[1];
  //   console.log(cell);

  //   var cell1 = table.rows[0].cells[2];
  //   console.log(cell1);

  //   console.log(table.rows[1].cells[1]);
  //   console.log(table.rows[1].cells[2]);


  for (var i = tt_startpoint; i < tt_stoppoint; i++) {

    var ttcount = i;

    var paper_day = tt[i].Day;
    var paper_time = tt[i].StartDateTime.substring(11, 16);

    //var dow = table.rows[0].cells.length;

    for (var c = 0; c < table.rows[0].cells.length - 1; c++) {// C for cells

      //       console.log(table.rows[0].cells[d+1].id);
      //       console.log(tt[tt_startpoint].Day);

      if (table.rows[0].cells[c + 1].id == tt[i].Day) {


        for (var r = 0; r < table.rows.length - 1; r++) {// R for row


          var now = new Date();

          var day = now.getDay();

          var time = String(now.getHours()).padStart(2, '0') + ":" + String(now.getMinutes()).padStart(2, '0');

          //           if(table.rows[r].id == time)

          if (table.rows[r].id == tt[i].StartDateTime.substring(11, 16)) {

            //console.log("c:" + c + " r: " + r + " i:" + i);
            //console.log(table.rows[r].cells[c + 1]);

            var ttcell = c + 1;
            var ttrow = r;

            //$(table.rows[r].cells[c + 1]).addClass("lecture_gray");

            $(table.rows[r].cells[c + 1]).text(tt[i].PaperDescription);

            do {

              var test = ttrow;
              //               console.log(test);
              //               console.log(table.rows[test].id);

              $(table.rows[test].cells[ttcell]).text(tt[i].PaperDescription);

              $(table.rows[test].cells[ttcell]).addClass("lecture_book");

              ttrow++;

            } while (tt[i].EndDateTime.substring(11, 16) > table.rows[test].id && ttrow < 22)


            ttcount++;
          }

        }

      }

    }

  }

  var element = $("div > table > tbody > TR ");
  //console.log(element.attr("id"));


  var cell = table.rows[1].cells[1]; // This is a DOM "TD" element
  //console.log(table.rows[0].cells[1]);

  var $cell = $(cell); // Now it's a jQuery object.
  //console.log(cell);
  //console.log(table);



  var $test = $("div>table>thead>TR");//this was used
  //$("div>table>thead>TR>TH#0").text(tt[0].StartDateTime);



  $("#timetable>TR>#0800>TD").text = tt[1].PaperDescription;



  console.log(myvar);


//   var testUser = '<%= Session["user_id"] %>';
// console.log(testUser);



// var test = $.session.get('user_id');
// console.log(test);


var col;
var row;

  $(".booking_button").click(function () {

//     if ( $('#bookmarquee').text === '' ){
//       $('#bookmarquee').text('BOOKING RIGHT NOW');
//     }else{
//       $('#bookmarquee').text('');
//     }
if(myvar !== ''){

    

    $('#bookmarquee').text('BOOKING RIGHT NOW                                            ');
    
    
    $(".booking_button").html('Apply');


    $('td').click(function () {
      col = $(this).parent().children().index($(this));
      row = $(this).parent().parent().children().index($(this).parent());
      console.log('Row: ' + row + ', Column: ' + col);
      var cur_cell = $(table.rows[row + 1].cells[col]);

      if (!cur_cell.hasClass("lecture_book")) {

        cur_cell.toggleClass("other_book");
      }

    });

    $(".booking_button").click(function () {

         if ($(".booking_button").text() == 'Apply'){

            $(".booking_button").text('BOOKING');

            var col = $('td').parent().children().index($(this));
            var row = $('td').parent().parent().children().index($(this).parent());

            console.log('Row: ' + row + ', Column: ' + col);

            var cur_cell = $(table.rows[row + 1].cells[col]);

            //console.log(cur_cell.hasClass("other_book"));

            console.log( $("other_book"))

    

             $(".other_book").html(myvar);
             $(".other_book").addClass("stroke");


              $(".other_book").addClass("booked");

              $('#bookmarquee').text('');

            
           


        }

      });

 


      }else{
      alert("Please log in before booking");
      }


});









}


