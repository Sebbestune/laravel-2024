# Planning phase of REST API

## Identify resources

- Recipies
- Lists

## Model URIs

- /recipies
- /recipies/{id}

- /lists
- /lists/{id}


## Resource representations

```
// MÄNGD
{
    "amount":"278",
    "size": "20",
    "index": "3",
    "next": "/recipies?index=4&size=20",
    "self":"/recipies",
    "recipies":[
        {
            "self": "/recipies/1",
            "name": "Korv med mos",
            "tillagningssteg":[
                "Koka korv...",
                "Koka mos",
                "Lägg på ketchup"
            ]
        },
        {
            ...
        }
    ]
}

// ETT RECEPT

{
    "self": "/recipies/1",
    "name": "Korv med mos",
    "tillagningssteg":[
        "Koka korv...",
        "Koka mos",
        "Lägg på ketchup"
    ]
}

// Listor

{
    "amount": "4",
    "self": "/lists",
    "lists":[
        {
            "self": "/lists/1",
            "name": "korvmojslistan",
        }
        ,
        ...
    ]
}

// EXEMPEL på /lists/{id}

{
    "self": "/lists/1",
    "name": "korvmojslistan",
    "recipies":[
        {
            "myComment": "Det här är ett gott recept.",
            "ref": "/recipies/1",
        }
    ]
}

//EXEMPEL på /lists/{id}/recipies

{
    "self": "/lists/1",
    "name": "korvmojslistan",
    "meta":{
        ...
    },
    "recipiesRef":"/lists/1/recipies"
}
```

## Assign HTTP methods

- HTTP GET /recipies
- HTTP GET /lists

- HTTP GET /recipies?index=0&size=20
- HTTP GET /recipies?filter="vegan"

- HTTP GET /recipies/{id}
- HTTP GET /lists/{id}

- HTTP POST /recipies
- HTTP POST /lists

- HTTP PUT /recipies/{id}
- HTTP PUT /lists/{id}

- HTTP DELETE /recipies/{id}
- HTTP DELETE /lists/{id}

