/** This is the Master JavaScript file for the Lady Mondegreen and the Eggcorns Website
   Author: Elspeth Stalter-Clouse
   Date: 12/2/2018 
*/

function displayRenderedDateTime() {

    var todayDate;
    var formattedDate;

    todayDate = new Date();
    formattedDate = todayDate.toDateString();

    document.write("This web page viewed: " + formattedDate);

    }
