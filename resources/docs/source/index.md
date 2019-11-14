---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_702da605377efe10b66841e103c2080c -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/team" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/team"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/team`


<!-- END_702da605377efe10b66841e103c2080c -->

<!-- START_eddf7138dffc66675044530681a94451 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/team/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/team/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/team/create`


<!-- END_eddf7138dffc66675044530681a94451 -->

<!-- START_bcc537b5104633dd83bbdfffbf5f12d0 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/team" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"voluptatem","year":13,"initials":"possimus","photo":"qui","country_id":10,"division_id":20}'

```

```javascript
const url = new URL(
    "http://localhost/api/team"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatem",
    "year": 13,
    "initials": "possimus",
    "photo": "qui",
    "country_id": 10,
    "division_id": 20
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/team`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome da Equipa
        `year` | integer |  required  | Ano de fundação
        `initials` | string |  required  | Sigla
        `photo` | image |  required  | Símbolo
        `country_id` | integer |  required  | Id do país
        `division_id` | integer |  required  | Id da divisão
    
<!-- END_bcc537b5104633dd83bbdfffbf5f12d0 -->

<!-- START_beac535d0cd7ca93ba00538bb3b11808 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/team/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/team/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/team/{team}`


<!-- END_beac535d0cd7ca93ba00538bb3b11808 -->

<!-- START_ccd059e4062b469a6595454b1ebd0df4 -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/team/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/team/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/team/{team}/edit`


<!-- END_ccd059e4062b469a6595454b1ebd0df4 -->

<!-- START_8ebc5c0ed5628d8c6f6a4e179f27a212 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/team/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"porro","year":19,"initials":"rerum","photo":"ullam","country_id":7,"division_id":15}'

```

```javascript
const url = new URL(
    "http://localhost/api/team/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "porro",
    "year": 19,
    "initials": "rerum",
    "photo": "ullam",
    "country_id": 7,
    "division_id": 15
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/team/{team}`

`PATCH api/team/{team}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome da Equipa
        `year` | integer |  required  | Ano de fundação
        `initials` | string |  required  | Sigla
        `photo` | image |  required  | Símbolo
        `country_id` | integer |  required  | Id do país
        `division_id` | integer |  required  | Id da divisão
    
<!-- END_8ebc5c0ed5628d8c6f6a4e179f27a212 -->

<!-- START_330a124273ea911d56ffb5cb3e9bbd43 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/team/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/team/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/team/{team}`


<!-- END_330a124273ea911d56ffb5cb3e9bbd43 -->

<!-- START_6500c6b37eb0891b4e5a47893a5a3376 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/player" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/player"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/player`


<!-- END_6500c6b37eb0891b4e5a47893a5a3376 -->

<!-- START_4fe83bd5228422c53c374775227f09e4 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/player/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/player/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/player/create`


<!-- END_4fe83bd5228422c53c374775227f09e4 -->

<!-- START_fc2d18e575cc136769d5b3d23b327494 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/player" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"fugiat","birth_date":"ratione","photo":"amet","team_id":6,"country_id":9,"position_id":2}'

```

```javascript
const url = new URL(
    "http://localhost/api/player"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "fugiat",
    "birth_date": "ratione",
    "photo": "amet",
    "team_id": 6,
    "country_id": 9,
    "position_id": 2
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/player`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Jogador
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
        `position_id` | integer |  required  | Id da posição
    
<!-- END_fc2d18e575cc136769d5b3d23b327494 -->

<!-- START_60c2c23f0dd6f25e748f31acb60aca90 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/player/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/player/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/player/{player}`


<!-- END_60c2c23f0dd6f25e748f31acb60aca90 -->

<!-- START_b143677de6a204fec3298b749c8b9a7a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/player/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/player/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/player/{player}/edit`


<!-- END_b143677de6a204fec3298b749c8b9a7a -->

<!-- START_c269e0a1680652d42dc98c5e08adba6f -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/player/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"dolorem","birth_date":"aspernatur","photo":"reiciendis","team_id":15,"country_id":9,"position_id":2}'

```

```javascript
const url = new URL(
    "http://localhost/api/player/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "dolorem",
    "birth_date": "aspernatur",
    "photo": "reiciendis",
    "team_id": 15,
    "country_id": 9,
    "position_id": 2
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/player/{player}`

`PATCH api/player/{player}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Jogador
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
        `position_id` | integer |  required  | Id da posição
    
<!-- END_c269e0a1680652d42dc98c5e08adba6f -->

<!-- START_8aea17de8b628e69dcd572e59dc64092 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/player/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/player/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/player/{player}`


<!-- END_8aea17de8b628e69dcd572e59dc64092 -->

<!-- START_5501869f408e322bf92ae7a08b073989 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/coach" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/coach"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/coach`


<!-- END_5501869f408e322bf92ae7a08b073989 -->

<!-- START_7bdd7ef05d04715a955dda458df539ff -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/coach/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/coach/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/coach/create`


<!-- END_7bdd7ef05d04715a955dda458df539ff -->

<!-- START_84e064edfed22fba046691a31a6423c5 -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/coach" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"deserunt","birth_date":"voluptates","photo":"vel","team_id":14,"country_id":4}'

```

```javascript
const url = new URL(
    "http://localhost/api/coach"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "deserunt",
    "birth_date": "voluptates",
    "photo": "vel",
    "team_id": 14,
    "country_id": 4
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/coach`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Treinador
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
    
<!-- END_84e064edfed22fba046691a31a6423c5 -->

<!-- START_e3aa175cbbe858da9d6387fbab59b95a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/coach/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/coach/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/coach/{coach}`


<!-- END_e3aa175cbbe858da9d6387fbab59b95a -->

<!-- START_922f18060f2513788c146d71ead6275a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/coach/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/coach/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/coach/{coach}/edit`


<!-- END_922f18060f2513788c146d71ead6275a -->

<!-- START_039926da52f361cc86dbc2568bad1cec -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/coach/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"repudiandae","birth_date":"laboriosam","photo":"expedita","team_id":9,"country_id":16}'

```

```javascript
const url = new URL(
    "http://localhost/api/coach/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "repudiandae",
    "birth_date": "laboriosam",
    "photo": "expedita",
    "team_id": 9,
    "country_id": 16
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/coach/{coach}`

`PATCH api/coach/{coach}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Treinador
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
    
<!-- END_039926da52f361cc86dbc2568bad1cec -->

<!-- START_225b95f4bf8c5659500a305a6661b190 -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/coach/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/coach/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/coach/{coach}`


<!-- END_225b95f4bf8c5659500a305a6661b190 -->

<!-- START_ffcdd7797c0d9068c79e04a1b180ffe8 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/leader" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/leader"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/leader`


<!-- END_ffcdd7797c0d9068c79e04a1b180ffe8 -->

<!-- START_2d2ab1baa5368bf54d84c08850751367 -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/leader/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/leader/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/leader/create`


<!-- END_2d2ab1baa5368bf54d84c08850751367 -->

<!-- START_443696041d705650fbcdae66837a1a9e -->
## Store a newly created resource in storage.

> Example request:

```bash
curl -X POST \
    "http://localhost/api/leader" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"voluptatem","birth_date":"tempora","photo":"cum","team_id":10,"country_id":8}'

```

```javascript
const url = new URL(
    "http://localhost/api/leader"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "voluptatem",
    "birth_date": "tempora",
    "photo": "cum",
    "team_id": 10,
    "country_id": 8
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/leader`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Dirigente
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
    
<!-- END_443696041d705650fbcdae66837a1a9e -->

<!-- START_8bdcedf9acf0d67635481217b31f6950 -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/leader/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"name":"commodi","birth_date":"quo","photo":"recusandae","team_id":17,"country_id":6}'

```

```javascript
const url = new URL(
    "http://localhost/api/leader/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "commodi",
    "birth_date": "quo",
    "photo": "recusandae",
    "team_id": 17,
    "country_id": 6
}

fetch(url, {
    method: "GET",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/leader/{leader}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `name` | string |  required  | Nome do Dirigente
        `birth_date` | date |  required  | Data de nascimento
        `photo` | image |  required  | Fotografia
        `team_id` | integer |  required  | Id da equipa
        `country_id` | integer |  required  | Id do país
    
<!-- END_8bdcedf9acf0d67635481217b31f6950 -->

<!-- START_47a6863d0f242efd8f0bec12b4fd029a -->
## Show the form for editing the specified resource.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/leader/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/leader/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET api/leader/{leader}/edit`


<!-- END_47a6863d0f242efd8f0bec12b4fd029a -->

<!-- START_0a9abe70c31fa47925326ff4253e2156 -->
## Update the specified resource in storage.

> Example request:

```bash
curl -X PUT \
    "http://localhost/api/leader/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/leader/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`PUT api/leader/{leader}`

`PATCH api/leader/{leader}`


<!-- END_0a9abe70c31fa47925326ff4253e2156 -->

<!-- START_0cda8b51e83cf4ebb9ba0c5f57bdb5ad -->
## Remove the specified resource from storage.

> Example request:

```bash
curl -X DELETE \
    "http://localhost/api/leader/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/leader/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/leader/{leader}`


<!-- END_0cda8b51e83cf4ebb9ba0c5f57bdb5ad -->


