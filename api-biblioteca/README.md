API para Bibliotécas em PHP
=================

Sistema REST de Busca de Livros em Bibliotécas com MySql.


Startando
---------------

### EndPoint para Create
```URL
-> POST: Body JSON ou raw: http://xxxxxx/api-biblioteca/api/product/create.php
```

```JSON
{
  "name": "Zbrush",
  "description": "Character Creation  Advanced Digital Sculpting",
  "author": "Richard Taylor",
  "isbn": "999-65-7522-427-7",
  "publisher": "Sybex",
  "category_id": "5",
  "created" : "2020-06-11 18:35:07"
}
```

### Ler Todos registros
```URL
-> GET: http://localhost:8888/api-biblioteca/api/product/read.php
```

### Ler Um registro somente
```URL
-> GET: parametro = id: http://localhost:8888/api-biblioteca/api/product/read_one.php?id=7
```

### Update do livro
```URL
-> PUT: Body JSON parametro = id Requerido: http://localhost:8888/api-biblioteca/api/product/update.php
```

```JSON
{
	"id": 8,
	"name": "C++",
	"description":"Estudando C e algo mais.",
	"isbn": "999-65-7522-427-9",
	"author": "Eu",
	"publisher": "Novatec",
	"category_id": 5,
	"modified":"2018-08-01 00:35:07"
}
```

### Delete do livro
```URL
-> DELETE: Body JSON parametro = id Requerido: http://localhost:8888/api-biblioteca/api/product/delete.php
```

```JSON
{
	"id": 10
}
```

### Procura livro por palavras
```URL
-> GET: Body JSON parametro = s Requerido: http://localhost:8888/api-biblioteca/api/product/search.php?s=palavra
```


Configuração do mysql
-------------
Pasta api/config/database.php


Instalando no mysql
-------------
Importe o arquivo tabelas.sql na raiz do projeto. 


