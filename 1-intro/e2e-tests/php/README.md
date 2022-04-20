# Messenger API
This is a simplist API using REST principles aiming to provide an instant chat.

## Building
```
docker build . -t messenger-backend 
```
## Installation
```
docker run -p 80:80  messenger-backend
```
## Dev
this allow to relaunch everything without pain 
```
docker stop $(docker ps -a -q) ; docker build . -t messenger-backend --no-cache && docker run -p 80:80  messenger-backend
```

You can now test the api @ http://localhost
or if you have docker toolbox : http://192.168.99.100/

## Documentation
### Endpoints
url rewriting would be a nice improvement but for now you can access access this service via `/`
 - index
The home page, accessed with /, currently redirect to `list`.

 - list (GET `/?url=Messenger/list`)
The list of all the messages received.

 - create (POST `/?url=Messenger/create/user={user}&message={message}`)
Send a message.
user - autor of the message
message - the message

### Client
There's a simple client you can use to test the API.
you can access it from `/client/index.html`

### Storage
Message are stored with filesystem.

### Tests
This project relly on composer for tests :
```
composer install
./vendor/bin/phpunit tests
```

### Todos
 - enforce request type
 - enforce return code
 - use a proper storage system
 - input validation
 - add codedoc
 - add strict typing to every function params returns
 - add more unit/integration tests
 - add front-end interface
