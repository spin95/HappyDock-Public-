
# Setup and build the client

FROM node:9.4.0-alpine as client

WORKDIR /usr/app/client/
COPY node/client/package*.json ./
RUN npm install -qy
COPY node/client/ ./
RUN npm run build


# Setup the server

FROM node:9.4.0-alpine

WORKDIR /usr/app/
COPY --from=client /usr/app/client/build/ ./client/build/

WORKDIR /usr/app/server/
COPY node/server/package*.json ./
RUN npm install -qy
COPY node/server/ ./

ENV PORT 8081

EXPOSE 8081

CMD ["npm", "start"]
