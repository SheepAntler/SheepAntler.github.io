select
    event.eventname as "Event"
    , event.allottedhours as "Event Length (hrs)"
    , cat.racealias as "Winners"
    , eventcompetitor.ratscaught as "Rats Caught"
    , ROUND (eventcompetitor.ratscaught / event.allottedhours, 1) as "Rats per Hour"
    , cat.catname as "Cat Name"
    , humanhousemate.address as "Address"
    , humanhousemate.phone as "Contact"
from 
    event
    join eventcompetitor on eventcompetitor.eventid = event.id 
    join cat on cat.id = eventcompetitor.catid
    join humanhousemate on humanhousemate.id = cat.humanhousemateid
order by
    event.allottedhours desc
    , event.eventname
    , eventcompetitor.ratscaught desc
;