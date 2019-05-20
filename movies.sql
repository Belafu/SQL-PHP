select *
from movies
-- where YEAR(release_date) between 2000 and 2010;
-- where title like "t%"
-- where title like "Toy Story %" or title like "Harry Potter %" and length = 120
-- where rating = 8.3 or rating = 9.0 or rating = 9.1
-- where length != 120 and length != 180
order by title asc;