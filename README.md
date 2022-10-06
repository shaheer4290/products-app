
# Products Application

A web service project to search availble products



## Project Setup

1 - Clone this repo
```
git clone https://github.com/shaheer4290/products-app.git yourproject
cd yourproject
```

2 - Build and run containers
```
docker-compose build
docker-compose up
```

Note: You must have docker and docker-compose installed (https://docs.docker.com/get-started/08_using_compose/)

3 - You can check the running containers by following command
```
docker container ls
```

4- You will to run the following command to run migration and setup the DB and also seed the initial data
```
sh php.sh
php artisan migrate
php artisan db:seed --class=ProductSeeder
```
If you want to test the application with some other data you can replace the json file present at the following location
```
yourproject\src\database\data\products.json
```
5- To Run the tests you can run the following command
```
sh php.sh
php artisan test
```
6- After the project is setup you can access the endpoint using the following URL
```
http://localhost:8000/api/products
```
## API Reference

#### Get all items

```http
  GET /api/products
```

| Parameter | Type     | Description                |
| :--------  | :------- | :------------------------- |
| `category` | `string` | **optional**.  |
| `priceLessThan` | `string` | **optional**.  |

```
data
```

## Usage/Examples

```javascript
http://localhost:8000/api/products

{
    "data": [
        {
            "sku": "000001",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 89000,
                "final": 62300,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000002",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 99000,
                "final": 69300,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000003",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 71000,
                "final": 49700,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000004",
            "name": "sandals",
            "category": "sandals",
            "price": {
                "original": 79500,
                "final": 79500,
                "discount": null,
                "currency": "EUR"
            }
        },
        {
            "sku": "000005",
            "name": "sneakers",
            "category": "sneakers",
            "price": {
                "original": 59000,
                "final": 59000,
                "discount": null,
                "currency": "EUR"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http://localhost:8000/api/products?page=1",
        "last": "http://localhost:8000/api/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/products",
        "per_page": 5,
        "to": 5,
        "total": 5
    }
}
```

```
http://localhost:8000/api/products?category=boots

{
    "data": [
        {
            "sku": "000001",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 89000,
                "final": 62300,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000002",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 99000,
                "final": 69300,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000003",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 71000,
                "final": 49700,
                "discount": "30%",
                "currency": "EUR"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http://localhost:8000/api/products?page=1",
        "last": "http://localhost:8000/api/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/products",
        "per_page": 5,
        "to": 3,
        "total": 3
    }
}
```

```
http://localhost:8000/api/products?priceLessThan=80000

{
    "data": [
        {
            "sku": "000003",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 71000,
                "final": 49700,
                "discount": "30%",
                "currency": "EUR"
            }
        },
        {
            "sku": "000004",
            "name": "sandals",
            "category": "sandals",
            "price": {
                "original": 79500,
                "final": 79500,
                "discount": null,
                "currency": "EUR"
            }
        },
        {
            "sku": "000005",
            "name": "sneakers",
            "category": "sneakers",
            "price": {
                "original": 59000,
                "final": 59000,
                "discount": null,
                "currency": "EUR"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http://localhost:8000/api/products?page=1",
        "last": "http://localhost:8000/api/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/products",
        "per_page": 5,
        "to": 3,
        "total": 3
    }
}
```

```
http://localhost:8000/api/products?category=boots&priceLessThan=80000

{
    "data": [
        {
            "sku": "000003",
            "name": "boots",
            "category": "boots",
            "price": {
                "original": 71000,
                "final": 49700,
                "discount": "30%",
                "currency": "EUR"
            }
        }
    ],
    "links": {
        "self": "link-value",
        "first": "http://localhost:8000/api/products?page=1",
        "last": "http://localhost:8000/api/products?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/products?page=1",
                "label": "1",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://localhost:8000/api/products",
        "per_page": 5,
        "to": 1,
        "total": 1
    }
}
```
