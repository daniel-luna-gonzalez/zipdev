#Zipdev challenge

##Requirements

-MySQL

-PHP 7.0


## install

at root level execute the below command

php app/command/installCommand


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

## Author

Daniel Luna

daniel.lunagonzalez91@gmail.com
