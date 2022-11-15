# Documentacion API || Diario de Qatar

###  DESCRIPCION
Esta es una API RESTful vinculada a la base de datos del sitio de noticias, detallando todos las noticias disponibles, categorías y comentarios.    

###  URI
Accesible mediante la dirección web http://localhost/WEB2/TPE-Rest/api/

- Debe especificarse de manera obligatoria un recurso en formato:
http://localhost/WEB2/TPE2-REST/api/recurso 
_(ver detalle de recursos en el punto siguiente)_. 

- Opcionalmente se puede especificar a continuación el id de un recurso en particular con el siguiente formato:
http://localhost/WEB2/TPE2-REST/api/recurso/id  
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
Están disponibles para su utilización en esta API los métodos GET, POST, PUT y DELETE permitiendo realizar la totalidad de las operaciones de ABM en la base de datos. 

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

