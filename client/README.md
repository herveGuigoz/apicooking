# familyCooking

> recettes de cuisines en famille

## Build Setup

``` bash
# install dependencies
$ yarn install

# serve with hot reload at localhost:3000
$ yarn dev

# build for production and launch server
$ yarn build
$ yarn start

# generate static project
$ yarn generate
```

For detailed explanation on how things work, checkout [Nuxt.js docs](https://nuxtjs.org).


### Dockerfile Production
FROM node:11.5-alpine

RUN mkdir -p /usr/src/client

WORKDIR /usr/src/client

# Prevent the reinstallation of node modules at every changes in the source code
COPY package.json yarn.lock ./
COPY . ./

# RUN apk update && apk upgrade && apk add git (a verifier)

RUN yarn install

ENV NODE_ENV=production

COPY . /app
RUN yarn build

ENV HOST 0.0.0.0
EXPOSE 3000

CMD yarn start
