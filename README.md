ENDPOINTS

GET = localhost/3entrega-web2/api/jugadores Lista todos los jugadores existentes en la DB

GET = localhost/3entrega-web2/api/jugadores/:id Lista un jugador especificado por el ID.

GET = localhost/3entrega-web2/api/jugadores?orden=edad&valor=desc Lista todos los jugadores listados por edad descendentemente, tambien se puede poner asc para filtrar por edad ascendentemente.

PUT = localhost/3entrega-web2/api/jugadores/:id Incluyendole en el body los campos e informacion a editar (nombre,apellido,edad,id_club) y en la URL el id del jugador a editar.

POST = localhost/3entrega-web2/api/jugadores Incluyendo en el body los campos necesarios para crear un jugador (nombre,apellido,edad,id_club) crearia un jugador nuevo, devolviendo al usuario el id correspondiente al nuevo jugador insertado.

DELETE = localhost/3entrega-web2/api/jugadores/:id Elimina el jugador indicado por su id en la URL.

id_club = 1 boca // 2 nacional
