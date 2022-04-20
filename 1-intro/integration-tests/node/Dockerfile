FROM node:16-alpine
WORKDIR /usr/app

COPY ["package.json", "package-lock.json*", "./"]

RUN npm install

COPY . .

CMD [ "npm", "run", "all" ]

# The command bellow allow us to keep the container alive
# When the container is alive we can launch a shell in it to launch the tests :
# docker-compose exec -u node node-tests /bin/sh
# npm run all
#CMD [ "ping", "8.8.8.8" ]