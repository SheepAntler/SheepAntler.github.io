/** This is the Master JavaScript file for the Lady Mondegreen and the Eggcorns Website
   Author: Elspeth Stalter-Clouse
   Date: 12/2/2018 
*/

function  placeSeasonalHeader() {     //USE THIS CODE FOR PROJECT05!

   "use strict";

   var currentMonth;
   currentMonth = new Date().getMonth();

   //currentMonth = 9;     //TEMP FOR TESTING

   if (currentMonth === 10 || currentMonth === 11 || currentMonth === 0 || currentMonth === 1)  { //Months go from 0-11, NOT 1-12
       document.write("<h1>");
       document.write("Upcoming Winter Shows");
       document.write("</h1>");
   }

   if (currentMonth === 2 || currentMonth === 3 || currentMonth === 4)  {
       document.write("<h1>");
       document.write("Upcoming Spring Shows");
       document.write("</h1>");
   }

   if (currentMonth === 5 || currentMonth === 6 || currentMonth === 7) {
       document.write("<h1>");
       document.write("Upcoming Summer Shows");
       document.write("</h1>");
   }

   if (currentMonth === 8 || currentMonth === 9) {
       document.write("<h1>");
       document.write("Upcoming Autumn Shows");
       document.write("</h1>");
   }
}

function changeHamptonDate() {

  "use strict";

  var currentMonth;
  currentMonth = new Date().getMonth();

  //currentMonth = 9;     //TEMP FOR TESTING

  if (currentMonth === 10 || currentMonth === 11 || currentMonth === 0 || currentMonth === 1)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("12/15/1586");
    document.write("</p>");
  }

  if (currentMonth === 2 || currentMonth === 3 || currentMonth === 4)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("2/17/1587");
    document.write("</p>");
  }

  if (currentMonth === 5 || currentMonth === 6 || currentMonth === 7)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("5/5/1587");
    document.write("</p>");
  }

  if (currentMonth === 8 || currentMonth === 9)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("8/3/1587");
    document.write("</p>");
  }

}

function changeDoverDate() {

  "use strict";

  var currentMonth;
  currentMonth = new Date().getMonth();

  if (currentMonth === 10 || currentMonth === 11 || currentMonth === 0 || currentMonth === 1)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("12/24/1586");
    document.write("</p>");
  }

  if (currentMonth === 2 || currentMonth === 3 || currentMonth === 4)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("3/12/1587");
    document.write("</p>");
  }

  if (currentMonth === 5 || currentMonth === 6 || currentMonth === 7)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("6/3/1587");
    document.write("</p>");
  }

  if (currentMonth === 8 || currentMonth === 9)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("8/14/1587");
    document.write("</p>");
  }

}

function changeWarwickDate() {

  "use strict";

  var currentMonth;
  currentMonth = new Date().getMonth();

  if (currentMonth === 10 || currentMonth === 11 || currentMonth === 0 || currentMonth === 1)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("1/15/1587");
    document.write("</p>");
  }

  if (currentMonth === 2 || currentMonth === 3 || currentMonth === 4)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("3/25/1587");
    document.write("</p>");
  }

  if (currentMonth === 5 || currentMonth === 6 || currentMonth === 7)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("6/5/1587");
    document.write("</p>");
  }

  if (currentMonth === 8 || currentMonth === 9)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("9/5/1587");
    document.write("</p>");
  }

}

function changeBodiamDate() {

  "use strict";

  var currentMonth;
  currentMonth = new Date().getMonth();

  if (currentMonth === 10 || currentMonth === 11 || currentMonth === 0 || currentMonth === 1)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("1/27/1587");
    document.write("</p>");
  }

  if (currentMonth === 2 || currentMonth === 3 || currentMonth === 4)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("4/14/1587");
    document.write("</p>");
  }

  if (currentMonth === 5 || currentMonth === 6 || currentMonth === 7)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("7/18/1587");
    document.write("</p>");
  }

  if (currentMonth === 8 || currentMonth === 9)  { //Months go from 0-11, NOT 1-12
    document.write("<p>");
    document.write("9/20/1587");
    document.write("</p>");
  }

}