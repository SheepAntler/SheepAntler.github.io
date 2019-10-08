--
-- ConferenceDB creation script.
-- 
clear screen;

--
-- Drop all my tables before creating them
-- in this script.
--

--drop table Conference cascade constraints;
--drop table Speaker cascade constraints;
--drop table "Session" cascade constraints;
--drop table SessionSpeaker cascade constraints;

drop table SessionSpeaker;
drop table Speaker;
drop table "Session";
drop table Conference;
 
--
-- Create all my tables.
--
create table
Conference (
    Id number(4, 0) 
    , Name varchar2(50)
    , constraint Conference_pk primary key (Id)
);

create table
Speaker (
    Id number(4, 0)
    , FirstName varchar2(50)
    , LastName varchar2(50)
    , Email varchar2(50)
    , TwitterHandle varchar2(50)
    , Age number(3, 0)
    , constraint Speaker_pk primary key (Id)
    , constraint TwitterHandle_uk unique (TwitterHandle)
    , constraint Adult_ck check (Age >= 18)
    , constraint Email_uk unique (Email)
);

create table
"Session" (
    Id number(4, 0)
    , Name varchar2(50)
    , ConferenceId number(4, 0)
    , constraint Session_pk primary key (Id)
    --, constraint Session_Conference_fk foreign key (ConferenceId) references Conference(Id)
);

create table
SessionSpeaker (
    SessionId number(4, 0) 
    , SpeakerId number(4, 0) 
    , constraint SessionSpeaker_pk primary key (SessionID, SpeakerId)
);

--
-- Add my FK constraints...In other words, draw the lines between the tables : - )
--
alter table 
"Session"
add constraint Session_Conference_fk foreign key (ConferenceId) references Conference (Id)
on delete cascade
;

alter table 
SessionSpeaker
add constraint SessionSpeaker_Session_fk foreign key (SessionId) references "Session" (Id)
on delete cascade
;

alter table 
SessionSpeaker
add constraint SessionSpeaker_Speaker_fk foreign key (SpeakerId) references Speaker (Id)
;

--
-- Seed the DB with sample data.
--

-- Conference sample data.
insert into
Conference
values (
    1
    , 'Tech1'
);

insert into
Conference
values (
    2
    , 'Madison Bake Off'
);

insert into
Conference
values (
    3
    , 'Tech2'
);

insert into
Conference
values (
    4
    , 'Madison Home Show'
);

-- select * from conference;

-- Speaker sample data.
insert into
Speaker
values (
    1
    , 'Tom'
    , 'Steele'
    , 'tsteele@madisoncollege.edu'
    , '@matcfaculty'
    , 51
);

insert into
Speaker
values (
    2
    , 'Kari'
    , 'Daggs'
    , 'kkdaggs@madisoncollege.edu'
    , '@matcfaculty2'
    , 30
);


insert into
Speaker
values (
    3
    , 'Martha'
    , 'Stuart'
    , 'celebrity@famousperson.net'
    , '@matcfaculty3'
    , 63
);


insert into
Speaker
values (
    4
    , 'Bob'
    , 'Villa'
    , 'celebrity2@famousperson.net'
    , '@matcfaculty4'
    , 70
);

-- select * from Speaker;

-- Session sample data.
insert into
"Session"
values (
    1
    , 'SQL'
    , 1
);

insert into
"Session"
values (
    2
    , 'PHP'
    , 3
);

insert into
"Session"
values (
    3
    , 'SQL'
    , 1
);

insert into
"Session"
values (
    4
    , 'Cakes'
    , 2
);

insert into
"Session"
values (
    5
    , 'Home Improvement'
    , 4
);

-- select * from "Session";

-- SessionSpeaker sample data.
insert into
SessionSpeaker
values (
    1
    , 1
);

insert into
SessionSpeaker
values (
    2
    , 1
);

insert into
SessionSpeaker
values (
    3
    , 2
);

insert into
SessionSpeaker
values (
    4
    , 3
);

insert into
SessionSpeaker
values (
    5
    , 4
);

insert into
SessionSpeaker
values (
    1
    , 2
);

insert into
SessionSpeaker
values (
    4
    , 1
);

-- select * from SessionSpeaker;