FROM node:20.2.0

WORKDIR /app

COPY package.json ./

RUN apt-get update
RUN npm install -g npm@9.7.2
RUN npm install yarn


COPY . .

RUN chown -R node:node /app


USER node

EXPOSE 8080
CMD ["yarn"]
CMD ["yarn", "dev", "--host"]
