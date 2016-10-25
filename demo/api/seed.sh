#!/bin/bash

# Name:   seed.sh
# Author: Nick Schuch

curl -H "Content-Type: application/json" -X POST -d '{"title":"Test Blog 1","body":"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book."}' http://localhost:8080/blog
curl -H "Content-Type: application/json" -X POST -d '{"title":"Test Blog 2","body":"It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout."}' http://localhost:8080/blog
