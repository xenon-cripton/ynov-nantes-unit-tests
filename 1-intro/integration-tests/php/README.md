# Messenger API
This is a simplist API using REST principles aiming to provide an instant chat.

## Installation
```
docker-compose up
```

You can now test the api @ http://172.22.0.2 (or what's given to you in your shell)

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
