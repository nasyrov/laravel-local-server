#
# Proxy
#
FROM traefik:alpine as proxy

COPY conf/traefik.toml /etc/traefik

#
# Frontend
#
FROM nginx:alpine as frontend

COPY conf/default.conf /etc/nginx/conf.d
