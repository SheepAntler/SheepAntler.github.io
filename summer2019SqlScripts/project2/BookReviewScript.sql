clear screen; 

--
-- Clean up, Clean up, Everybody Everywhere!
--

drop table Reviewer cascade constraints; 
drop sequence Reviewer_seq; 

drop table BookReview cascade constraints; 
drop sequence BookReview_seq;
 
-- 
-- Create tables
--

create table 
Reviewer (
    Id number not null
    , firstName varchar2(30)
    , lastname varchar2(30)
    , constraint reviewer_pk primary key (Id)
);

-- create a sequence
create sequence 
Reviewer_seq
start with 5
increment by 5
;

create table 
BookReview (
    Id number not null
    , BookISBN varchar2(10) not null
    , ReviewerId number not null
    , ReviewDate date 
    , Rating number(1)
    , Comments varchar2(350)
    , constraint BookReview_pk primary key (Id)
);

-- create a sequence 
create sequence
BookReview_seq
start with 1009
;

--
-- Add constraints, build relationships
--

alter table 
BookReview
add constraint BookReview_Reviewer_fk foreign key (ReviewerId) references Reviewer (Id)
;

alter table 
BookReview
add constraint BookReview_books_fk foreign key (BookISBN) references books (ISBN)
;

--
-- Add sample data 
--

insert into 
Reviewer 
values (
    Reviewer_seq.nextval
    , 'Tom'
    , 'Thumb'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '2491748320'
    , Reviewer_seq.currval
    , '02-DEC-2014'
    , 2
    , 'We got this just before our daughter was born. Turns out child-rearing was so painful we never got around to reading it. Thanks for nothing, book! (Does make a handy paperweight, though...)'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '3437212490'
    , Reviewer_seq.currval
    , '17-MAR-2019' 
    , 5
    , 'Loved it. I knew exactly what to do with my hard-won morels this year! Even my picky kids loved these recipes.'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '8117949391'
    , Reviewer_seq.currval
    , '12-MAY-2019'
    , 3
    , 'I bought this to read to my kids while I tuck them in. They liked it pretty well for a little while, but they got bored of it pretty quickly. It just doesn''t wear well as a children''s book.'
);

insert into 
Reviewer 
values (
    Reviewer_seq.nextval
    , 'Van'
    , 'Helsing'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '1059831198'
    , Reviewer_seq.currval
    , '01-APR-2019'
    , 4
    , 'A wonderful resource. Thanks to this book, I am now able to give 110% when I am out hunting vampires. The only reason I knocked a star off my review is because the book arrived damaged; the dust jacket was torn.'
);

insert into
BookReview
values (
    BookReview_seq.nextval
    , '1059831198'
    , Reviewer_seq.currval
    , '04-APR-2019'
    , 5
    , 'I''m updating my review to 5 stars--shortly after writing my last review, JustLee Books contacted me and offered me a full refund on my order PLUS $5.00 store credit as an apology for the damaged book I received. I cannot recommend JustLee Books enough! Unparalleled customer service.'
);

insert into 
Reviewer 
values (
    Reviewer_seq.nextval
    , 'Jacqueline'
    , 'Fisk'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '3437212490'
    , Reviewer_seq.currval
    , '27-APR-2019'
    , 2
    , 'The recipes in this book were well written out, but I feel that the authors assumed I knew more about mycology than I do. Better suited to foragers.'
);

insert into
BookReview
values (
    BookReview_seq.nextval
    , '0299282519'
    , Reviewer_seq.currval
    , '03-JUN-2019'
    , 5
    , 'Now THIS is what I call a cookbook! The recipes are simple, which is great for me; I don''t have a lot of time to cook so what I need is a supply of easy recipes with few ingredients that I''m likely to have on hand. You can bet I will be cooking the Wok Way a lot this year!'
);

insert into 
Reviewer 
values (
    Reviewer_seq.nextval
    , 'Marty'
    , 'McFly'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '0132149871'
    , Reviewer_seq.currval
    , '11-JUN-2019'
    , 5
    , 'All of my pizzas are delivered MUCH faster now. It''s almost instantaneous!'
);

insert into 
BookReview
values (
    BookReview_seq.nextval
    , '1915762492'
    , Reviewer_seq.currval
    , '11-JUN-2019'
    , 4
    , 'This book really helped me learn more about the wild world of computers. As someone from the 80s, I felt like the authors assumed that I was approaching the book with a base level of knowledge that I don''t really have, but I still learned a lot and am looking forward to figuring the rest out in time!'
);

insert into 
Reviewer 
values (
    Reviewer_seq.nextval
    , 'Peter'
    , 'Piper'
);

insert into 
BookReview 
values (
    BookReview_seq.nextval
    , '0299282519'
    , Reviewer_seq.currval
    , '12-JUN-2019'
    , 4
    , 'Pretty basic recipes at an affordable price. Not the first cookbook I reach for when I have a lot of time and ambition, but for a quiet night in with a couple staples on hand you can really get a lot out of this book.'
);

--
-- Let's see the data!
--

-- Some general select statements 

select * from Reviewer;

select * from BookReview
order by BookISBN, rating desc
;

-- Demo that many books can be reviewed many times 
-- (many-to-many review <--> book)

select 
    books.ISBN  
    , books.title as "Title"
    , books.category as "Genre"
    , BookReview.rating as "Stars/5"
    , BookReview.reviewerId as "Reviewer ID"
    , BookReview.comments as "Reviewer Comments"
from 
    books
inner join
    BookReview
on 
    books.ISBN = BookReview.BookISBN
order by
    title, rating desc
;

-- Demo that one reviewer can write many reviews--even multiple reviews on the same book! 
-- (one-to-many reviewer --> review)

select 
    reviewer.Id as "Reviewer ID#"
    , reviewer.firstname || ' ' || reviewer.lastname as "Reviewer" 
    , BookReview.BookISBN as "ISBN"
    , BookReview.rating as "Gold Stars/5"
    , BookReview.comments 
from 
    reviewer
inner join
    BookReview
on
    reviewer.Id = BookReview.reviewerId
order by 
    reviewerId, rating desc
;





    