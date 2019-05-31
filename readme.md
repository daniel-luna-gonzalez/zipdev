#Zipdev challenge

##Requirements

-MySQL

-PHP 7.0


## install

at root level execute the below command

sudo php command.php install


##All entries

http://IP_HOST/PhoneBook/index

####Response Type
JSON

####Method
GET

####Response example
```
{
   id: 1,
   names: Ulises Daniel,
   surnames: Luna González,
   phones: [4235242323, 4235432423, 432421423],
   emails: [dluna@gmail.com, daniel.lunagonzalez91@gmail.com]
}
```
##Specific id entry


http://IP_HOST/PhoneBook/index?id=5234

id: numeric


####Response Type
JSON

####Method
GET

###Response example
```
[
{
   id: 1,
   names: Ulises Daniel,
   surnames: Luna González,
   phones: [4235242323, 4235432423, 432421423],
   emails: [dluna@gmail.com, daniel.lunagonzalez91@gmail.com]
},
{
   id: 2,
   names: Ulises Daniel,
   surnames: Luna González,
   phones: [4235242323, 4235432423, 432421423],
   emails: [dluna@gmail.com, daniel.lunagonzalez91@gmail.com]
}
```
]

##Insert

URL: http://IP_SERVER/PhoneBook/insert

####contentType (request)
 
application/json


####Params

Send params as a json in the request body
```
{
	"names": "Daniel",
	"surnames": "Luna González",
	"phones": [3143123, 4213124, 41231],
	"emails": ["danielunag@live.com"]
	
}

```

####dataType (response)

application/json

####Response
```
{
    "status": true/false,
    "message": "output message"
}
```

###Update


URL: http://IP_SERVER/PhoneBook/update?id=idToUpdate

###Request method
POST

####ContentType (Request)

Example


```
{
		"phones": ["52343235", 2423523],
		"names": "New name"
}

```

####dataType (response)

application/json


```
{
    "status": false,
    "message": "required params",
    "error": [
        "code error description"
    ]
}
```

###Delete

####Url

URL: http://IP_SERVER/PhoneBook/delete?id=idToDelete

###Request method
POST


####dataType (response)

application/json


```
{
    "status": true,
    "message": "entry deleted successfully"
}
```

####Search

URL: http://IP_SERVER/PhoneBook/search?text=daniel

###Request method
GET


####dataType (response)

application/json


```
[
    {
        "id": "1",
        "names": "Daniel",
        "surnames": "Luna González",
        "phones": "[3143123, 4213124, 41231]",
        "emails": "[\"danielunag@live.com\"]",
        "photoPath": null,
        "full": "Daniel Luna González 3143123 4213124 41231 danielunag@live.com",
        "created_at": "2019-05-31 19:05:00",
        "updated_at": null
    }
]
```

## Author

Daniel Luna

daniel.lunagonzalez91@gmail.com
