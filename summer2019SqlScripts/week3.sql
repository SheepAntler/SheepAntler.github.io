--
-- ConferenceDB creation script.
-- 
clear screen;

--
-- Drop all my tables before creating them
-- in this script.
--
drop table Conference;
drop table Speaker;
drop table "Session";
drop table SessionSpeaker;

--
-- Create all my tables.
--
create table
Conference (
    Id number(4, 0)
    , Name varchar2(50)
);

create table
Speaker (
    Id number(4, 0)
    , FirstName varchar2(50) not null
    , LastName varchar2(50)
    , Email varchar2(50) default 'somebody@somewhere.com'
);

create table
"Session" (
    Id number(4, 0)
    , Name varchar2(50)
    , ConferenceId number(4, 0)
);

create table
SessionSpeaker (
    SessionId number(4, 0)
    , SpeakerId number(4,0)
);

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
    , ''
);

insert into
Speaker
values (
    2
    , 'Kerri'
    , 'Daggs'
    , ''
);


insert into
Speaker (
    Id 
    , FirstName
    , LastName
)
values (
    3
    , 'Martha'
    , 'Stuart'
);


insert into
Speaker
values (
    4
    , 'Bob'
    , 'Villa'
    , default
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