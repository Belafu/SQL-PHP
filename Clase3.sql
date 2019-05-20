-- Clase 3 - BETWEEN, LIKE, alias (AS) y table reference. 
-- use movies_db;
-- 1)Obtener las películas (movies) y sus géneros (genres), ordenado por nombre de pelicula (usar title).
select movies.title,genres.name
from movies,genres
where movies.genre_id = genres.id
order by title;

-- 2)Obtener las películas (movies) con sus actores (actors), ordenar por nombre de pelicula y nombre de los actores (usar title y first_name).
select movies.title,actors.first_name
from movies,actors,actor_movie
where 	movies.id =	actor_movie.movie_id  and  actor_movie.actor_id = actors.id
order by title,first_name;

-- 3)Obtener los actores (actors) y las películas (movies) a las que pertenecieron (usar first_name, last_name y title).
select actors.first_name,actors.last_name,movies.title
from movies,actors,actor_movie
where 	movies.id =	actor_movie.movie_id  and  actor_movie.actor_id = actors.id
order by first_name;-- HAY 2 SAM de nombre pero de distinto apellido y pelicula

-- 4)Obtener la cantidad de temporadas de cada serie. Ordenado por la serie que más temporadas tenga, y luego por título en orden descendente.
select series.title, seasons.number ,count(series.title) as tempo -- NOTAR QUE EN EL count(VA EL NOMBRE DE UNA COLUMNA CON TODO Y PUNTO )
from series,seasons
where series.id = seasons.serie_id
group by title
order by tempo desc;