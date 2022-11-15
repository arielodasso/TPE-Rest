# Documentacion API || Diario de Qatar

###  DESCRIPCION
Esta es una API RESTful vinculada a la base de datos del sitio de noticias, detallando todos las noticias disponibles, categorías y comentarios.    

###  URI
Accesible mediante la dirección web http://localhost/WEB%20II/TPE-Rest/api/

- Debe especificarse de manera obligatoria un recurso en formato:
http://localhost/WEB%20II/TPE2-REST/api/recurso 
_(ver detalle de recursos en el punto siguiente)_. 

- Opcionalmente se puede especificar a continuación el id de un recurso en particular con el siguiente formato:
http://localhost/WEB%20II/TPE2-REST/api/recurso/id  
_(ver detalle de recursos en el punto siguiente)_. 

###  RECURSOS
Actualmente están disponibles para consulta mediante nuestra API los siguientes recursos:

:point_right: noticias

:point_right: categorias

:point_right: comentarios

```
Nota: Si se agrega un id numérico, la consulta devuelve el detalle del recurso especificado que coincide con el id especificado.
```

###  CONSUMO DE LA API
Están disponibles para su utilización en esta API los métodos GET, POST y DELETE permitiendo realizar operaciones en la base de datos. 

##### Metodo GET

Al consultar los recursos con el método GET, obtendrá la siguiente información detallada de cada uno de ellos, 

Ejemplo de una consulta GET sobre el recurso ***noticias*** con id = 20
```
{
    "id": 20,
    "titulo": "Toma fuerza la idea de poner nueve defensores en la lista de Argentina",
    "descripcion": "En v\u00edsperas de la confirmaci\u00f3n de la lista de 26 por parte de Lionel Scaloni, hay indicios que podr\u00edan adelantar que el DT optar\u00eda por     Juan Foyth entre los elegidos.",
    "cuerpo": "Foyth, que ayer volvi\u00f3 a jugar con el Villarreal tras varias semanas afuera de las canchas por una lesi\u00f3n, es parte de la lista de 27 jugadores de          Scaloni, que debe sacar uno de los nombres para tener al plantel definido. Y su presencia en el Mundial estaba supeditada a una elecci\u00f3n que el DT empieza a              perfilar: tener un defensor extra m\u00e1s all\u00e1 de los ocho que tiene con el dos por puesto.   En este contexto, otro que aparece como alternativa, pero solo si          Foyth no estuviera en condiciones -algo que con su ingreso de ayer en el Villarreal pareciera descartarse- es Facundo Medina, el defensor que qued\u00f3 en una especie de      lista de reserva de la Selecci\u00f3n Argentina, junto con Musso y Thiago Almada, preparados por si llegara a surgir un imprevisto con alguno de los futbolistas                convocados.",
    "fecha": "2022-11-09",
    "id_categoria_fk": 3
}
```

Ejemplo de una consulta GET sobre el recurso ***categorias*** con id = 2

```
{
    "id_categoria": 2,
    "categoria": "Europa"
}
```

##### Metodo POST

Para realizar una inserción de elemento con el método POST, se debe especificar la siguiente información en formato JSON, según el recurso correspondiente:

Ejemplo de método POST sobre el recurso ***categorias***.

```
{
    "categoria": "categoriaPruebaAPI"
}
```

Ejemplo de método POST sobre el recurso ***noticias***.

```
{
    "titulo": "tituloPrueba",
    "descripcion": "descripcionPrueba",
    "cuerpo": "cuerpoPrueba",
    "fecha": "2022-11-11",
    "id_categoria_fk": 3
}
```

##### Metodo DELETE

La API permite la eliminación de un recurso, para lo cual se debe conocer el id del recurso a eliminar y especificalo en el endpoint. 

Ejemplo de método DELETE que elimina el registro id= 6 del recurso ***noticias***.

```
http://localhost/WEB2/TPE2-REST/api/noticias/6
```




##### Metodo GET ORDER BY

La API permite la obtención de noticias con un determinado orden, según el sort y order pasado por url. 

Ejemplo de método GET que trae registros con sort=id & order=desc.

```
[
{
    "id": 20,
    "titulo": "Toma fuerza la idea de poner nueve defensores en la lista de Argentina",
    "descripcion": "En v\u00edsperas de la confirmaci\u00f3n de la lista de 26 por parte de Lionel Scaloni, hay indicios que podr\u00edan adelantar que el DT optar\u00eda por Juan Foyth entre los elegidos.",
    "cuerpo": "Foyth, que ayer volvi\u00f3 a jugar con el Villarreal tras varias semanas afuera de las canchas por una lesi\u00f3n, es parte de la lista de 27 jugadores de Scaloni, que debe sacar uno de los nombres para tener al plantel definido. Y su presencia en el Mundial estaba supeditada a una elecci\u00f3n que el DT empieza a perfilar: tener un defensor extra m\u00e1s all\u00e1 de los ocho que tiene con el dos por puesto.   En este contexto, otro que aparece como alternativa, pero solo si Foyth no estuviera en condiciones -algo que con su ingreso de ayer en el Villarreal pareciera descartarse- es Facundo Medina, el defensor que qued\u00f3 en una especie de lista de reserva de la Selecci\u00f3n Argentina, junto con Musso y Thiago Almada, preparados por si llegara a surgir un imprevisto con alguno de los futbolistas convocados.",
    "fecha": "2022-11-09",
    "id_categoria_fk": 3
  },
  {
    "id": 19,
    "titulo": "Los jugadores que se pierden el Mundial de Qatar 2022 por lesi\u00f3n",
    "descripcion": "A menos de 20 d\u00edas de la Copa del Mundo, las lesiones son la peor pesadilla de los seleccionados y ya hay varias bajas confirmadas, con otros jugadores en duda para la cita.",
    "cuerpo": "- Giovani Lo Celso (Argentina): Pese a que el cuerpo t\u00e9cnico de la Albiceleste lo esper\u00f3 hasta pr\u00e1cticamente el \u00faltimo momento, el volante de Villarreal deber\u00e1 ser operado de una grave lesi\u00f3n en el b\u00edceps femoral de su pierna derecha y ser\u00e1 as\u00ed baja para el Mundial de Qatar 2022.\r\n\r\n- N'Golo Kant\u00e9 (Francia): El pilar de la selecci\u00f3n de Francia, no participar\u00e1 de la Copa del Mundo Qatar 2022, luego de haber sido intervenido quir\u00fargicamente hoy de una lesi\u00f3n en el tend\u00f3n de la corva. El mediocampista se resinti\u00f3 de una lesi\u00f3n en los isquiotibiales de la pierna derecha.\r\n\r\n- Diogo Jota (Portugal): el delantero de Liverpool se retir\u00f3 en camilla sobre el final del partido ante Manchester City por la Premier league y, si bien no se revelaron con exactitud los detalles de su lesi\u00f3n, el entrenador de los Reds, J\u00fcrgen Klopp, confirm\u00f3 que no se recuperar\u00e1 a tiempo para el Mundial. En igual sinton\u00eda, el medio portugu\u00e9s A Bola asegur\u00f3 que la recuperaci\u00f3n le demandar\u00e1 m\u00e1s de un mes.\r\n\r\n- Philippe Coutinho (Brasil): el futbolista de Aston Villa sufri\u00f3 una lesi\u00f3n en el muslo de su pierna derecha y, seg\u00fan indicaron los primeros partes m\u00e9dicos, no llegar\u00e1 a recuperarse a tiempo para la cita mundialista, por lo que ser\u00e1 baja en el equipo de Tit\u00e9.",
    "fecha": "2022-11-08",
    "id_categoria_fk": 25
  },
```
Ejemplo de método GET que trae registros con sort=id&order=asc.

```
[
  {
    "id": 6,
    "titulo": "Messi analiz\u00f3 el f\u00fatbol argentino y lo compar\u00f3 con las Eliminatorias: \"Cualquiera le gana a cualquiera\"",
    "descripcion": "La Pulga habl\u00f3 de lo pareja que es la Liga Profesional y explic\u00f3 que tiene muchas similitudes con los partidos de Conmebol para clasificar al Mundial.",
    "cuerpo": "En una entrevista con Directv, Messi fue consultado sobre si mira la Liga Profesional, y en ese contexto, la Pulga cont\u00f3: \"Cuando puedo miro f\u00fatbol argentino, depende los horarios porque a veces son muy tarde los partidos, pero intento seguir el campeonato\".\r\n\r\nAdem\u00e1s, la Pulga remarc\u00f3 lo dif\u00edcil que es ganar el f\u00fatbol argentino y explic\u00f3 que tiene similitud al la clasificaci\u00f3n al Mundial en Conmebol: \"El campeonato se puso lindo, es un torneo muy raro, nunca sabes lo que va a pasar. Cualquiera ",
    "fecha": "2022-10-17",
    "id_categoria_fk": 3
  },
  {
    "id": 11,
    "titulo": "C\u00f3mo llega Senegal al Mundial 2022: historia, figura y qu\u00e9 se espera",
    "descripcion": "Senegal compartir\u00e1 el grupo A con Qatar, Ecuador y Pa\u00edses Bajos. Comenzar\u00e1 su participaci\u00f3n el 21 de noviembre, arribando a la cita en Qatar para intentar dar el golpe. Conoc\u00e9 lo que deb\u00e9s saber.",
    "cuerpo": "Senegal viene de viene de clasificarse al Mundial en la primera posici\u00f3n del grupo H de las Eliminatorias Europeas con 16 puntos (cuatro partidos ganados y uno empatado). En tanto, en la Copa Africana de Naciones se consagr\u00f3 campe\u00f3n por penales frente a Egipto.",
    "fecha": "2022-10-24",
    "id_categoria_fk": 4
  },
  
```

La API permite la obtención de noticias ordenados por todas sus columnas de la base de datos pasando las siguientes url, con el método GET:

:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=fecha&order=asc
:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=fecha&order=desc

:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=titulo&order=asc
:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=titulo&order=desc

:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=descripcion&order=asc
:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=descripcion&order=desc

:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=cuerpo&order=asc
:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=cuerpo&order=desc

:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=categoria&order=asc
:point_right: http://localhost/WEB%20II/TPE-Rest/api/noticias?sort=categoria&order=desc






