-- Clase 4 - JOIN, DISTINCT, funciones nativas, funciones de agregación, GROUP BY y HAVING. 
-- use movies_db;
-- 1)Mostrar los géneros de las películas (​genres​), ordenados de mayor a menorpor su nombre, con referencia a las películas (​movies​) utilizando joins.Solicitan que el informe muestre: ​name​ y ​title​.
select movies.title, genres.name
from movies 
-- probar inner / left (Uno tiene Alicia en el Pais de las marivillas y el otro no)
left join genres on movies.genre_id = genres.id
order by title;

-- 2)Mostrar las películas (movies) con sus géneros (genres) y los actores (actors) que participen en cada una de ellas utilizando joins. Solicitan que el informe muestre: title, name, first_name y last_name*/
select movies.title, genres.name, actors.first_name, actors.last_name
from movies 
left join genres on movies.genre_id = genres.id
left join actor_movie on movies.id = actor_movie.movie_id
left join actors on actor_movie.actor_id = actors.id
order by title;

-- 3)Mostrar los actores (actors) y las películas (movies) en las que participaron.Ordenar por nombre de actor.             Mostrar: first_name y title.
select actors.first_name,movies.title
from actors
left join actor_movie on actors.id = actor_movie.actor_id
left join movies on movies.id = actor_movie.movie_id
order by first_name;-- LA GRAN DIFERENCIA QUE PUEDO VER A ACTORES QUE NO PARTICIPARON EN ALGUNA PELICULA

-- 4)Mostrar las películas (movies) con sus géneros (genres) si los posee y los géneros con todas las películas que le corresponden, ambas en una sola consulta,sin ordenamiento.Mostrar: title y name.*/
select movies.title, genres.name
from movies 
right join genres on movies.genre_id = genres.id;
-- NO HAY NINGUNA PELICULA DE Terror

-- 4.1)Mostrar también este informe utilizando un ordenamiento por título de lapelícula (​title​), y por nombre del género (​name​).Luego viceversa, por nombre del género (​name​) y por título de película (​title​).
select movies.title, genres.name
from movies 
left join genres on movies.genre_id = genres.id
order by title;

-- Agregación de datos (práctica complementaria).
-- 1) Traer todos los géneros ​(genres)​ y la cantidad de películas ​(movies) ​que tienecada uno ​(usar name y title)​.
select  genres.name,movies.title, count(name) as cant
from genres 
left join movies on movies.genre_id = genres.id
group by  name ;

-- 2) Obtener el rating ​(rating)​ más bajo de las películas ​(movies)​ por género​ (usar name de la tabla genres)
select  genres.name,movies.title,movies.rating,min(rating) as minRating
from genres  -- CORREGIR CUENTA 1 o 0
left join movies on movies.genre_id = genres.id
group by name;

-- 3) Obtener el rating ​(rating)​ más alto de las películas ​(movies)​ por género ​(usar name de la tabla genres)​.
select  genres.name,movies.title,movies.rating,max(rating) as maxRating
from genres  
left join movies on movies.genre_id = genres.id
group by name;




