FROM       golang:1.7
MAINTAINER Nick Schuch

RUN go get golang.org/x/tools/cmd/present
COPY present-run /run/

EXPOSE 3999

WORKDIR /app

CMD ["/run/present-run"]
