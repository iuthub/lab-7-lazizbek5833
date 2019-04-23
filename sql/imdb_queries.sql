SELECT * FROM `movies` WHERE year="1995" ;              /*Question 1*/        
SELECT COUNT(*) FROM roles WHERE movie_id="194874" ;    /*Question 2*/
SELECT first_name FROM roles JOIN actors WHERE movie_id="194874" ;    /*Question 3*/
SELECT first_name , last_name FROM directors JOIN movies_directors ON director_id = id  WHERE movie_id='112290' ;   /*Question 4*/
SELECT COUNT(*) FROM movies_directors WHERE director_id="22104" ;   /*Question 5*/
SELECT name FROM movies JOIN movies_directors ON movie_id = id  WHERE director_id="22104";  /*Question 6*/