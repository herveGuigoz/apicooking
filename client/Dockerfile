FROM node:11.5-alpine

RUN mkdir -p /usr/src/client

WORKDIR /usr/src/client

# Prevent the reinstallation of node modules at every changes in the source code
COPY package.json yarn.lock ./
COPY . ./
RUN yarn install

ARG NODE_ENV=development
ENV NODE_ENV=${NODE_ENV}

RUN yarn build

ENV HOST 0.0.0.0
EXPOSE 3000

CMD yarn dev