clear screen;

select 
    Cat.Id
    , Cat.CatName
    , Cat.RaceAlias
    , EventCompetitor.RatsCaught
    , EventCompetitor.EventId
from 
    Cat
inner JOIN 
    EventCompetitor
on 
    Cat.Id = EventCompetitor.CatId
where 
    RatsCaught >= 10
order by 
    RatsCaught
;
    