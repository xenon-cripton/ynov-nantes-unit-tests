# Commands

## Start the container
```
docker-compose up -d --build
```

## Stop the container
```
docker-compose stop
```

## Destroy the container
```
docker-compose down
```

## Launch composer install inside the container
```
docker exec -it -u www-data:www-data test-php /usr/bin/composer install
```

## Launch a shell inside the container
```
docker exec -it -u www-data:www-data test-php /bin/sh
```

# Setup

## To do once
```
docker-compose up -d --build
docker exec -it -u www-data:www-data test-php /usr/bin/composer install
```

## Once you're done
```
docker-compose stop
```

## J'ai tout cassé
```
docker-compose down
docker-compose up -d
```

## J'ai VRAIMENT tout cassé
```
docker rm $(docker ps -aq) -f && docker system prune --volumes -f
```