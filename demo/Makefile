.PHONY: all drupal api

all: drupal api

frontend:
	cd frontend && docker build -t ds2016/frontend:latest .

drupal:
	cd drupal && docker build -t ds2016/drupal:latest .

api:
	cd api && docker build -t ds2016/api:latest .
