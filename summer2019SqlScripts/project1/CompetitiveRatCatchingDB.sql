--
-- CompetitiveRatCatchingDB creation script
--

clear screen; 

-- 
-- Drop my tables before re-creating them
-- each time I run this script
--

drop table HumanHousemate cascade constraints;
drop table Cat cascade constraints;
drop table RaceCourse cascade constraints;
drop table Event cascade constraints;
drop table EventCompetitor cascade constraints;

--
-- Create tables
--

create table 
HumanHousemate (
    Id number(4, 0) not null
    , FirstName varchar2(35)
    , LastName varchar2(35)
    , Address varchar2(75)
    , Phone varchar2(20)
    , constraint HumanHousemate_pk primary key (Id)
);

create table 
Cat (
    Id number(4, 0) not null
    , CatName varchar2(35) not null
    , RaceAlias varchar2(45)
    , HumanHousemateId number(4, 0) 
    , constraint Cat_pk primary key (Id)
);

create table
RaceCourse (
    Id number(4, 0) not null
    , CourseLocation varchar2(50) not null
    , SquareMiles number(3, 0) not null
    , RatPopulation number(4, 0)
    , constraint RaceCourse_pk primary key (Id)
);

create table 
Event (
    Id number(4, 0) not null
    , RaceCourseId number(4, 0) not null
    , EventName varchar(45) not null
    , AllottedHours number(3, 0) not null
    , constraint Event_pk primary key (Id)
);

create table 
EventCompetitor (
    CatId number(4, 0) not null
    , EventId number(4, 0) not null
    , RatsCaught number(4, 0) not null
    , constraint EventCompetitor_pk primary key (CatId, EventId)
);

--
-- Create foreign key constraints
--

alter table 
Cat 
add constraint Cat_HumanHousemate_fk foreign key (HumanHousemateId) references HumanHousemate (Id)
on delete cascade 
;

alter table 
Event 
add constraint Event_RaceCourse_fk foreign key (RaceCourseId) references RaceCourse (Id)
on delete cascade
;

alter table 
EventCompetitor 
add constraint EventCompetitor_Cat_fk foreign key (CatId) references Cat (Id)
on delete cascade
;

alter table 
EventCompetitor 
add constraint EventCompetitor_Event_fk foreign key (EventId) references Event (Id)
on delete cascade
;

--
-- Add data to the tables
--

-- HumanHousemate table data

insert into
HumanHousemate
values (
    1
    , 'Mary'
    , 'Mulholland'
    , '123 Sesame Street'
    , '465-678-4321'
);

insert into
HumanHousemate
values (
    2
    , 'Sam'
    , 'Sciamalli'
    , '56 West Avenue'
    , '720-207-0702'
);

insert into
HumanHousemate
values (
    3
    , 'Frank'
    , 'Fiorello'
    , '306 Bananaboat Street, Apt. 2'
    , '211-987-5376'
);

insert into
HumanHousemate
values (
    4
    , 'Jackie'
    , 'Johnson'
    , '340 West Elm Street'
    , '323-454-7869'
);

-- Cat table data

insert into 
Cat
values (
    1
    , 'Minou'
    , 'The Ratinator'
    , 2
);

insert into 
Cat
values (
    2
    , 'MishMish'
    , 'Guts and Glory'
    , 2
);

insert into 
Cat
values (
    3
    , 'Largo'
    , 'Ratsputin'
    , 1
);

insert into
Cat
values (
    4
    , 'Princess'
    , 'I. Smella Rat'
    , 3
);

insert into 
Cat
values (
    5
    , 'Floofmeister'
    , 'The Mad Ratter'
    , 4
);

-- RaceCourse table data

insert into 
RaceCourse 
values (
    1
    , 'Quinsling Family Farm'
    , 8.5
    , 964

);

insert into 
RaceCourse 
values (
    2
    , 'Central City Park'
    , 4.8
    , 627

);

insert into 
RaceCourse 
values (
    3
    , 'West Elm Neighborhood'
    , 6.2
    , 896

);

-- Event table data

insert into
Event 
values (
    1
    , 2
    , 'Downtown Decimation'
    , 2.5
);

insert into
Event
values (
    2
    , 3
    , 'Backyard Bone-Crunch'
    , 4
);

insert into 
Event
values (
    3
    , 1
    , 'Cornfield Catacombs'
    , 3.5
);

insert into
Event
values (
    4
    , 1
    , 'Brains in the Barnyard'
    , 1.25
);

-- EventCompetitor table data

insert into 
EventCompetitor
values (
    1
    , 2
    , 12
);

insert into 
EventCompetitor
values (
    4
    , 2
    , 10
);

insert into 
EventCompetitor
values (
    2
    , 3
    , 17
);

insert into 
EventCompetitor
values (
    2
    , 4
    , 15
);

insert into 
EventCompetitor
values (
    5
    , 1
    , 7
);

insert into 
EventCompetitor
values (
    3
    , 1
    , 11
);

insert into
EventCompetitor
values (
    5
    , 3
    , 8
);

insert into 
EventCompetitor
values (
    1
    , 4
    , 5
);

insert into 
EventCompetitor
values (
    4
    , 3
    , 10
);
